@extends('base')
@section('title','Products')
    
@section('content')
<div class="d-flex justify-content-between align-items-center">


<h1>Last Products</h1>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
  
@foreach ($products as $product)
   
<div class="col">
    <div class="card h-100">
       

        <img width="100px" height="350px" src="storage/{{$product->image}}" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <span>
                    Quantity :  <span class="badge bg-success">{{$product->quantity}} </span></span>
                <span>
                    Price:<span class="badge bg-primary">{{$product->price}} MAD</span>

                </span>
            </div>
           
        </div>
        <div class="card-footer">
            <small class="text-muted">created at: {{$product->created_at}}</small>
        </div>
    </div>
</div>
@endforeach
</div>
       

@endsection