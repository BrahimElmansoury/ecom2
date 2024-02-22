@extends('base')
@section('title','Category')
    
@section('content')
<div class="d-flex justify-content-between align-items-center">


<h1>Categroy list</h1>
<a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
</div>
<table class="table">
    <thead>
      <tr>
            <th>ID</th>
            <th>Name</th>
           
            <th>created_at</th>
            <th>updated_at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

       
        @forelse ($categories as $categroy)
        <tr>
            <td>{{$categroy->id}}</td>
            <td>{{$categroy->name}}</td>
            <td>{{$categroy->created_at}}</td>
            <td>{{$categroy->updated_at}}</td>
           
            <td>
            
                <div class="btn-group gap-3">
                    <a href="{{route('categories.edit',$categroy)}}" class="btn btn-primary">Update</a>
                    <form action="{{route('categories.destroy',$categroy->id)}}" method="POST">
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
                <h3>No Category</h3>

            </td>
        </tr>
            
        
        @endforelse
         
    </tbody>
</table>
{{$categories->links()}}
@endsection