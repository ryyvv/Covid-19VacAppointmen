<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Covid-19 ') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('../../js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('../../css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: rgb(236, 232, 232); height:100%">
    <main class="py-4" style="">
        <div class="container ">
            <div class="row justify-content-center " style="margin:0 20%;margin-top:20%;text-align: center;justify-content:center;">
                <p style=" overflow-wrap: break-word;font-weight:bolder;font-size:30px">Web Appointment System </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-5  justify-content-center"">
                    <form method=" POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" placeholder=" Email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control placeholder=" Email"
                                    @error('email') is-invalid @enderror name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div> --}}

        <div class="col-md-12" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>


        <div class="form-group row mb-0" style="float:right;margin: 0 1%">
            <div class="col-md-12 ">
                <a class="btn btn-link" href="/password/reset" style="text-decoration: none;">
                    Forgot Your Password?
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        </form>
        </div>
        </div>
    </main>
</body>



<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyD594kQatzBHyUVVeXycIWx5tVjVoOkrOs",
        authDomain: "rncovidsched.firebaseapp.com",
        databaseURL: "https://rncovidsched-default-rtdb.firebaseio.com",
        projectId: "rncovidsched",
        storageBucket: "rncovidsched.appspot.com",
        messagingSenderId: "793794700791",
        appId: "1:793794700791:web:522c9072ed133333e6baf2"
    };
    firebase.initializeApp(firebaseConfig);
    var facebookProvider = new firebase.auth.FacebookAuthProvider();
    var googleProvider = new firebase.auth.GoogleAuthProvider();
    var facebookCallbackLink = '/login/facebook/callback';
    var googleCallbackLink = '/login/google/callback';
    async function socialSignin(provider) {
        var socialProvider = null;
        if (provider == "facebook") {
            socialProvider = facebookProvider;
            document.getElementById('social-login-form').action = facebookCallbackLink;
        } else if (provider == "google") {
            socialProvider = googleProvider;
            document.getElementById('social-login-form').action = googleCallbackLink;
        } else {
            return;
        }
        firebase.auth().signInWithPopup(socialProvider).then(function(result) {
            result.user.getIdToken().then(function(result) {
                document.getElementById('social-login-tokenId').value = result;
                document.getElementById('social-login-form').submit();
            });
        }).catch(function(error) {
            // do error handling
            console.log(error);
        });
    }
</script>

</html>