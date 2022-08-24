<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-dark">

    @if ($message = Session::get('bisa'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">{{ env('APP_NAME') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            {{ $message }}
          </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center text-center">          
          <h3 class="text-white">PILIH PAKET</h3>
         
          @foreach ($values as $value)
          <a class="col-md-3 me-4 text-decoration-none my-3 py-2 text-black" id="package-choose" href="/paket/{{ $value->id }}">
            <img src="{{ asset('image/head/logo.png') }}" width="150" alt="">
            <h3 class="mt-2"><b>{{ $value->name }}</b></h3>
            <p><b>{{ $value->jangka_waktu }} Hari</b> | Rp.{{ number_format($value->harga) }}</p>
          </a>
          @endforeach

        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <a href="/" class="btn btn-warning mt-4 w-100">Back</a>
          </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>