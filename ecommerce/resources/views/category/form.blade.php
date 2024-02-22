<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
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
   
    </div>
    <div class="form-gorup mb-3">
        <input type="submit" name="" id="" class="btn btn-primary" value="Ajouter"/>
    </div>
    
</form>