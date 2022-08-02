<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background: url('bg-login.jpg');
            background-size: cover;
            
        }
        .container {
            width: 100vh;
            height: 100vh;
            align-items: center;
            
        }
    </style>
  </head>
  <body>
    @if ($message = Session::get('errors'))
    <div class="container-fluid justify-content-left">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="" class="rounded me-2" alt="...">
              <strong class="me-auto">Message</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              {{ $message }}
            </div>
          </div>
    </div>
    @endif    

    {{-- // Form Login --}}
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col border p-3 bg-light shadow">
                <div class="text-center">                    
                    <h3>Registrasi</h3>
                </div>
                    <hr>
                    <form method="post" action="/register">

                        @csrf

                        <div class="mb-3">
                          <label for="exampleInputName1" class="form-label">Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="name" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Username</label>
                          <input type="text" class="form-control" id="exampleInputUsername1" name="username" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
                          </div>

                        <button type="submit" class="btn btn-primary mt-2">Registrasi</button>

                      </form>

                      <small class="d-block text-center"><strong class="me-1">Sudah Punya akun?</strong><a href="/login">Login !</a></small>
                </div>
                
                <a class="btn btn-outline-light mt-5" href="/">Back To Default Home</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>