@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
                @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('status')}}
                </div>
                @endif
                @if(Session::has('statusfail'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('statusfail')}}
                </div>
                @endif
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN TEMPAT LETAK KERETA') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{route('create-parking')}}" >
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Parking No:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="id" id="id" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="block" class="col-md-4 col-form-label text-md-right">{{ __('Block:') }}</label>

                            <div class="col-md-6">
                                <select name="block" id="block" class="form-control">
                                    <option value="">{{ __('Senarai Blok Parking') }}</option>
                                    <option value="A">{{ __('A') }}</option>
                                    <option value="B">{{ __('B') }}</option>
                                    <option value="C">{{ __('C') }}</option>
                                    <option value="D">{{ __('D') }}</option>
                                    <option value="E">{{ __('E') }}</option>
                                    <option value="F">{{ __('F') }}</option>
                                    <option value="G">{{ __('G') }}</option>
                                    <option value="H">{{ __('H') }}</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="create" id="create">
                                            {{ __('Hantar') }}
                                        </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <table class=" table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Blok</th>
                            <th>Staff ID</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($parking as $parkings)
                            <tr>
                                 <td>{{ $parkings->id }}</td>
                                 <td>{{ $parkings->block }}</td>
                                    <td>
                                        <a href="{{route('delete-parking', $parkings->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
              
                                        <button id="resetBtn" onclick="function moveToField(){
                                            document.getElementById('id').value = '{{ $parkings->id }}';
                                            document.getElementById('block').value ='{{ $parkings->block}}';
                                            document.getElementById('create').innerHTML = '{{__('Perbaharui')}}';
                                            document.getElementById('form').action = '{{route('update-parking')}}';
                                            var form;
                                            form = document.getElementById('form');
                                            form.setAttribute('onsubmit','');
                                            } moveToField(); return false;" class="btn btn-primary">
                                            {{ __('Perbaharui') }}
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