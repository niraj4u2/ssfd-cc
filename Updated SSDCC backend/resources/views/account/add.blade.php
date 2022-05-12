 <div class="modal-header">
 	<h5 class="modal-title">{{(!empty(@$data['res']->id)) ?'Edit' : 'Add' }} City</h5>
 	<button type="button" class="close" data-dismiss="modal">×</button>
 </div>

 <div class="modal-body pt-4">
 	<div id="formErrors"></div>
 	<form class="form" id="cityForm" action="javascript:void(0)" method="post">
 		<input type="hidden" name="id" value="{{ @$data['id'] }}">
 		<div class="form-group">
 			<label>
 				<span class="label-text">City Name</span>
 				<input type="text" name="city_name" placeholder="City Name" value="{{ old('city_name',@$data['res']->city_name ) }}" class="form-control">
 			</label>
 			<span id="city_name_error"></span>
 		</div>

 		@csrf
	 @if(!empty(@$data['res']->id))
 		<div class="form-group">
 			<label>
 				<span class="label-text">Status</span>

                 <select name="is_active" placeholder="" class="form-control">
                    <option value="1" 
                        {{ old('is_active',@$data['res']->is_active)==1 ? 'selected' : '' }}
                  >Active</option>
                   <option value="0" 
                        {{ old('is_active',@$data['res']->is_active)==0 ? 'selected' : '' }}
                  >In-Active</option>  

              </select>
 			</label>
 			<span id="status_error"></span>
 		</div>
 		  @endif
 		<button type="submit" class="btn btn-sm btn-rounded btn-success">Submit</button>
 		<button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
 	</form>
 </div>
