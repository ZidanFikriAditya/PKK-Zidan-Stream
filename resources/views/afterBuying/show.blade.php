@extends('layouts.before')
@section('section')
    <div class="container-fluid mt-5 pt-4 bg-light pb-3">
        <div class="row">
            <div class="col-md-9">
                <h3 class="mb-4">{{ $show->title }}</h3>
                <video width="1024" height="580" controls autoplay>
                    <source src="{{ asset('storage/film/' . $show->film) }}" type="video/mp4"/>
                    <source src="{{ asset('storage/film/' . $show->film) }}" type="video/ogg"/>
                    Your browser does not support the video tag.
                  </video>
                  <div class="row mt-5">
                    <div class="col text-black">
                        <h2>{{ $show->title }}</h2>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <p>{{ $show->description }}</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-black pb-3">
                        <small><strong> Tags : </strong>{{ $show->category->name }}</small>
                        <br>
                        <small><strong> Duration : </strong>{{ $show->durasi }}</small>
                    </div>
                </div>
            </div>
            <div class="col-3 ps-5 mt-5">
                @foreach ($alls as $all)                    
                <a href="/home/{{ $all->id }}" class="card mb-2" style="width: 18rem;">
                    <img src="{{ asset('storage/thumbnail/' . $all->thumbnail) }}" height="60px" class="card-img-left" alt="...">
                    <div class="card-body">
                      <p class="card-text">{{ $all->title }}<br>{{ $all->durasi }}</p>
                    </div>
                </a>
                @endforeach
                {{ $alls->links() }}
            </div>
        </div>
        
    </div>
@endsection