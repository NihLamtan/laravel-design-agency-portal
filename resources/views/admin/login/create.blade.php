<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ config('app.name') }} | Login</title>

    
    <style>
        .login-section{
            padding-top: 120px
        }
            form label{
                /* font-size: 16px;
                font-weight: 600; */
               
                
            }
            .btn-primary{
                font-size: 16px;
                padding: 5px 30px;
                font-family: 'Open Sans', sans-serif;
               background-color: #002C53;
                border: none;
                margin-top: 10px;
                color: white
                /* font-weight: bold; */
            }
            .btn-primary:hover{
  background-color: #B62E3F;

            }
            .form{
                background-color: white;
                padding: 30px 30px;
                -webkit-box-shadow: 1px 2px 12px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 2px 12px -9px rgba(0,0,0,0.75);
box-shadow: 1px 2px 12px -9px rgba(0,0,0,0.75);
border-radius: 10px;

}
            }
            .login-section{
                color: white;
                font-family: 'Open Sans', sans-serif;
            }
            .login-section h3{
                text-transform: uppercase;
                color: #002C53;
                font-weight: bold;

            }
            form{
                margin-top: 30px;
            }
    </style>
</head>
<body>
    <section class="login-section">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-lg-3">
                <img src="/images/logo.png" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row justify-content-center  ">
            <div class="col-lg-5">
                <div class="form">
                    <h3 class="text-center">Admin Login</h3>
                        <form method="POST" action="{{ route('admin.login') }}">
                        @csrf                       
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @enderror
                        </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                            @enderror
                        </div>
                          
                          <button  class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>