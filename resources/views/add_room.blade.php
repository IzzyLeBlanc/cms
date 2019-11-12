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
                <div class="card-header">{{ __('PENAMBAHAN BILIK') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('create-room') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label tex-md-right">{{ __('Blok:') }}</label>

                            <div class="col-md-6">
                                <input name="block" id="block" class="form-control" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor" class="col-md-4 col-form-label tex-md-right">{{ __('Aras:') }}</label>

                            <div class="col-md-6">
                                <input name="floor" type="number" id="floor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label tex-md-right">{{ __('No. Bilik:') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="room" id="room" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="create" id="create">
                                    {{ __('Hantar') }}
                                </button>
                                <button class="btn btn-primary"type="reset" name="reset" id="reset">
                                    {{__('Semula')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                   <th>No. Bilik</th>
                   <th>Floor</th>
                   <th>Block</th>
                   <th>Staff ID</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($room as $rooms)
                   <tr>
                        <td>{{ $rooms->id }}</td>
                        <td>{{ $rooms->floor }}</td>
                        <td>{{ $rooms->block }}</td>
                        <td>{{ $rooms->staffid }}</td>
                        <td>
                          <a href="{{route('delete-room', $rooms->id)}}" class="btn btn-danger">{{__('Padam')}}</a>

                          <button class="btn btn-warning" onclick="function moveToField(){
                            document.getElementById('room').value = '{{ $rooms->id }}';
                            document.getElementById('floor').value = '{{ $rooms->floor }}';
                            document.getElementById('block').value = '{{ $rooms->block }}';
                            document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                            document.getElementById('form').action = '{{route('update-room')}}';
                            var form;
                            form = document.getElementById('form');
                            form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this room?\');');
                            } moveToField(); return false;">{{__('Perbaharui')}}
                           </button>
                        </td>

                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$room->links() }}
        </div>
    </div>
</div>
@endsection