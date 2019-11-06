@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('create-parking-rental') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="studentid" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="studentid" id="studentid" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parkingid" class="col-md-4 col-form-label text-md-right">{{ __('No.Lot Parking:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="parkingid" id="parkingid" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="receiptNo" class="col-md-4 col-form-label text-md-right">{{ __('No. Receipt:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="receiptNo" id="receiptNo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plateNo" class="col-md-4 col-form-label text-md-right">{{ __('No. Plat Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="plateNo" id="plateNo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carModel" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="carModel" id="carModel" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carColor" class="col-md-4 col-form-label text-md-right">{{ __('Warna Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="carColor" id="carColor" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="status" id="status" disabled="disabled" required>
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
                   <th>No. Matrik</th>
                   <th>No. Parking Lot</th>
                   <th>No. Receipt</th>
                   <th>No. Plat Kenderaan</th>
                   <th>Jenis Kenderaaan</th>
                   <th>Warna Kenderaan</th>
                   <th>Status</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($parkingapp as $parkingapps)
                   <tr>
                        <td>{{ $parkingapps->studentid }}</td>
                        <td>{{ $parkingapps->parkingid }}</td>
                        <td>{{ $parkingapps->receiptNo}}</td>
                        <td>{{ $parkingapps->plateNo }}</td>
                        <td>{{ $parkingapps->carModel }}</td>
                        <td>{{ $parkingapps->carColor }}</td>
                        <td>{{ $parkingapps->status }}</td>
                        <td>
                            <a href="{{route('delete-parking-rental', $parkings->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
                            <a href="{{route('update-parking-rental', $parkings->id)}}" class="btn btn-danger">{{__('Edit')}}</a>
                          </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$parkingapp->links() }}
        </div>
    </div>
</div>
@endsection