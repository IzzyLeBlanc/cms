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
                <div class="card-header">{{ __('PENGESAHAN PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                <div class="card-body">
                
                    <table class="table table-striped">
                        <thead>
                        <tr>
                           <th>ID</th>
                           <th>No Matrik</th>
                           <th>Lot Parking</th>
                           <th>No. Receipt</th>
                           <th>No. Plat Kenderaan</th>
                           <th>Staff ID</th>
                           <th>Status</th>
                           <th>Komen</th>
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
                                <td>{{ $rentals->staffid }}</td>
                                <td>{{ $rentals->status }}</td>
                                <td>{{ $rentals->rejectReason}}</td>
                                <td>{{ $rentals->end}}</td>
                                <td>
                                       
                                        <button href="{{route('rejected-parking-rental', $rentals->id)}}" class="btn btn-danger" onclick="myFunction()" >{{ __('Ditolak') }}</button>
                                        <p id="reject"></p>
                                        <script>
                                        function myFunction() {
                                          var komen = prompt("Please give the reason");
                                          if (komen != null) {
                                            document.getElementById("reject").value=komen;
                                            return true;

                                          }
                                        }
                                    </script>

                                </td>
                                <td><a href="{{route('approved-parking-rental', $rentals->id)}}" class="btn btn-danger">{{__('Diterima')}}</a></td>

         
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                    {{$rental->links() }}
                </div>
            </div>
        </div>
        @endsection

                  