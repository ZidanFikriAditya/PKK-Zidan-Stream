<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Film Read') }}
        </h2>
    </x-slot>
    <div class="container mt-3">
        @if ($msg = Session::get('bisa'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ env('APP_NAME') }}</strong> {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>  
        @endif
        <div class="row">
            <div class="col">
              
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="200px">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Film/Video</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $f)
                        <tr>
                            <th scope="row">{{ $f->title }}</th>
                            <td>{{ Str::limit($f->description,70,' ......') }}</td>
                            <td><img src="{{ asset('storage/thumbnail/' . $f->thumbnail) }}" alt="" srcset="" width="75px"></td>
                            <td>{{ $f->category->name }}</td>
                            <td class="d-flex py-3 pb-">
                                <a href="/show/{{ $f->id }}" class=" btn btn-success me-1"><i class="bi bi-arrow-up-circle-fill"></i></a>
                                <form action="/destroy/film/{{ $f->id }}" method="post">
                                    @csrf
                                   <button type="submit" class=" btn btn-danger"><i class="bi bi-trash-fill"></i></button>       
                                </form>
                            </td>
                          </tr>
                        @endforeach
                      {{ $films->links() }}
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
</x-app-layout>