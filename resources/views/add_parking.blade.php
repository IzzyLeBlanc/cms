@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('create-parking')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="id" id="id" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label text-md-right">{{ __('ParkingNo:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="block" id="block" required autofocus class="form-control">
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
                            <th>ID</th>
                            <th>Block</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($parking as $parkings)
                            <tr>
                                 <td>{{ $parkings->id }}</td>
                                 <td>{{ $parkings->block }}</td>
                                 <td>
                                    <td>
                                        <a href="{{route('delete-parking', $parkings->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
              
                                        <button class="btn btn-warning" onclick="function moveToField(){
                                          document.getElementById('id').value = '{{ $parkings->id }}';
                                          document.getElementById('block').value = '{{ $parkings->block }}';
                                          document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                                          document.getElementById('form').action = '{{route('update-parking')}}';
                                          var form;
                                          form = document.getElementById('form');
                                          form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this room?\');');
                                          } moveToField(); return false;">{{__('Perbaharui')}}
                                         </button>
                                      </td>
         
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                     {{$parking->links() }}
                 </div>
             </div>
         </div>
         @endsection