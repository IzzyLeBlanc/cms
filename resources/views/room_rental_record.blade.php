@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{Session::get('status')}}
            </div>
            @endif
            @if(Session::has('statusfail'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('statusfail')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('PENDAFTARAN REKOD PENYEWAAN BILIK') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" action="{{route('create-room-rental')}}" enctype="multipart/form-data" name="form" >
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="user_id" id="user_id" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label text-md-right">{{ __('Blok:') }}</label>

                            <div class="col-md-6">
                                <select name="block" id="block" class="form-control">
                                    @foreach ($room as $rooms)
                                    <option value="{{ $rooms->block }}">{{ ( $rooms->block) }}</option>
                                    @endforeach
                                </select>
                                 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Aras:') }}</label>

                            <div class="col-md-6">
                                <select name="floor" id="floor" class="form-control">
                                    @foreach ($room as $rooms)
                                    <option value="{{ $rooms->floor }}">{{ ( $rooms->floor) }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('No. Bilik:') }}</label>

                            <div class="col-md-6">
                                <select name="room" id="room" class="form-control">
                                    @foreach ($room as $rooms)
                                    <option value="{{ $rooms->id }}">{{ ( $rooms->id) }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sem" class="col-md-4 col-form-label text-md-right">{{ __('Semester:') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="sem" id="sem" class="form-control" min="1" max="3">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="create" id="create">
                                    {{ __('Daftar') }}
                                </button>
                                <button type="reset" class="btn btn-primary" name="reset" id="reset">
                                    {{ __('Semula') }}
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
                   <th>User ID</th>
                   <th>Room</th>
                   <th>Floor</th>
                   <th>Block</th>
                   <th>Sem</th>
                   <th>Checkout Time</th>
                   <th>Staff ID</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($record as $records)
                   <tr>
                        <td>{{ $records->id }}</td>
                        <td>{{ $records->user_id }}</td>
                        <td>{{ $records->room }}</td>
                        <td>{{ $records->floor }}</td>
                        <td>{{ $records->block }}</td>
                        <td>{{ $records->sem }}</td>
                        <td>{{ $records->checkout }}</td>
                        <td>{{ $records->staffid }}</td>
                        <td>
                            <a href="{{route('checkout-room', $records->id)}}" class="btn btn-danger">{{__('Daftar Keluar')}}</a>
                            @if ($records->checkout === null)
                            <button id="updateBtn" class="btn btn-warning" onclick="function moveToField(){
                                document.getElementById('id').value = '{{ $records->id }}';
                                document.getElementById('user_id').value = '{{ $records->user_id }}';
                                document.getElementById('room').value = '{{ $records->room }}';
                                document.getElementById('floor').value = '{{ $records->floor }}';
                                document.getElementById('block').value = '{{ $records->block }}';
                                document.getElementById('sem').value = '{{ $records->sem }}';
                                document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                                document.getElementById('form').action = '{{route('update-room-rental')}}';
                                var form;
                                form = document.getElementById('form');
                                form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this room record?\');');
                                } moveToField(); return false;">{{__('Perbaharui')}}
                            </button>
                            @endif
                            
                        </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$record->links() }}
        </div>
    </div>
</div>
@endsection