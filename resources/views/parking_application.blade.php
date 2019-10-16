@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                
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
                            <label for="bilik" class="col-md-4 col-form-label text-md-right">{{ __('No. Bilik:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="bilik" name="bilik" id="bilik" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sesi" class="col-md-4 col-form-label tex-md-right">{{ __('Sesi:') }}</label>

                            <div class="col-md-6">
                                <select name="Sesi" id="floor" class="form-control">
                                    <option value="">{{ __('Pilih Sesi') }}</option>
                                    <option value="1">{{ __('2017/2018') }}</option>
                                    <option value="2">{{ __('2018/2019') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plat" class="col-md-4 col-form-label text-md-right">{{ __('No. Plat Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="plat" id="plat" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="jenis" id="jenis" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="warna" class="col-md-4 col-form-label text-md-right">{{ __('Warna Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="warna" id="warna" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label tex-md-right">{{ __('Jenis CC kereta:') }}</label>

                            <div class="col-md-6">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">{{ __('Pilih CC') }}</option>
                                    <option value="A">{{ __('1.0') }}</option>
                                    <option value="B">{{ __('1.3') }}</option>
                                    <option value="B">{{ __('1.5') }}</option>
                                    <option value="B">{{ __('2.0') }}</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
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