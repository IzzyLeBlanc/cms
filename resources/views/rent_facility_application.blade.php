@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PERMOHONAN SEWA KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form method="POST"  action="">
                        @csrf

                        <div class="form-group row">
                            <label for="matrix" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="matrix" id="matrix" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Program:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label tex-md-right">{{ __('Fasiliti yang Digunakan:') }}</label>

                            <div class="col-md-6">
                                <select name="room" id="room" class="form-control">
                                    <option value="">{{ __('Pilih Kemudahan') }}</option>
                                    <option value="1">{{ __('Dewan Besar Zaba') }}</option>
                                    <option value="2">{{ __('Kafeteria Zaba') }}</option>
                                    <option value="3">{{ __('Perpustakaan Zaba') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date-start" class="col-md-4 col-form-label tex-md-right">{{ __('Tarikh Mula:') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="date-start" id="date-start" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date-end" class="col-md-4 col-form-label tex-md-right">{{ __('Tarikh Akhir:') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="date-end" id="date-end" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Hantar Permohonana') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection