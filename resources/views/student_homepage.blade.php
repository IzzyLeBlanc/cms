@extends('layouts.layout')
@section('contents')
    <div class="container">
        <div class="card-header text-center">
            SENARAI
        </div>
        <div class="card-body ">
            <div class="row justify-content-xl-center">
                <a href="{{route('facility')}}"><button class="btn btn-outline-primary">PERMOHONAN KEMUDAHAN</button></a>
            </div>
            <br>
            <div class="row justify-content-xl-center">
                <a href="{{route('parking')}}"><button class="btn btn-outline-primary">PERMOHONAN TEMPAT LETAK KERETA</button></a>
            </div>
        </div>
    </div>
@endsection