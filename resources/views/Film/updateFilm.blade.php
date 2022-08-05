<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-8">              
                @if ($msg = Session::get('bisa'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ env('APP_NAME') }}</strong> {{ $msg }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                
                <form action="/show/push/{{ $show->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Input Thumbhnail</label>
                        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="formFile" name="thumbnail" >

                        @error('thumbnail')
                            <small class="text-danger">Format Not fail</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Input Film</label>
                        <input class="form-control @error('film') is-invalid @enderror" type="file" id="formFile" name="film">

                        @error('film')
                            <small>Hanya bisa input : .mp4, .mov, .avi, .wav</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput2" value="{{ $show->title }}" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3">{{ $show->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Durasi</label>
                        <div class="d-flex w-100">
                            <input type="text" class="form-control w-10" name="durasi" value="{{ $show->durasi }}" id="exampleFormControlInput3" placeholder="">                          
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Category</label>
                        <select id="disabledSelect" name="id_category" class="form-select">
                            @foreach ($id_ctg as $ctg)
                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="oldFilm" value="{{ $show->film }}">
                    <input type="hidden" name="oldThumb" value="{{ $show->thumbnail }}">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>