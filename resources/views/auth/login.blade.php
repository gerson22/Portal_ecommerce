@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header elegant-color">Iniciar sesión</div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} md-form">
                            <i class="fa fa-envelope prefix black-text"></i>
                            <input id="email" type="email" class="form-control in-y" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label for="email" class="col-md-4 control-label">Correo electronico</label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} md-form">
                            <i class="fa fa-lock prefix black-text"></i>
                            <input id="password" type="password" class="form-control in-y" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-4">
                              <div class="col-md-4 col-md-offset-4">
                                  <fieldset class="form-group">
                                      <input type="checkbox" id="remember" name="remember">
                                      <label for="remember">Recordarme</label>
                                  </fieldset>
                              </div>
                          </div>

                          <div class="form-group col-md-8">
                              <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                  <a class="grey-text" href="{{ url('/password/reset') }}">¿Haz olvidaste tu contraseña?</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn elegant-color-dark pull-right">
                                        <i class="fa fa-btn fa-sign-in"></i> Iniciar sesión
                                    </button>
                                </div>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
