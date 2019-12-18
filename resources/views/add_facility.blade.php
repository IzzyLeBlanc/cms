@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col=md-8">
            <div class="card">
                <div class="card-header">{{ __('PENAMBAHAN RUANG KEMUDAHAN') }}</div>
                
                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('create-facility') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Fasiliti:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan:') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="description" id="description" required autofocus class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rates" class="col-md-4 col-form-label text-md-right">{{ __('Pembayaran(RM):') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="rates" id="rates" required autofocus class="form-control">
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" id="id" value="">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="create" id="create">
                                    {{__('Hantar') }}
                                <button class="btn btn-primary" type="reset" name="reset" id="reset">
                                    {{__('Semula')}}
                                </button>
                            </div>
                        </div>
                     </form>
                </div>
                 <table class="table table-striped" id="table">
                    <thead>
                         <tr>
                             <th>Facility Name</th>
                             <th>Description</th>
                             <th>Rates</th>
                             <th>Staff ID</th>   
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($facility as $facilitys)
                        <tr>
                            <td>{{ $facilitys->name }}</td>
                            <td>{{ $facilitys->description }}</td>
                            <td>{{ $facilitys->rates }}</td>
                            <td>{{ $facilitys->staffid }}</td>
                            <td>
                                <a href="{{route('delete-facility', $facilitys->id)}}" class="btn btn-danger">{{__('Padam')}}</a>
      
                                <button class="btn btn-warning" onclick="function moveToField(){
                                    document.getElementById('id').value = '{{ $facilitys->id }}';
                                  document.getElementById('name').value = '{{ $facilitys->name }}';
                                  document.getElementById('description').value = '{{ $facilitys->description }}';
                                  document.getElementById('rates').value = '{{ $facilitys->rates }}';
                                  document.getElementById('create').innerHTML = '{{__('Kemaskini')}}';
                                  document.getElementById('form').action = '{{route('update-facility')}}';
                                  var form;
                                  form = document.getElementById('form');
                                  form.setAttribute('onsubmit','return confirm(\'Are you sure you want to update this form?\');');
                                  } moveToField(); return false;">{{__('Perbaharui')}}
                                 </button>
                             </td>    
                        </tr>
                        @endforeach
                    </tbody>
                 </table>
                {{$facility->links() }}
            </div>
        </div>
    </div>
</div>
@endsection