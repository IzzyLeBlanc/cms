@extends('layouts.layout')
@section('contents')
    <div class="container">
        <div class="card-header text-center">
            SENARAI
        </div>
        <div class="card-body ">
            <div class="row justify-content-xl-center">
                <a href="{{route('facility-rental')}}"><button class="btn btn-outline-primary">PERMOHONAN SEWA KEMUDAHAN</button></a>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                <a href="{{route('parkingapp')}}"><button class="btn btn-outline-primary">PERMOHONAN TEMPAT LETAK KERETA</button></a>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                    <a href="{{route('change-password')}}"><button class="btn btn-outline-primary">TUKAR KATA LALUAN</button></a>
            </div>
        </div>
    </div>
@endsection