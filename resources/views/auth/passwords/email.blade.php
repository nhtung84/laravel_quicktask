@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Reset Password')</div>

                <div class="card-body">
                    @include('errors.status')

                    {!! Form::open(['method' => 'post', 'routes' => 'password.email'])!!}

                        <div class="form-group row">
                            {!! Form::label('email', trans('E-Mail Address'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control @error("email") is-invalid @enderror', 'required' => 'required', 'autocomplete' => 'email', 'autofocus' => 'autofocus', 'required' => 'required']) }}

                                @include('errors.form_validation')

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(trans('Send Password Reset Link'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
