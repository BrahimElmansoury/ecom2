@extends('base')
@section('title','update Products')
    
@section('content')
<h1>Update Product</h1>
<form action="{{route('products.update',$product->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name',$product->name)}}"/>
        @error('name')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Description</label>
        <textarea type="text" name="description" id="" class="form-control">{{old('description',$product->description)}}</textarea>
        @error('description')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="" class="form-control" value="{{old('qunatity',$product->quantity)}}"/>
        @error('quantity')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" id="" class="form-control"/>
        @if ($product)
        <img width="100px" src="/storage/{{$product->image}}" alt="">
            
        @endif
        @error('image')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" name="price" id="" class="form-control" value="{{old('price',$product->price)}}"/>
        @error('price')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select  name="category_id" id="category_id" class="form-select" >
        <option value="">Please chose your category</option>
        @foreach ($categories as $category)
            <option @selected(old('category_id',$product->category_id)===$category->id)  value="{{$category->id}}">{{$category->name}}</option>
 
        @endforeach
        </select>
        @error('category')
     <div class="text-danger">
         {{$message}}
     </div>
    
         
     @enderror
    </div>
    <div class="form-gorup mb-3">
        <input type="submit" name="" id="" class="btn btn-primary" value="Ajouter"/>
    </div>
    
</form>

@endsection