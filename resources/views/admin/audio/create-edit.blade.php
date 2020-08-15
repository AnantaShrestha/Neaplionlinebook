<div id="audioModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
       <div class="modal-header">
              <h4 class="modal-title"></h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <div id="form_result" class="alert alert-danger" style="display:none;"></div>
         <form method="post" id="submit_data" class="form-horizontal getformId" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="control-label col-md-6" >Audio Title :</label>
              <div class="col-md-12">
               <input type="text" name="title" id="title" class="form-control" />
              </div>
           </div>
           <div class="form-group">
              <label class="control-label col-md-6" >Under Category :</label>
              <div class="col-md-12">
                <select name="audio_category" id="audio_category" class="form-control">
                    <option value="" selected>Select One</option>
                    @foreach($audiocategory as $audiocategories)
                      <option value="{{$audiocategories->id}}">{{$audiocategories->name}}</option>
                    @endforeach
                </select>
              </div>
           </div>
           <div class="form-group">
              <label class="control-label col-md-6" >Audio File :&nbsp;<span id="storeImage"></span></label>
              <div class="col-md-12">
               <input type="file" name="audio" id="audio" class="form-control" />
              </div>
           </div>
           <div class="form-group">
              <label class="control-label">Status :</label>
              <input type="checkbox" name="status" id="status" value="1">
           </div>
            <div class="form-group" >
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="hidden" name="store_url" id="store_url" value="{{route('admin.audioStore')}}" class="store_url">
              <input type="hidden" name="edit_url" value="{{route('admin.updateAudio')}}" class="edit_url" id="edit_url">
              <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>



<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                  <h2 class="modal-title">Confirmation</h2>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this News Audio?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>