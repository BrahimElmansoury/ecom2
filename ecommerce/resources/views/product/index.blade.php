@extends('base')
@section('title','Products')
    
@section('content')
<div class="d-flex justify-content-between align-items-center">


<h1>Product list</h1>
<a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
</div>
<table class="table">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

       
        @forelse ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->quantity}}</td>
            <td><img width='100px' src="storage/{{$product->image}}" alt=""></td>
            <td>{{$product->price}} MAD</td>
            <td>
            
                <div class="btn-group gap-3">
                    <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">


                    </form>
                </div>
            </th>

        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                <h3>No Products</h3>

            </td>
        </tr>
            
        
        @endforelse
         
    </tbody>
</table>
{{$products->links()}}
@endsection