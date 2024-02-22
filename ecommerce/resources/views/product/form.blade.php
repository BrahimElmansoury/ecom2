<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}"/>
        @error('name')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Description</label>
        <textarea type="text" name="description" id="" class="form-control">{{old('description')}}</textarea>
        @error('description')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="" class="form-control" value="{{old('qunatity')}}"/>
        @error('quantity')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" id="" class="form-control"/>
        @error('image')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" name="price" id="" class="form-control" value="{{old('price')}}"/>
        @error('price')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <input type="submit" name="" id="" class="btn btn-primary" value="Ajouter"/>
    </div>
    
</form>