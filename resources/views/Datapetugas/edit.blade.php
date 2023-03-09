@extends('template.main')

@section('title', 'Create Data Akun')

@section('content')
    <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('petugas.update', [$users->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ $users->name}}" class="form-control" id="name" name="name" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{  $users->username }}" class="form-control" id="username" name="username" placeholder="Username Anda..">
                                            </div>
                                        </div>
                                        

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="level">Level <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" value="{{  $users->level }}" id="level" name="level">
                                                    <option @disabled(true)>Tentukan Level</option>
                                                    <option >Admin</option>
                                                    <option >Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="telepon">No Telephone <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{  $users->telepon }}" class="form-control" id="telepon" name="telepon" placeholder="Masukan Nomor..">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row">
                                             <div class="col-lg-5 ml-auto">
                                                @if($users->level == 'admin')
                                                <a href="{{ route('dataadmin.index') }}" class="btn btn-outline-primary">
                                                        {{ __('Kembali') }}
                                                    </a>
                                                @elseif($users->level == 'petugas')
                                                 <a href="{{ route('petugas.index') }}" class="btn btn-outline-primary">
                                                        {{ __('Kembali') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 ml-6">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection