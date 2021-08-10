<div class="card-body">
    <div class="form-group">
      <label for="category_id">Select Category</label>
      <select class="form-control" name="category_id" id="category_id">
        <option value="">Select Category</option>
        @foreach($categories as $category)
          <option @if(old('category_id',isset($product)?$product->category_id:null) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach  
      </select>
      @error('category_id') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name',isset($product)?$product->name:null) }}" id="name" placeholder="Enter product name">
      @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter product description">{{ old('description',isset($product)?$product->description:null) }}</textarea>
        @error('description') <i class="text-danger">{{ $message }}</i> @enderror            
    </div>
    <div class="form-group">
      <label for="color">Color</label>
      <input type="text" name="color" class="form-control" value="{{ old('color',isset($product)?$product->color:null) }}" id="color" placeholder="Enter product color">
      @error('color') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" name="price" class="form-control" value="{{ old('price',isset($product)?$product->price:null) }}" id="price" placeholder="Enter product price">
      @error('price') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
      <label for="size">Size</label>
      <input type="number" name="size" class="form-control" value="{{ old('size',isset($product)?$product->size:null) }}" id="size" placeholder="Enter product size">
      @error('size') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" name="stock" class="form-control" value="{{ old('stock',isset($product)?$product->stock:null) }}" id="stock" placeholder="Enter product stock">
      @error('stock') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-check">
            <input name= "status" type="radio" @if(old('status',isset($product)?$product->status:null) == 'Active') checked @endif class="form-check-input" value= "Active" id="active">
            <label for="active">Active</label>
        </div>    
        <div class="form-check">
          <input name= "status" type="radio" @if(old('status',isset($product)?$product->status:null) == 'Inactive') checked @endif class="form-check-input" value= "Inactive" id="inactive">
          <label for="inactive">Inctive</label>
      </div> 
        @error('status') <i class="text-danger">{{ $message }}</i> @enderror
    </div> 
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="image" class="form-control" id="image" placeholder="Enter product image">
      @error('image') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    @if(isset($product))
        <img src="{{ asset($product->image) }}" alt="" width="10%">
    @endif
  </div>