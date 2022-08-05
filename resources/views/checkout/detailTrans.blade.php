<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body >
    <div class="container mt-5 py-3 p3">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3>{{  env('APP_NAME') }}</h3>
            </div>
            <div class="col-8">
                
            </div>
            <div class="col-2">
                <a href="/" class="btn btn-secondary w-100">
                    Home
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4 text-center text-secondary">
                TRANSACTION DETAIL
                <div class="row">
                    <div class="col fs-2">
                        Rp. {{ number_format($detail->amount) }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col text-center">
                        @if ($detail->status == 'paid')
                        <span class="bg-success text-white rounded pe-1 ps-1">{{ $detail->status }}</span>
                        @else
                        <span class="bg-danger text-white rounded pe-1 ps-1 ">{{ $detail->status }}</span>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col rounded bg-warning text-black" onclick="myFunction()" style="cursor: pointer" id="print" >
                            <i class="bi bi-printer"></i>
                            Print
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-end fs-6 text-dark">
                #{{ $detail->reference }}
                <div class="row mt-2">
                    <div class="col fs-4 text-dark  ">
                        {{ $detail->customer_name }}
                    </div>
                </div>
                <div class="row mt-5 pt-5">
                    <div class="col fs-5 bg-secondary text-light rounded text-center">
                        @foreach ($detail->order_items as $item)
                            <b>Paket : </b>{{ $item->name }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col text-secondary mt-1">
                <h3 class="rounded bg-dark text-white p-2 text-center">INSTRUCTIONS</h3>
                <div class="accordion" id="accordionExample">
                @foreach ($detail->instructions as $t)    
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseOne">
                      {{ $t->title }}
                    </button>
                  </h2>
                  <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach ($t->steps as $item)                            
                        {{ $loop->iteration }}. <small>{!! $item !!}<br></small>
                        @endforeach
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        function myFunction(){
            window.print()
        }
    </script>
</body>
</html>