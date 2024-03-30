@extends('base')
@section('title','Category')
    
@section('content')
<div class="d-flex justify-content-between align-items-center">


<h1>Category :
    <span class="text-success fs-1 fw-bolder"> {{$category->name}}</span>
   </h1>
<a href="{{route('categories.index')}}" class="btn btn-primary">go back</a>
</div>
<table class="table">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name</th>
            <th>updated product</th>
        </tr>
    </thead>
    <tbody>
        

       
        @forelse ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            
            <td>
            
                <div class="btn-group gap-3">
                    <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
        
                </div>
            </th>

        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                <h3>No product</h3>

            </td>
        </tr>
            
        
        @endforelse
         
    </tbody>
</table>
@endsection