@extends('layouts.layout')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('statusfail'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('statusfail')}}
            </div>
            @endif
            @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{Session::get('status')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="oldpw" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
    
                            <div class="col-md-6">
                                <input id="oldpw" type="password" class="form-control" name="oldpw" required autofocus>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="newpw" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
                            <div class="col-md-6">
                                <input id="newpw" type="password" class="form-control" name="newpw" required>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password-confirm" required>
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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