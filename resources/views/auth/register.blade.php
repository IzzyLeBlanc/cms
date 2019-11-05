@extends('layouts.app')

@section('content')
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="form" onsubmit="" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Matirc No. or UKMPer') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icNo" class="col-md-4 col-form-label text-md-right">{{ __('IC Number/Passport Number') }}</label>

                            <div class="col-md-6">
                                <input id="icNo" type="text" class="form-control @error('icNo') is-invalid @enderror" name="icNo" value="{{ old('icNo') }}" required autocomplete="icNo">

                                @error('icNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneNo" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phoneNo" type="text" class="form-control @error('phoneNo') is-invalid @enderror" name="phoneNo" value="{{ old('phoneNo') }}" required autocomplete="phoneNo">

                                @error('phoneNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role">
                                    <option value="student">Student</option>
                                    <option value="staff">Staff</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submitBtn" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                &emsp;
                                <button id="resetBtn" onclick="function reset(){
                                    document.getElementById('id').value = '';
                                    document.getElementById('name').value = '';
                                    document.getElementById('icNo').value = '';
                                    document.getElementById('email').value = '';
                                    document.getElementById('phoneNo').value = '';
                                    document.getElementById('address').value = '';
                                    document.getElementById('role').selectedIndex = 0;
                                    document.getElementById('submitBtn').innerHTML = '{{__('Register')}}';
                                    document.getElementById('form').action = '{{route('register')}}';
                                    var form;
                                    form = document.getElementById('form');
                                    form.setAttribute('onsubmit','');
                                    } reset(); return false;" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Role</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($user as $users)
                   <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->role }}</td>
                        <td>
                            <button class="btn btn-warning" onclick="function moveToField(){
                                document.getElementById('id').value = '{{ $users->id }}';
                                document.getElementById('name').value = '{{ $users->name }}';
                                document.getElementById('icNo').value = '{{ $users->icno }}';
                                document.getElementById('email').value = '{{ $users->email }}';
                                document.getElementById('phoneNo').value = '{{ $users->phoneNo }}';
                                document.getElementById('address').value = '{{ $users->address }}';
                                if('{{$users->role}}' === 'student'){
                                    document.getElementById('role').selectedIndex = 0;
                                }
                                else if('{{$users->role}}' === 'staff'){
                                    document.getElementById('role').selectedIndex = 1;
                                }
                                else if('{{$users->role}}' === 'admin'){
                                    document.getElementById('role').selectedIndex = 2;
                                }
                                document.getElementById('submitBtn').innerHTML = '{{__('Update')}}';
                                document.getElementById('form').action = '{{route('update-user')}}';
                                var form;
                                form = document.getElementById('form');
                                form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this user?\');');
                                } moveToField(); return false;">{{__('Update')}}
                            </button>
                        </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$user->links() }}
        </div>
    </div>
</div>
@endsection
