@extends('layouts.before')
@section('section')
<div class="container mt-5 pt-5">   
    <div class="row justify-content-center ">
        @foreach ($data as $dt)
        <div class="col-md-3">
            <div class="card shadow-sm" style="width: 16rem;">
                <img src="{{ asset('storage/thumbnail/' . $dt->thumbnail) }}" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $dt->title }}</h5>
                  <p class="card-text">Durasi : {{ $dt->durasi }}</p>
                  <a href="/home/{{ $dt->id }}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
    
        
    

@endsection