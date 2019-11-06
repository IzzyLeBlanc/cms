@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-parking-rental')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="studentid" class="col-md-4 col-form-label text-md-right">{{ __('No. Matrik:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="studentid" id="studentid" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parkingid" class="col-md-4 col-form-label text-md-right">{{ __('No.Lot Parking:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="parkingid" id="parkingid" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="receiptNo" class="col-md-4 col-form-label text-md-right">{{ __('No. Receipt:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="receiptNo" id="receiptNo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plateNo" class="col-md-4 col-form-label text-md-right">{{ __('No. Plat Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="plateNo" id="plateNo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carModel" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="carModel" id="carModel" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carColor" class="col-md-4 col-form-label text-md-right">{{ __('Warna Kenderaan:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="carColor" id="carColor" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="status" id="status" disabled="disabled" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="create" id="create" formaction="{{route('create-parking')}}">
                                    {{ __('Hantar') }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <table class=" table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No Matrik</th>
                            <th>No.Lot Parking</th>
                            <th>No. Plat Kenderaan</th>
                            <th>Jenis Kenderaan</th>
                            <th>Warna Kenderaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($app as $apps)
                            <tr>
                                 <td>{{$apps->studentid}}</td>
                                 <td>{{$apps->parkingid}}</td>
                                 <td>{{$apps->receiptNo}}</td>
                                 <td>{{$apps->plateNo}}</td>
                                 <td>{{$apps->carModel}}</td>
                                 <td>{{$apps->carColor}}</td>
                                 <td>{{$apps->status}}</td>
                                 <td>
                                   <a href="{{route('update-parking', $apps->id)}}" class="btn btn-danger">{{__('Edit')}}</a>
                                 </td>
         
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                     {{$app->links() }}
                 </div>
             </div>
         </div>
         @endsection