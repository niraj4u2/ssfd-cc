<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>   {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

 
    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <a href="#">
                                    <span><img src="{{ asset('assets/images/loginlogo.png') }}" alt="" height="100"></span>
                                </a>
                            </div>

                            <form method="POST" class="pt-2" action="{{ route('login') }}">

                                @csrf
                                 @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <p><i class="fa fa-warning"></i> {{ $error }}</p>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif 
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    @if(Route::has('password.request'))<a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                    @endif
                                    
                                      
                                    

                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                            <div class="row mt-3">
                                <!-- <div class="col-12 text-center">
                                    <p class="text-muted mb-0">Don't have an account? <a href="" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                </div> --> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>
</html>
