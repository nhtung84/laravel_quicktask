@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Reset Password')</div>

                <div class="card-body">
                    {!! Form::open(['method'=> 'POST', 'routes' => 'password.update']) !!}

                        {{ Form::hidden('token', $token) }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            {!! Form::email('email', trans('E-Mail Address'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control @error("email") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'email', 'autofocus' => 'autofocus', 'required' => 'required']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control @error("password") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'new-password']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm', trans('Confirm Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'new-password']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(trans('Reset Password'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
