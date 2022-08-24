<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-dark">
    <div class="container mt-5">
      <div class="row justify-content-center">
            @if ($msg = Session::get('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Titung!</strong> {{ $msg }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
              <div class="row justify-content-center text-center">
                <form action="/transaksi" method="POST" class="mt-3">
                  @csrf
                  <input type="hidden" name="package_id" value="{{ $data->id }}">
                <button type="submit" class="col-md-6 text-decoration-none py-4 text-black rounded" id="package-choose">
                  <img src="{{ asset('image/head/logo.png') }}" width="150" alt="">
                  <h3 class="mt-2"><b>{{ $data->name }}</b></h3>
                  <p><b>{{ $data->jangka_waktu }} Hari</b> | Rp.{{ number_format($data->harga) }}</p>
                </button>
                </form>
                <div class="row">
                  <div class="col">
                    <a class="btn btn-warning mt-3 w-50" href="/paket">Back</a>
                  </div>
                </div>
              </div>
           
                  <?php 
                   use App\Models\Transaction;
                   use Illuminate\Support\Facades\Auth;

                   $status = boolval(Transaction::all()->where('user_id', Auth::user()->id)->first());
                   $check = Transaction::where('user_id', Auth::user()->id)->pluck('status')->first();
                ?>
                @if ($check == 'paid')
                  <a href="/home" class="btn btn-success w-50 mt-3">Go To Home</a>
                @else
                @if ($status)
                  <a href="/checkout" class="btn btn-success w-50 mt-3">Go To Checkout</a>
                 @endif
                @endif
                

      </div>
    </div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
{{--  --}}