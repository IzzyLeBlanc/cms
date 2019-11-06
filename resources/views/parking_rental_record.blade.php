@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENGESAHAN REKOD PENYEWAAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-room-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="user_id" id="user_id" required autofocus class="form-control" placeholder="A123456" pattern="A(\d{6})">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label text-md-right">{{ __('Blok:') }}</label>

                            <div class="col-md-6">
                                <select name="block" id="block" class="form-control">
                                    <option value="">{{ __('Pilih Blok') }}</option>
                                    <option value="A">{{ __('A') }}</option>
                                    <option value="B">{{ __('B') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Aras:') }}</label>

                            <div class="col-md-6">
                                <select name="floor" id="floor" class="form-control">
                                    <option value="">{{ __('Pilih Aras') }}</option>
                                    <option value="1">{{ __('1') }}</option>
                                    <option value="2">{{ __('2') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('No. Bilik:') }}</label>

                            <div class="col-md-6">
                                <select name="room" id="room" class="form-control">
                                    <option value="">{{ __('Pilih Bilik') }}</option>
                                    <option value="1">{{ __('1') }}</option>
                                    <option value="2">{{ __('2') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sem" class="col-md-4 col-form-label text-md-right">{{ __('Semester:') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="sem" id="sem" class="form-control" min="1" max="3" placeholder="1">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
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
                        <td><a href="{{route('checkout', $records->id)}}" class="btn btn-danger">{{__('Daftar Keluar')}}</a></td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$record->links() }}
        </div>
    </div>
</div>
@endsection