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
                <div class="card-header">{{ __('PERMOHONAN SEWA KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-facility-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="studentid" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="studentid" id="studentid" required autofocus class="form-control" placeholder="A123456" pattern="A(\d{6})">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="program_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Program(Jika Ada):') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="program_name" id="program_name" required>
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
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status:') }}</label>
    
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="status" disabled="disabled" id="status" required>
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="create" id="create" formaction="{{route('create-facility-rental')}}">
                                        {{ __('Hantar') }}
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
                   <th>Program Name</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                   <th>Status</th>
                   <th>No. Receipt</th>
                   <th>Checkout Time</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($facility_rent as $facility_rental)
                   <tr>
                        <td>{{ $facility_rental->id }}</td>
                        <td>{{ $facility_rental->user_id }}</td>
                        <td>{{ $facility_rental->program_name }}</td>
                        <td>{{ $facility_rental->start_date }}</td>
                        <td>{{ $facility_rental->end_date }}</td>
                        <td>{{ $facility_rental->status }}</td>
                        <td>{{ $facility_rental->no_receipt }}</td>
                        <td>{{ $facility_rental->checkout }}</td>
                        <td><a href="{{route('checkout', $facility_rental->id)}}" class="btn btn-danger">{{__('Daftar Keluar')}}</a></td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$facility_rent->links() }}
        </div>
    </div>
</div>
@endsection