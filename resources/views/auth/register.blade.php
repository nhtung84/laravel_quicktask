@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.Register')</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'routes' => 'register']) !!}

                        <div class="form-group row">
                            {!! Form::label('name', trans('auth.Name'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control @error("name") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'name', 'autofocus' => 'autofocus'])}}

                                @include('errors.form_validation')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email', trans('auth.Email'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email') ? "old('email')" : null,['id' => 'email', 'class' => 'form-control @error("email") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'email', 'autofocus'=>'autofocus']) }}

                                @include('errors.form_validation')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('auth.Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control @error("password") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'password']) }}

                                @include('errors.form_validation')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm', trans('auth.Confirm Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'new-password']) }}

                                @include('errors.form_validation')
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(trans('auth.Register'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
