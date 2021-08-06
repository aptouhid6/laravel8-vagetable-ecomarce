<div class="card-body">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name',isset($category)?$category->name:null) }}" id="name" placeholder="Enter category name">
      @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter category description">{{ old('description',isset($category)?$category->description:null) }}</textarea>
        @error('description') <i class="text-danger">{{ $message }}</i> @enderror            
      </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-check">
            <input name= "status" type="radio" @if(old('status',isset($category)?$category->status:null) == 'Active') checked @endif class="form-check-input" value= "Active" id="active">
            <label for="active">Active</label>
        </div>    
        <div class="form-check">
          <input name= "status" type="radio" @if(old('status',isset($category)?$category->status:null) == 'Inactive') checked @endif class="form-check-input" value= "Inactive" id="inactive">
          <label for="inactive">Inctive</label>
      </div> 
        @error('status') <i class="text-danger">{{ $message }}</i> @enderror
    </div> 
  </div>