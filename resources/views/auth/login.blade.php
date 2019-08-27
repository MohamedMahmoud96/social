

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Login..</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<form class='form-modal'name='login' method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6 email-error">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                <span class="invalid-feedback " role="alert">
                    <strong></strong>
                </span>
           
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6 password-error">
                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <div class='form-group'>
        <a href="{{route('login/facebook')}}" class='btn btn-lg btn-block col-md-6 offset-md-4' style="background-color: #1a538a; font-size:15px;  "><i class="fab fa-facebook-f" style="font-size: 15px;"></i> Continue with facebook</a>
       </a>
       </div>
       
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary modal-submit">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<!--
<button class="btn btn-danger pull-right open-popu" type='button' data-modal-target='#addCategory' data-toggle="modal" data-target="">Add New Category</button> -->