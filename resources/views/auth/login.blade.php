@extends('layouts.auth')

@section('content')



<div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Bienvenue') }}</h1>
                  </div>
                  <form class="user" action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Adresse email..." name="email" value="{{ old('email') }}" required autofocus>

                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif

                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" id="exampleInputPassword" placeholder="Mot de passe" name="password" required>

                      @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">{{ __('Se souvenir de moi') }}</label>
                      </div>


                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      {{ __('Login') }}
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">

                    @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                        </a>
                    @endif
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>





@endsection
