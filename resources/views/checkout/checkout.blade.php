<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-danger">

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
        <div class="row justify-content-center">
            <div class="col-12-lg border pt-2 pb-4 bg-light shadow rounded">
                <h3 class="text-center mt-2 mb-2">Pilih Methode Pembayaran</h3>
                <hr>
                <div class="container">
                    <div class="row  justify-content-center">
                    @foreach ($channels as $chn)
                    @if ($chn->active)
                    <div class="col-2">
                    <form action="{{ route('bayar.store') }}" method="post">   
                        @csrf      
                        <input type="hidden" name="method" value="{{ $chn->code }}">               
                                <button type="submit" class="bg-white p-3 rounded shadow w-100 h-100">
                                    <div>
                                        <img src="{{ $chn->icon_url }}" alt="" class="w-75  " srcset="">
                                        <p class="mt-3 text-xs text-secondary">Pay with {{ $chn->name }}</p>
                                    </div>
                                </button>
                        </div>                        
                    </form>                    
                               @endif
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col">
              <a href="/paket
              " class="btn btn-outline-warning mt-4  w-100">Back</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>