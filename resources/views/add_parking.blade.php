@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST"  action="">
                        @csrf

                        <div class="form-group row">
                            <label for="matrix" class="col-md-4 col-form-label text-md-right">{{ __('id:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="matrix" id="matrix" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label tex-md-right">{{ __('Blok:') }}</label>

                            <div class="col-md-6">
                                <select name="block" id="block" class="form-control">
                                    <option value="">{{ __('Pilih Blok') }}</option>
                                    <option value="A">{{ __('A') }}</option>
                                    <option value="B">{{ __('B') }}</option>
                                    <option value="C">{{ __('C') }}</option>
                                    <option value="D">{{ __('D') }}</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date-created" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="tarikh" id="tarikh" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Reset') }}
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