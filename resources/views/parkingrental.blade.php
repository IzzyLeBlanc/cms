@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENGESAHAN PERMOHONAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('show-parking-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="plat" class="col-md-4 col-form-label text-md-right">{{ __('No. Receipt:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="resit" id="resit" required>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sahkan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                   <th>ID</th>
                   <th>No. Receipt</th>
                   <th>No. Plat Kenderaan</th>
                   <th>Jenis Kenderaaan</th>
                   <th>Warna Kenderaan</th>
                   <th>Status</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($record as $records)
                   <tr>
                        <td>{{ $records->id }}</td>
                        <td>{{ $records->user_id }}</td>
                        <td>{{ $records->room }}</td>
                        <td>{{ $records->floor }}</td>
                        <td>{{ $records->block }}</td>
                        <td>{{ $records->sem }}</td>
                        <td>{{ $records->checkout }}</td>
                        <td>
                            <a href="{{route('delete-parking-rental', $parkings->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
                            <a href="{{route('update-parking-rental', $parkings->id)}}" class="btn btn-danger">{{__('Edit')}}</a>
                          </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
            {{$record->links() }}
        </div>
    </div>
</div>
@endsection