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
                <div class="card-header">{{ __('PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-parking-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <!--<div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="id" id="id" required>
                                </div>
                        </div>-->
    
                        <!--<div class="form-group row">
                            <label for="studentid" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="studentid" id="studentid" required>
                            </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="parkingid" class="col-md-4 col-form-label text-md-right">{{ __('Lot Parking:') }}</label>

                            <div class="col-md-6">
                                <select name="parkingid" id="parkingid" class="form-control">
                                    <option value="">{{ __('Senarai Lot Parking') }}</option>
                                    <option>{{ __('id') }}</option>
                                </select>
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
                                <label for="rejectReason" class="col-md-4 col-form-label text-md-right">{{ __('Maklumat Borang:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="rejectReason" id="rejectReason" required>
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
                       <th>ID</th>
                       <th>No Matrik</th>
                       <th>Lot Parking</th>
                       <th>No. Receipt</th>
                       <th>No. Plat Kenderaan</th>
                       <th>Jenis Kenderaan</th>
                       <th>Warna Kenderaan</th>
                       <th>Staff ID</th>
                       <th>Status</th>
                       <th>Maklumat Borang</th>
                       <th>Tarikh Akhir</th>

                       <th></th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($rental as $rentals)
                       <tr>
                            <td>{{ $rentals->id }}</td>
                            <td>{{ $rentals->studentid }}</td>
                            <td>{{ $rentals->parkingid }}</td>
                            <td>{{ $rentals->receiptNo }}</td>
                            <td>{{ $rentals->plateNo }}</td>
                            <td>{{ $rentals->carModel}}</td>
                            <td>{{ $rentals->carColor}}</td>
                            <td>{{ $rentals->staffid }}</td>
                            <td>{{ $rentals->status }}</td>
                            <td>{{ $rentals->rejectReason}}</td>
                            <td>{{ $rentals->end}}</td>
                            
                       </tr>
                       @endforeach
                    </tbody>
                 </table>
                {{$rental->links() }}
            </div>
        </div>
    </div>
    @endsection