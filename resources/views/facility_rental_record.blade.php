@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENDAFTARAN REKOD PENYEWAAN KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-facility-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="user_id" id="user_id" required autofocus class="form-control" placeholder="A141141" pattern="A(\d{6})">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Program(Jika Ada):') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label tex-md-right">{{ __('Fasiliti yang Ditempah:') }}</label>

                            <div class="col-md-6">
                                <select name="room" id="room" class="form-control">
                                    <option value="">{{ __('Pilih Kemudahan') }}</option>
                                    <option value="1">{{ __('Dewan Besar Zaba') }}</option>
                                    <option value="2">{{ __('Kafeteria Zaba') }}</option>
                                    <option value="3">{{ __('Perpustakaan Zaba') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Hantar') }}
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
                   <th>Program name</th>
                   <th>Facility</th>
                   <th>No. Receipt</th>
                   <th>Checkout Time</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($record as $records)
                   <tr>
                        <td>{{ $records->id }}</td>
                        <td>{{ $records->user_id }}</td>
                        <td>{{ $records->program_name }}</td>
                        <td>{{ $records->facility }}</td>
                        <td>{{ $records->no_receipt }}</td>
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