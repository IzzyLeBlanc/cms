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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Program Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Staffid</th>
                                <th>No. Receipt</th>
                                <th>Checkout Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($facility_rent as $facility_rental)
                                <tr>
                                    <td>{{ $facility_rental->id }}</td>
                                    <td>{{ $facility_rental->user_id }}</td>
                                    <td>{{ $facility_rental->program_name }}</td>
                                    <td>{{ $facility_rental->start_date }}</td>
                                    <td>{{ $facility_rental->end_date }}</td>
                                    <td>{{ $facility_rental->status }}</td>
                                    <td>{{ $facility_rental->staffid }}</td>
                                    <td>{{ $facility_rental->no_receipt }}</td>
                                    <td>
                                            <a href="{{route('approved-facility-rental', $facility_rental->id)}}" class="btn btn-warning">{{__('Diterima')}}</a>
                                            <a href="{{route('rejected-facility-rental', $facility_rental->id)}}" class="btn btn-warning">{{__('Ditolak')}}</a>
                                            <a href="{{route('delete-facility-rental', $facility_rental->id)}}" class="btn btn-danger">{{__('Delete')}}</a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </form>
                    {{$facility_rent->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection