@extends('layouts.layout')

@section('content')
<!--<div class="container" style="margin-top:24px;">-->
    <div class="row">
            <div class="col s12 m6 l6  push-l3">
                <div class="card grey lighten-4" style="margin-top: 67px;">
                    <div class="card-content black-text">
                        <span class="card-title">Login</span>
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="input-field col s12{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="email" type="text" class="validate"
                                    name="email" value="{{ old('email') }}">
                                    <label for="email">User</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="input-field col s12{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" type="password" name="password" class="validate">
                                    <label for="password">Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12">
                                    <input type="checkbox" id="test5" name="remember" />
                                    <label for="test5">Remember</label>
                                </div>
                            </div>

                            <div class="card-action">
                                <button 
                                    class="btn waves-effect waves-light blue darken-4 center-block" 
                                    type="submit" 
                                    name="action"
                                    style="margin-bottom: 15px;"><i class="fa fa-btn fa-sign-in"></i> Login</button><br>
                                <a class="waves-effect waves-indigo btn-flat indigo-text text-darken-4" href="{{ url('/password/reset') }}" style="padding: 0;">Forgot your Password?</a>    
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    
<!--</div>-->
@endsection
