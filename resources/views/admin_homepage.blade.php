@extends('layouts.layout')

@section('contents')
<div class="sidebar">
    <div class="card-header text-center">
        SENARAI 
    </div>
    <div class="card-body">
        <div class="row justify-content-xl-center">
            <a href="{{route('register')}}"><button class="btn btn-outline-primary">PENDAFTARAN PELAJAR/STAF</button></a>
        </div>
        <br>
        <div class="row justify-content-xl-center">
            <a href="{{route('room-rental')}}"><button class="btn btn-outline-primary">PENDAFTARAN REKOD SEWAAN BILIK</button></a>
        </div>
        <br>
        <div class="row justify-content-xl-center">
            <a href="{{route('room')}}" ><button class="btn btn-outline-primary">PENAMBAHAN BILIK</button></a>
        </div>
        <br>
        <div class="row justify-content-xl-center">
            <a href="{{route('parking')}}"><button class="btn btn-outline-primary">PENAMBAHAN TEMPAT LETAK KERETA</button></a>
        </div>
        <br>
        <div class="row justify-content-xl-center">
                <a href="{{route('facility')}}"><button class="btn btn-outline-primary">PENAMBAHAN RUANG KEMUDAHAN</button></a>
        </div>
    </div>
    <div class="card-header text-center">
        PENGESAHAN
    </div>
    <div class="card-body">
        <div class="row justify-content-xl-center">
            <a href="{{route('parkingapp')}}"><button class="btn btn-outline-primary">PERMOHONAN TEMPAT LETAK KERETA</button></a>
        </div>
        <br>
        <div class="row justify-content-xl-center">
            <a href="{{route('facility-rental')}}"><button class="btn btn-outline-primary">PERMOHONAN SEWA KEMUDAHAN</button></a>
        </div>
    </div>
    <div class="card-header text-center">
        LAIN-LAIN
    </div>
    <div class="card-body">
        <div class="row justify-content-xl-center">
            <a href="{{route('change-password')}}"><button class="btn btn-outline-primary">TUKAR KATA LALUAN</button></a>
        </div>
    </div>
</div>

<div class="main-box">
    <div class="row justify-content-center">
        <div class='col-md-12'>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    <div style="width: 100%; display: table;">
                        <div style="display: table-row">
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <p>Room</p>
                            </div>
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <p>Parking</p>
                            </div>
                        </div>
                        <div style="display: table-row">
                            <div class="category" style="height: 30vh;width: 50vh; display: table-cell;">
                                <div style="height: 200px" class="ct-chart"></div>
                            </div>
                            <script>
                                var data = {
                                    labels: ['Occupied', 'Empty'],
                                    series: [{{$space[1]}}, {{$space[0] - $space[1]}}]
                                };

                                var options = {
                                    labelInterpolationFnc: function(value) {
                                        return value[0]
                                    }
                                };

                                var responsiveOptions = [
                                    ['screen and (min-width: 640px)', {
                                        chartPadding: 30,
                                        labelOffset: 100,
                                        labelDirection: 'explode',
                                        labelInterpolationFnc: function(value) {
                                        return value;
                                        }
                                    }],
                                    ['screen and (min-width: 1024px)', {
                                        labelOffset: 80,
                                        chartPadding: 20
                                    }]
                                ];

                                new Chartist.Pie('.ct-chart', data, options, responsiveOptions);
                            </script>
                            <div class="category" style="height: 30vh;width: 50vh; display: table-cell;">
                                <div style="height: 200px" class="ct-chart2"></div>
                            </div>
                            <script>
                                var data = {
                                    labels: ['Occupied', 'Empty'],
                                    series: [{{$occupiedParkingLot}}, {{$totalParkingLot - $occupiedParkingLot}}]
                                };

                                var options = {
                                    labelInterpolationFnc: function(value) {
                                        return value[0]
                                    }
                                };

                                var responsiveOptions = [
                                    ['screen and (min-width: 640px)', {
                                        chartPadding: 30,
                                        labelOffset: 100,
                                        labelDirection: 'explode',
                                        labelInterpolationFnc: function(value) {
                                        return value;
                                        }
                                    }],
                                    ['screen and (min-width: 1024px)', {
                                        labelOffset: 80,
                                        chartPadding: 20
                                    }]
                                ];

                                new Chartist.Pie('.ct-chart2', data, options, responsiveOptions);
                            </script>
                        </div>
                        <div style="display: table-row">
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <p>Facilities used in the past month</p>
                            </div>
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <p></p>
                            </div>
                        </div>
                        <div style="display: table-row">
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <h1 style="margin-left: auto; margin-right: auto">{{$facilityUsePastMonth}}</p>
                            </div>
                            <div class="category" style="width: 50vh; display: table-cell;">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection