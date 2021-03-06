@extends('layouts.layout')

@section('contents')
    <div class="container">
        <div class="card-header text-center">
            SENARAI 
        </div>
        <div class="card-body ">
            <div class="row justify-content-xl-center">
                <a href="{{route('register')}}"><button class="btn btn-outline-primary">PENDAFTARAN PELAJAR</button></a>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                <a href="{{route('room-rental')}}"><button class="btn btn-outline-primary">PENDAFTARAN REKOD SEWAAN BILIK</button></a>
            </div>
        </div>
        <div class="card-header text-center">
            PENGESAHAN
        </div>
        <div class="card-body">
            <div class="row justify-content-xl-center">
                <a href="{{route('parkingapp')}}"><button class="btn btn-outline-primary">PENGESAHAN TEMPAT LETAK KERETA</button></a>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                <a href="{{route('facility-rental')}}"><button class="btn btn-outline-primary">PENGESAHAN TEMPAT KEMUDAHAN</button></a>
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
@endsection