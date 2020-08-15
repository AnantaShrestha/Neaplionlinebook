<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helper\UserSystemInfoHelper;
use Carbon\Carbon;
use App\Front\User;
use App\Admin\Uniquevisitor;
use Yajra\Datatables\Datatables;

class ChartController extends Controller
{
    //
    public function __construct(Uniquevisitor $unique)
    {
        $this->unique=$unique;
    }

     public function fetch_last_six_month_data(Request $request)
    
    {
        $usercount = array();
        $userArr = array();
        $monthname=array();
        $userNo=array();
        $alldata=array();
        $title='';
        if($request->selectType=='Six')
        {
        	$title="Last 6 Month User Registration";
        	$users = User::select('id', 'created_at')
	        	->get()
	        	->groupBy(function($date) {
	            return Carbon::parse($date->created_at)->format('M');
	         });
        	foreach ($users as $key => $value) 
        	{
            	$usercount[$key]= count($value);
       		}
	        for($i = 0; $i <=5; $i++)
	        {
	           $lastsixmonth=Carbon::now()->subMonths($i)->format('M');
	            if(!empty($usercount[$lastsixmonth]))
	            {
	                $userArr[$lastsixmonth] = $usercount[$lastsixmonth];
	            }else
	            {
	                $userArr[$lastsixmonth] = 0;
	            }
	        }
	     
        }

       else if($request->selectType=='Monthly')
       {	
        	 $title="Last 30 Days User Registration";
        	 $users = User::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('M-d');
             });


            foreach ($users as $key => $value) 
            {
                $usercount[$key]= count($value);
            }
            
            for($i = 0; $i <=30; $i++)
            {
               $lastsixmonth=Carbon::now()->subDays($i)->format('M-d');
                if(!empty($usercount[$lastsixmonth]))
                {
                    $userArr[$lastsixmonth] = $usercount[$lastsixmonth];
                }else
                {
                    $userArr[$lastsixmonth] = 0;
                }
            }
           

        }
        else if($request->selectType=='Weekly')
        {
        	$title="Last 7 Days User Registration";
             $users = User::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('D-d');
             });
            foreach ($users as $key => $value) 
            {
                $usercount[$key]= count($value);
            }
            
            for($i = 0; $i <=6; $i++)
            {
               $lastsixmonth=Carbon::now()->subDays($i)->format('D-d');
                if(!empty($usercount[$lastsixmonth]))
                {
                    $userArr[$lastsixmonth] = $usercount[$lastsixmonth];
                }else
                {
                    $userArr[$lastsixmonth] = 0;
                }
            }
            

        }
         $max=max($usercount);
        (int)$max_value=$max+3;
        foreach($userArr as $key=>$value)
        {
                array_push($monthname,$key);
                array_push($userNo,$value);
        }
        $alldata=array(
	       'months' => $monthname,
	        'userCount' => $userNo,
	        'max' => $max_value,
	        'title'=>$title,
	   	);
   
	    return $alldata;
        
 	}

    public function uniqueView(Request $request)
    {
        $users=User::orderBy('created_at','Desc')->get();
        if($request->ajax())
        {
                $unique=$this->unique->all();
                return Datatables::of($unique)
                ->editColumn('created_at',function($unique){
                    return date('Y-F-d-D ', strtotime($unique->created_at));
                })
                ->make(true);
        }
        return view('admin.customer.unique');
    }
    public function countVisitor(Request $request)
    {

        $ip=UserSystemInfoHelper::get_ip();
        $os=UserSystemInfoHelper::get_os();
        $browser=UserSystemInfoHelper::get_browsers();
        $device=UserSystemInfoHelper::get_device();
        $countIp=$this->countIp($ip);
        if($countIp>0)
        {
           $this->checkBrowser($ip,$browser);
           return response()->json(['updated'=>'successfully']);       
        }
        else
        {
            $unique=new $this->unique;
            $unique->ip=$ip;
            $unique->os=$os;
            $unique->browser=$browser;
            $unique->device=$device;
            $unique->save();
            return response()->json(['created'=>'Successfully']);
        }
        
    }
    function countIp($ip)
    {
        $countIp=$this->unique->where('ip',$ip)->count();
        return $countIp;
    }
    function checkBrowser($ip,$browser)
    {
        $unique=$this->unique->where('ip',$ip)->first();
        if($unique->browser!=$browser)
        {
            $browserName=$unique->browser;
            $browserArr=explode(',',$browserName);
            foreach($browserArr as $brows)
            {
                if($brows!=$browser)
                {
                    $updateBrowser=$brows.','.$browser;
                }
            }
            $unique=$this->unique->where('ip',$ip)->increment('hits');
            $update=$this->unique->where('ip',$ip)->update(['browser'=>$updateBrowser]); 
            return $update;
        }
        else
        {
            $unique=$this->unique->where('ip',$ip)->increment('hits');
        }   
    }
    public function uniqueChartView(Request $request)
    {
        $uniqueCount=array();
        $uniqueArr = array();
        if($request->selectType=='Six')
        {
            $unique=$this->uniqueYearMonth();
            foreach ($unique as $key => $value) 
            {
                $uniqueCount[$key]= count($value);
            }
            for($i = 0; $i <=5; $i++)
            {
                (int)$lastsixmonth=Carbon::now()->subMonths($i)->format('Y-M');
                if(!empty($uniqueCount[$lastsixmonth]))
                {
                    $uniqueArr[$lastsixmonth] = $uniqueCount[$lastsixmonth];
                }
                else
                {
                    $uniqueArr[$lastsixmonth] = 0;
                }
            }

        }
        if($request->selectType=='Monthly')
       {    
             $unique=$this->uniqueMonthly();
            foreach ($unique as $key => $value) 
            {
                $uniqueCount[$key]= count($value);
            }
            
            for($i = 0; $i<=date('t'); $i++)
            {
               $monthly=Carbon::now()->subDays($i)->format('M-d');
                if(!empty($uniqueCount[$monthly]))
                {
                    $uniqueArr[$monthly] = $uniqueCount[$monthly];
                }else
                {
                    $uniqueArr[$monthly] = 0;
                }
            }  
        }
        if($request->selectType=='Weekly')
        {
            $unique=$this->uniqueWeekly();
            foreach ($unique as $key => $value) 
            {
                $uniqueCount[$key]= count($value);
            }
            for($i = 0; $i <=6; $i++)
            {
               $oneweek=Carbon::now()->subDays($i)->format('D-d');
                if(!empty($uniqueCount[$oneweek]))
                {
                    $uniqueArr[$oneweek] = $uniqueCount[$oneweek];
                }else
                {
                    $uniqueArr[$oneweek] = 0;
                }
            }
        }
        (int)$max=max($uniqueCount);
        return response()->json(['unique'=>$uniqueArr,'max'=>$max]);
    }
     function uniqueYearMonth()
    {
        $unique = Uniquevisitor::select('id', 'created_at')
                    ->get()
                    ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y-M');
                 });
        return $unique;
    }
    function uniqueMonthly()
    {
        $unique = Uniquevisitor::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('M-d');
             });
        return $unique;
    }
    function uniqueWeekly()
    {
         $unique = Uniquevisitor::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('D-d');
             });
        return $unique;
    }
    
}
