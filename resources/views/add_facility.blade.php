@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN RUANG KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form method="POST"  action="">
                        @csrf

                        <div class="form-group row">
                            <label for="matrix" class="col-md-4 col-form-label text-md-right">{{ __('ID:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="matrix" id="matrix" required autofocus class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fasiliti:') }}</label>

                            <div class="col-md-6">
                                <select name="facility" id="facility" class="form-control">
                                    <option value="">{{ __('Pilih Kemudahan') }}</option>
                                    <option value="1">{{ __('Dewan Besar Zaba') }}</option>
                                    <option value="2">{{ __('Kafeteria Zaba') }}</option>
                                    <option value="3">{{ __('Perpustakaan Zaba') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label tex-md-right">{{ __('Keterangan:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="description" id="description" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rates" class="col-md-4 col-form-label tex-md-right">{{ __('Pembayaran:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="rates" id="rates" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="create" id="create" formaction="{{route('create-facility')}}">
                                    {{ __('Hantar') }}
                                </button>
                                <button class="btn btn-primary"type="submit" name="update" id="update" formaction="{{route('update-facility')}}">
                                    {{__('Perbaharui')}}
                                </button>
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

                    <table class=" table table-boarderless" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Facility</th>
                                <th>Description</th>
                                <th>Rates</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facility as $facilitys)
                            <tr>
                                 <td>{{ $facilitys->id }}</td>
                                 <td>{{ $facilitys->facility }}</td>
                                 <td>{{ $facilitys->Description }}</td>
                                 <td>{{ $facilitys->rate }}</td>
                                 <td>
                                   <a href="{{route('delete-facility', $facilitys->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
                                   <a href="{{route('update-facility', $facilitys->id)}}" class="btn btn-danger">{{__('Edit')}}</a>
                                 </td>
         
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                  {{$facility->links() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection