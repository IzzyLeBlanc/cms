@extends('layouts.rental')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-parking-rental')}}" enctype="multipart/form-data">
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

                            <div class="form-group row">
                            <label for="staffid" class="col-md-4 col-form-label text-md-right">{{ __('ID Staff:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="staffid" id="staffid" disabled="disabled" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="create" id="create">
                                        {{ __('Hantar') }}
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
                       <th>No Matrik</th>
                       <th>No.Lot Parking</th>
                       <th>No. Receipt</th>
                       <th>No. Plat Kenderaan</th>
                       <th>Jenis Kenderaan</th>
                       <th>Warna Kenderaan</th>
                       <th>Status</th>
                       <th>Staff ID</th>
                       <th></th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($rental as $rentals)
                       <tr>
                            <td>{{ $rentals->studentid }}</td>
                            <td>{{ $rentals->parkingid }}</td>
                            <td>{{ $rentals->receiptNo }}</td>
                            <td>{{ $rentals->plateNo }}</td>
                            <td>{{ $rentals->carModel}}</td>
                            <td>{{ $rentals->carColor}}</td>
                            <td>{{ $rentals->status }}</td>
                            <td>{{ $rentals->staffid }}</td>
                            <td>
    
                                <button class="btn btn-warning" onclick="function moveToField(){
                                    document.getElementById('studentid').value = '{{ $rentals->studentid}}';
                                    document.getElementById('parkingid').value = '{{ $rentals->parkingid }}';
                                    document.getElementById('receiptNo').value = '{{ $rentals->receiptNo }}';
                                    document.getElementById('plateNo').value = '{{ $rentals->plateNo }}';
                                    document.getElementById('carModel').value = '{{ $rentals->carModel }}';
                                    document.getElementById('carColor').value = '{{ $rentals->carColor }}';
                                    document.getElementById('status').value = '{{ $rentals->status }}';
                                    document.getElementById('staffid').value = '{{ $rentals->staffid }}';
                                    document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                                    document.getElementById('form').action = '{{route('update-parking-rental')}}';
                                    var form;
                                    form = document.getElementById('form');
                                    form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this parking record?\');');
                                    } moveToField(); return false;">{{__('Perbaharui')}}
                                </button>
                            </td>
                       </tr>
                       @endforeach
                    </tbody>
                 </table>
                {{$rental->links() }}
            </div>
        </div>
    </div>
    @endsection