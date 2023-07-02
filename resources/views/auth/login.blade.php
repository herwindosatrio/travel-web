<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @include('includes.style')
</head>

<body>

  <main class="login-container">
    <div class="container">
      <div class="row page-login d-flex align-items-center">
        <div class="section-left col-12 col-md-6">
          <h1 class="mb-4">We explore the new <br> life much better</h1>
          <img 
            src="{{ url('frontend/images/login-admin@2x.png') }}"
            alt=""
            class="w-75 d-none d-sm-flex"
          />
        </div>
        <div class="section-right col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <img 
                  src="{{ url('/frontend/images/logo@2x.png') }}"
                  alt=""
                  class="w-50 mb-4"
                />
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label for="email">{{ __('Email Address') }}</label>
                  <input 
                    type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    id="email"
                    aria-describedby="emailHelp"
                    required autocomplete="email" autofocus
                  />
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">{{ __('Password') }}</label>
                  <input 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    id="password"
                    required autocomplete="current-password"
                  />
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group form-check">
                  <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="remember"
                    {{ old('remember') ? 'checked' : '' }}
                  />
                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
                <button 
                  type="submit"
                  class="btn btn-login btn-block"
                >
                  {{ __('Login') }}
                </button>
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  @include('includes.script')
</body>

</html>

