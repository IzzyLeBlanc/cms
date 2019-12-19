@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENGESAHAN PERMOHONAN TEMPAT KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-facility-rental')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="facilityid" class="col-md-4 col-form-label text-md-right">{{ __('No. Fasiliti:') }}</label>
    
                            <div class="col-md-6">
                                <select name="facilityid" id="facilityid" class="form-control">
                                    <option value="">{{ __('No. Fasiliti') }}</option>
                                    <option value="A">{{ __('RK01') }}</option>
                                    <option value="B">{{ __('RK02') }}</option>
                                    <option value="C">{{ __('RK03') }}</option>
                                    <option value="D">{{ __('RK04') }}</option>
                                    <option value="E">{{ __('RK05') }}</option>
                                    <option value="F">{{ __('RK06') }}</option>
                                    <option value="G">{{ __('RK07') }}</option>
                                    <option value="H">{{ __('RK08') }}</option>
                                </select>
                            </div>
                        </div>
    
                    <div class="form-group row">
                        <label for="programName" class="col-md-4 col-form-label text-md-right">{{ __('Nama Program(Jika Ada):') }}</label>
    
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="programName" id="programName" >
                        </div>
                    </div>
    
                    <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh Mula:') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="datetime" name="start_date" id="start_date" placeholder="day/month/year" required>
                            </div>
                    </div>
    
                    <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh Akhir:') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="datetime" name="end_date" id="end_date" placeholder="day/month/year" required>
                            </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Masa Mula:') }}</label>
    
                        <div class="col-md-6">
                            <input class="form-control" type="time" name="start_time" id="start_time" required>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('Masa Akhir:') }}</label>
    
                        <div class="col-md-6">
                            <input class="form-control" type="time" name="end_time" id="end_time" required>
                        </div>
                    </div>
    
                    <div class="form-group row">
                            <label for="receiptNo" class="col-md-4 col-form-label text-md-right">{{ __('No. Receipt:') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="receiptNo" id="receiptNo" required>
                            </div>
                    </div>
    
                    <input type="hidden" name="id" id="id" value="">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Program Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Staffid</th>
                                <th>No. Receipt</th>
                                <!--<th>Checkout Time</th>-->
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($facility_rental as $facility_rentals)
                                <tr>
                                    <td>{{ $facility_rentals->id }}</td>
                                    <td>{{ $facility_rentals->user_id }}</td>
                                    <td>{{ $facility_rentals->program_name }}</td>
                                    <td>{{ $facility_rentals->start_date }}</td>
                                    <td>{{ $facility_rentals->end_date }}</td>
                                    <td>{{ $facility_rentals->start_time }}</td>
                                    <td>{{ $facility_rentals->end_time}}</td>
                                    <td>{{ $facility_rentals->status }}</td>
                                    <td>{{ $facility_rentals->staffid }}</td>
                                    <td>{{ $facility_rentals->no_receipt }}</td>
                                    <td>
                                            <a href="{{route('approved-facility-rental', $facility_rentals->id)}}" class="btn btn-warning">{{__('Diterima')}}</a>
                                            <a href="{{route('rejected-facility-rental', $facility_rentals->id)}}" class="btn btn-warning">{{__('Ditolak')}}</a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </form>
                    {{$facility_rental->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection