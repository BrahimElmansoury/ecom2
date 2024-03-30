<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a href="/" class="nav-item nav-link active">Home <span class="sr-only">(current)</span></a>
        <a href="#" class="nav-item nav-link ">Products </a>

        @if (Route::has('login'))
            @auth
                <a href="{{url('/dashboard')}}" class="font-semibold text-gray-600 hover"></a>

            @else
                
            @endif
           @endauth
            
        @endif

    </div>
</nav>