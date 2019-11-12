@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENGESAHAN PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('create-parking-rental')}}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                            <tr>
                               <th>ID</th>
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
                               @foreach ($rental as $rentals)
                               <tr>
                                    <td>{{ $rentals->id }}</td>
                                    <td>{{ $rentals->studentid }}</td>
                                    <td>{{ $rentals->parkingid }}</td>
                                    <td>{{ $rentals->receiptNo }}</td>
                                    <td>{{ $rentals->plateNo }}</td>
                                    <td>{{ $rentals->carModel}}</td>
                                    <td>{{ $rentals->carColor}}</td>
                                    <td>{{ $rentals->status }}</td>
                                    <td>{{ $rentals->staffid }}</td>
                                    <td>
            
                                        <a href="{{route('approved-parking-rental', $rentals->id)}}" class="btn btn-warning">{{__('Diterima')}}</a>
                                        <a href="{{route('rejected-parking-rental', $rentals->id)}}" class="btn btn-warning">{{__('Ditolak')}}</a>
            
                                    </td>
                               </tr>
                               @endforeach
                            </tbody>
                         </table>
                        </form>
                        {{$rental->links() }}
                    </div>
                </div>
            </div>
            @endsection

                  