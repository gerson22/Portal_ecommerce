@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color white-text">Crear cuenta</div>
                <div class="card-body">
                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} md-form">
                            <i class="fa fa-user prefix black-text"></i>
                            <input id="name" type="text" class="form-control pc" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <label for="name" class="col-md-4 control-label">Nombre de usuario</label>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} md-form">
                            <i class="fa fa-envelope prefix black-text"></i>
                            <input id="email" type="email" class="form-control pc" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} md-form">
                          <i class="fa fa-lock prefix black-text"></i>
                          <input id="password" type="password" class="form-control pc" name="password">

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                          <label for="password" class="col-md-4 control-label">Contraseña</label>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} md-form">
                            <i class="fa fa-lock prefix black-text"></i>
                            <input id="password-confirm" type="password" class="form-control pc" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 pull-right">
                                <button type="submit" class="btn elegant-color-dark">
                                    <i class="fa fa-btn fa-user"></i> Crear cuenta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
