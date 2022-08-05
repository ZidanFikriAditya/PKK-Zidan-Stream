<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3 ">
                @if ($msg = Session::get('bisa'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ env('APP_NAME') }}</strong> {{ $msg }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <form action="/category" method="post">
                @csrf
                <label for="category">Name Of Category</label>
                <div class="d-flex">

                    <input class="form-control form-control-md w-50" id="category" type="text" placeholder="Masukkan category" aria-label=".form-control-lg example" name="name">
                    <button type="submit" class="btn btn-success ms-1">Insert</button>
                </div>
                </form>
            
            </div>
            <div class="col-md-4 mt-3">
                <table class="table table-striped-columns">
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th class="text-center">Del</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <form action="/category/{{ $category->id }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>