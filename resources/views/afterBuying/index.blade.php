@extends('layouts.before')
@section('section')
<div class="container mt-5 pt-4" id="container-video">  
    <div class="row text-end">
      <div class="col-md-4 text-start">

        {{-- Search --}}
        <form action="/home">
          <div class="search">
            <i class="bi bi-search text-white px-2 py-1"></i><input type="text" class="rounded" placeholder="Search" name="search">
          </div>
        </form>   

      </div>
      <div class="col-md">
      
        <div class="dropdown">
          <button class="btn btn-secondary btn-sm btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </button>
          <ul class="dropdown-menu bg-dark">
            @foreach ($category as $ctg)
                
            <li><a class="dropdown-item text-white" href="see/{{ $ctg->id }}">{{ $ctg->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div> 
    <div class="row justify-content-center mt-4 ">


        @foreach ($data as $dt)
        <a class="col-md-2 me-3 rounded" id="video" href="/home/{{ $dt->id }}">
            <img src="{{ asset('storage/thumbnail/' . $dt->thumbnail) }}" width="190" height="98" class="mb-2" alt="" srcset="">

            <small class=""><strong>{{ Str::limit($dt->title, 20) }}</strong><br>
            <strong>Tags : </strong>{{ $dt->category->name }}</small>
            </a>
        @endforeach
        {{ $data->links() }}
    </div>
</div>
    
        
    

@endsection