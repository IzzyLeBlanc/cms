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
                                <select name="block" id="block" class="form-control" >
                                    <option value="">{{ __('Senarai Blok Parking') }}</option>
                                    @foreach ($blocks as $block)
                                    <option value="{{$block}}">{{$block}}</option>
                                    
                                    @endforeach
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
                            @foreach($parkings as $parking)
                            <tr>
                                 <td>{{ $parking->id }}</td>
                                 <td>{{ $parking->block }}</td>
                                    <td>
                                        <a href="{{route('delete-parking', $parking->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
              
                                        <button id="resetBtn" onclick="function moveToField(){
                                            document.getElementById('id').value = '{{ $parking->id }}';
                                            document.getElementById('block').value ='{{ $parking->block}}';
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
                 </div>
             </div>
         </div>
         @endsection