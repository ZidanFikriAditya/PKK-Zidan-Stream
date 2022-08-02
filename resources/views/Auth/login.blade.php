<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col border p-3 bg-light shadow">
                <div class="text-center">                    
                    <h3>Login</h3>
                </div>
                    <hr>
                    <form method="post" action="/login">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Username</label>
                          <input type="text" class="form-control" id="exampleInputUsername1" name="username" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                      </form>
                      <small class="d-block text-center"><strong class="me-1">Belum punya akun?</strong><a href="/register">Registrasi !</a></small>
                </div>
                
                <a class="btn btn-outline-light mt-5" href="/">Back To Default Home</a>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      <script>
      </script>
</body>
</html>

