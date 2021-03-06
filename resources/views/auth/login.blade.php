@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('auth.Login') </div>
                <div class="card-body">
                {!! Form::open(['method' => 'POST', 'routes' => 'login']) !!}

                        <div class="form-group row">
                            {!! Form::label('email', trans('auth.Email'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email') ? "old('email')" : null, ['id' => 'email', 'class' => 'form-control @error("email") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'email', 'autofocus'=>'autofocus']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('auth.Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control @error("password") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'current-password']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{ Form::checkbox('remember', trans('auth.Remember Me'), old('remember') ? 'checked' : '', ['id' => 'remember', 'class' => 'form-check-input']) }}
                                    {!! Form::label('remember', trans('auth.Remember Me'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{ Form::submit(trans('auth.Login'), ['class' => 'btn btn-primary']) }}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('auth.Forgot Your Password?')
                                    </a>
                                @endif
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
