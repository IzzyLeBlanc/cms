@extends('layouts.layout')

@section('contents')
<div class="container">
    <div class="card-header text-center">
        SENARAI 
    </div>
    <div class="card-body ">
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
        <br>
        <div class="row justify-content-xl-center">
            <a href="{{route('facility-rental')}}"><button class="btn btn-outline-primary">PENGESAHAN PERMOHONAN SEWA KEMUDAHAN</button></a>
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
@endsection