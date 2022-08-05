<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-5 border pt-3 pb-3 rounded bg-light shadow">
            @if ($msg = Session::get('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Titung!</strong> {{ $msg }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                  <table style="margin-left: 20%">
                    <tr>
                      <th width="200px">Pilihan Paket</th>
                      <td width="20px">:</td>
                      <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                      <th>Jangka Waktu</th>
                      <td>:</td>
                      <td>{{ $data->jangka_waktu }} Hari</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="/paket" class="btn btn-warning mt-3">Back</a>
                      <td>
                        <form action="/transaksi" method="POST" class="mt-3">
                          @csrf
                          <input type="hidden" name="package_id" value="{{ $data->id }}">
                          <button type="submit" class="btn btn-success">Beli</button>
                        </form>
                      </td>
                      </td>
                    </tr>
                  </table>
                  <?php 
                   use App\Models\Transaction;
                   use Illuminate\Support\Facades\Auth;

                   $status = boolval(Transaction::all()->pluck('user_id', Auth::user()->id)->first());
                ?>
                @if ($status)
                    <a href="/checkout" class="btn btn-outline-success w-100 mt-3">Go To Checkout</a>
                @endif
          </div>
      </div>
    </div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>