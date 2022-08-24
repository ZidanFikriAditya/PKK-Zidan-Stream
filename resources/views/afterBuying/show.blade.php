@extends('layouts.before')
@section('section')
    <div class="container-fluid mt-5 pt-4 pb-3 text-white" id="show-video-page">
        <div class="row">
            <div class="col-md">
                <h3 class="mb-4">{{ $show->title }}</h3>
                <video width="860" height="485" controls autoplay>
                    <source src="{{ asset('storage/film/' . $show->film) }}" type="video/mp4"/>
                    <source src="{{ asset('storage/film/' . $show->film) }}" type="video/ogg"/>
                    Your browser does not support the video tag.
                  </video>
                  <div class="row mt-5">
                    <div class="col">
                        <h2>{{ $show->title }}</h2>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <p>{{ $show->description }}</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-warning pb-3">
                        <small><strong> Tags : </strong>{{ $show->category->name }}</small>
                        <br>
                        <small><strong> Duration : </strong>{{ $show->durasi }}</small>
                    </div>
                </div>
            </div>
            <div class="col ps-5 mt-5">
                @foreach ($alls as $all)    
                <div class="row mt-3">
                    <a href="/home/{{ $all->id }}" id="show-video" class="col-md me-3 d-flex text-decoration-none text-white" style="width: 18rem;">
                        <img src="{{ asset('storage/thumbnail/' . $all->thumbnail) }}" class="me-2" height="80px" class="card-img-left" alt="...">
                       
                        <small>
                            <div class="card-body">
                                <p class="card-text">{{ $all->title }}</p>
                              </div>
                        </small>
                    </a>
                    </div>                
                @endforeach
                {{ $alls->links() }}
            </div>
        </div>
        
    </div>
@endsection