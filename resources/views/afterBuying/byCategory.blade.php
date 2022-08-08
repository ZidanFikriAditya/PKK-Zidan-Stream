@extends('layouts.before')
@section('section')
<div class="container mt-5 pt-4">  
    <div class="row text-end">
      <div class="col">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </button>
          <ul class="dropdown-menu">
            @foreach ($categories as $ctg)                
            <li><a class="dropdown-item" href="{{ $ctg->id }}">{{ $ctg->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div> 
    <div class="row justify-content-center mt-4">


        @foreach ($film as $dt)
        <div class="col-md-3">
            <div class="card shadow-sm" style="width: 16rem;">
                <img src="{{ asset('storage/thumbnail/' . $dt->thumbnail) }}" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $dt->title }}</h5>
                  <p class="card-text">{{ Str::limit($dt->description, 40, ' ...') }}</p> 
                  <small><strong>Tags : </strong>{{ $dt->category->name }}</small><br>
                  <a href="/home/{{ $dt->id }}" class="btn btn-primary mt-3">See Video</a>
                </div>
              </div>
        </div>
        @endforeach
        {{ $film->links() }}
    </div>
</div>
    
        

@endsection