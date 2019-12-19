@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-2">
        <div class="card">
            <div class="card-header text-center">
                SENARAI RUANG
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <button onclick="myFunction()">RK01</button>
                    <div id="myDIV">
                        <tr>
                            <th>Nama: Dewan Besar Zaba</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction() {
                        var x = document.getElementById("myDIV");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script> 
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction2()">RK02</button>
                    <div id="myDIV2">
                        <tr>
                            <th>Nama: Bilik Seminar Tun Abdul Rahman Yakub</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction2() {
                        var x = document.getElementById("myDIV2");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction3()">RK03</button>
                    <div id="myDIV3">
                        <tr>
                            <th>Nama: Bilik Seminar Tun Abdul Razak</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction3() {
                        var x = document.getElementById("myDIV3");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction4()">RK04</button>
                    <div id="myDIV4">
                        <tr>
                            <th>Nama: Perpustakaan Ibn Rushd</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction4() {
                        var x = document.getElementById("myDIV4");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction5()">RK05</button>
                    <div id="myDIV5">
                        <tr>
                            <th>Nama: Gelanggang Futsal</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction5() {
                        var x = document.getElementById("myDIV5");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction6()">RK06</button>
                    <div id="myDIV6">
                        <tr>
                            <th>Nama: Kafetaria Zaba</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction6() {
                        var x = document.getElementById("myDIV6");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction7()">RK07</button>
                    <div id="myDIV7">
                        <tr>
                            <th>Nama: Bilik Mesyuarat</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction7() {
                        var x = document.getElementById("myDIV7");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <button onclick="myFunction8()">RK08</button>
                    <div id="myDIV8">
                        <tr>
                            <th>Nama: Bilik Wacana Kerjaya</th>
                            <br>
                            <th>Harga: RM20 sejam</th>
                            <br>
                            <th>Kelebihan: Luas </th>
                        </tr>
                    </div>
                    <script>
                    function myFunction8() {
                        var x = document.getElementById("myDIV8");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            } else {
                                x.style.display = "none";
                                }
                            }
                    </script>
                </div>
            </div>  
        </div>    
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header text-center">{{ __('PERMOHONAN SEWA RUANG KEMUDAHAN') }}</div>
            
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
                                <input class="form-control" type="date" name="start_date" id="start_date" placeholder="day/month/year" required>
                            </div>
                    </div>
    
                    <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh Akhir:') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="date" name="end_date" id="end_date" placeholder="day/month/year" required>
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
        <table class="table table-striped" id="table">
            <thead>
            <tr>
               <th>ID</th>
               <th>No. Matrik</th>
               <th>Facility ID</th>
               <th>Nama Program</th>
               <th>Tarikh Mula</th>
               <th>Tarikh Akhir</th>
               <th>Masa Mula</th>
               <th>Masa Akhir</th>
               <th>Status</th>
               <th>Staff ID</th>
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
                   <td>{{ $facility_rentals->end_date}}</td>
                   <td>{{ $facility_rentals->start_time }}</td>
                   <td>{{ $facility_rentals->end_time }}</td>
                   <td>{{ $facility_rentals->status }}</td>
                   <td>{{ $facility_rentals->staffid }}</td>
                   <td>{{ $facility_rentals->receiptNo}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
        {{$facility_rental->links() }}
    </div>
</div>
@endsection