@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN BILIK') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-room')}}" enctype="multipart/form-data">
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
                                <button type="submit" class="btn btn-primary" name="create" id="create" formaction="{{route('create-room')}}">
                                    {{ __('Hantar') }}
                                </button>
                                <button class="btn btn-primary"type="submit" name="update" id="update" formaction="{{route('update-room')}}">
                                    {{__('Perbaharui')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                   <th>Room No.</th>
                   <th>Floor</th>
                   <th>Block</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($room as $rooms)
                   <tr>
                        <td>{{ $rooms->id }}</td>
                        <td>{{ $rooms->floor }}</td>
                        <td>{{ $rooms->block }}</td>
                        <td>
                          <a href="{{route('delete-room', $rooms->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
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