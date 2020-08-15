<div id="productModal" class="modal fade" role="dialog">
 <div class="modal-dialog" style='max-width:600px'>
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
              <div class="row">
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Product Name (*):</label>
                    <div class="col-md-12">
                     <input type="text" name="name" id="name" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label class="control-label col-md-12">Author (*): </label>
                    <div class="col-md-12">
                     <input type="text" name="author" id="author" class="form-control" />
                    </div>
                  </div>
              </div>
           </div>
           <div class="form-group">
             <div class="row">
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Under Category (*):</label>
                    <div class="col-md-12">
                        <select name="category_name" class="form-control">
                            <option value="" selected>Select One...</option>
                            @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                        <label class="control-label col-md-12">Language (*):</label>
                        <div class="col-md-12">
                            <select name="language" class="form-control">
                                <option value="" selected>Select One...</option>
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>

                            </select>
                        </div>
                 
                  </div>
              </div>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Total Page (*):</label>
                    <div class="col-md-12">
                     <input type="text" name="total_page" id="total_page" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label class="control-label col-md-12">Published Date (*): </label>
                    <div class="col-md-12">
                     <input type="text" name="published_date" id="published_date" class="form-control" />
                    </div>
                  </div>
              </div>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Price in Rs:</label>
                    <div class="col-md-12">
                     <input type="text" name="price" id="price" class="form-control" />
                    </div>
                  </div> 
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Rating:</label>
                    <div class="col-md-12">
                     <input type="number" min='0' max='5' name="rating" id="rating" class="form-control" />
                    </div>
                  </div> 
              </div>
           </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Image (*): <span id="storeImage" style="display:inline-block"></span></label>
                    <div class="col-md-12">
                     <input type="file" name="image" id="image" class="form-control" />
                    </div>
                  </div> 
                  <div class="col-lg-6">
                      <label class="control-label col-md-12">Pdf(*): <span id="storePdf" style="display:inline-block"></span></label>
                    <div class="col-md-12">
                     <input type="file" name="pdf" id="pdf" class="form-control" />
                    </div>
                  </div> 
              </div>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-lg-4">
                       <label class="control-label" style="margin-left:8px">Status :</label>
                       <input type="checkbox" name="status" id="status" value="1">
                  </div>
                  <div class="col-lg-4">
                       <label class="control-label">Free :</label>
                       <input type="checkbox" name="free" id="free" value="1">
                  </div>
                   <div class="col-lg-4">
                       <label class="control-label">Upcoming :</label>
                       <input type="checkbox" name="upcoming" id="upcoming" value="1">
                  </div>
              </div>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-lg-12">
                      <label class="control-label col-md-12">Description:</label>
                      <div class="col-md-12">
                        <textarea id="description" name='description' class="form-control" rows="5"></textarea>
                    </div>
                  </div>
              </div>
           </div>
            <div class="form-group" >
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="hidden" name="store_url" id="store_url" value="{{route('admin.productStore')}}" class="store_url">
              <input type="hidden" name="edit_url" value="{{route('admin.updateProduct')}}" class="edit_url" id="edit_url">
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
                <h4 align="center" style="margin:0;">Are you sure you want to remove this Product?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>