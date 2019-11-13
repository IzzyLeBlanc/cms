@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PERMOHONAN SEWA KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" action="{{route('create-facility-rental')}}" enctype="multipart/form-data" name="form">
                        @csrf

                         <!--<div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="id" id="id" required>
                                </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="studentid" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="studentid" id="studentid" required autofocus class="form-control" placeholder="A123456" pattern="A(\d{6})">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="facilityid" class="col-md-4 col-form-label text-md-right">{{ __('No. Fasiliti:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="facilityid" id="facilityid" required>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="programName" class="col-md-4 col-form-label text-md-right">{{ __('Nama Program(Jika Ada):') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="programName" id="programName" required>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh dan Masa Mula:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="datetime-local" name="start_date" id="start_date" required>
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh dan Masa Selesai:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="datetime-local" name="end_date" id="end_date" required>
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="no_receipt" class="col-md-4 col-form-label text-md-right">{{ __('No. Receipt:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="no_receipt" id="no_receipt" required>
                                </div>
                        </div>


                        <!--<div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="status" disabled="disabled" id="status" required>
                                </div>
                            
                            <div class="form-group row">
                                <label for="staffid" class="col-md-4 col-form-label text-md-right">{{ __('ID Staff:') }}</label>
                                
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="staffid" id="staffid" disabled="disabled" required>
                                </div>    
                        </div>-->

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
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                   <th>ID</th>
                   <th>Student ID</th>
                   <th>Facility ID</th>
                   <th>Program Name</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                   <th>Status</th>
                   <th>Staffid</th>
                   <th>No. Receipt</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($facility_rental as $facility_rentals)
                   <tr>
                        <td>{{ $facility_rentals->id }}</td>
                        <td>{{ $facility_rentals->facilityid }}</td>
                        <td>{{ $facility_rentals->studentid }}</td>
                        <td>{{ $facility_rentals->programName }}</td>
                        <td>{{ $facility_rentals->start_date }}</td>
                        <td>{{ $facility_rentals->end_date }}</td>
                        <td>{{ $facility_rentals->status }}</td>
                        <td>{{ $facility_rentals->staffid }}</td>
                        <td>{{ $facility_rentals->no_receipt }}</td>
                        <td>
                            <button class="btn btn-warning" onclick="function moveToField(){
                                document.getElementById('studentid').value = '{{ $facility_rentals->studentid}}';
                                document.getElementById('studentid').value = '{{ $facility_rentals->facilityid}}';
                                document.getElementById('id').value = '{{ $facility_rentals->id }}';
                                document.getElementById('program_name').value = '{{ $facility_rentals->programName }}';
                                document.getElementById('start_date').value = '{{ $facility_rentals->start_date }}';
                                document.getElementById('end_date').value = '{{ $facility_rentals->end_date }}';
                                document.getElementById('no_receipt').value = '{{ $facility_rentals->no_receipt}}';
                                document.getElementById('status').value = '{{ $facility_rentals->status }}';
                                document.getElementById('staffid').value = '{{ $facility_rentals->staffid }}';
                                document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                                document.getElementById('form').action = '{{route('update-facility-rental')}}';
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
            {{$facility_rental->links() }}
        </div>
    </div>
</div>
@endsection