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
                <button class="btn btn-outline-primary">PENDAFTARAN REKOD SEWAAN BILIK</button>
            </div>
        </div>
        <div class="card-header text-center">
            PENGESAHAN
        </div>
        <div class="card-body">
            <div class="row justify-content-xl-center">
                <button class="btn btn-outline-primary">PERMOHONAN TEMPAT LETAK KERETA</button>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                <button class="btn btn-outline-primary">PERMOHONAN TEMPAT KEMUDAHAN</button>
            </div>
        </div>
        
    </div>
@endsection