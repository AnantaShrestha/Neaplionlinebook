<div id="passwordModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
       <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <span id="changing_error"></span>
         <form method="post" id="change_submit" class="form-horizontal getformId">
          @csrf
          <div class="form-group">
              <label class="control-label col-md-4" >Current Password:</label>
              <div class="col-md-12">
                <input type="password" name="current_password" id="current_password" class="form-control" autocomplete="off"/>
              </div>
           </div>
           <div class="form-group">
              <label class="control-label col-md-4">New Password : </label>
              <div class="col-md-12">
               <input type="password" name="new_password" id="new_password" class="form-control" autocomplete="off"/>
              </div>
           </div>
            <div class="form-group">
              <label class="control-label col-md-4">Confirm Password : </label>
              <div class="col-md-12">
               <input type="password" name="confirm_password" id="confirm_password" class="form-control" autocomplete="off"/>
              </div>
           </div>
          
            <div class="form-group" >   
              <input type="submit" name="changePass" id="changePass" class="btn btn-warning" value="Change Pasword" autocomplete="off"/>
           </div>
         </form>
        </div>
     </div>
    </div>
</div>
