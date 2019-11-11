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

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection