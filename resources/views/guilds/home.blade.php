@extends('layouts.app')
@section('title', '- Guilds')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header white">
                <div class="row">
                    <div class="col-md d-flex align-items-center">
                        <h5 class="font-weight-light mb-0">Guilds</h5>
                    </div>
                    @if(empty(Auth::user()->guild))
                    <div class="col-md-auto text-right d-flex align-items-center">
                        <a href="{{ url('guilds/create') }}" class="btn btn-sm btn-success p-2">
                            Register your Guild <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    @endif
                    <div class="col-md-auto">
                        <div class="md-form md-outline my-2">
                            <label for="search">Search</label>
                            <input type="text" id="search" class="form-control my-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach($guilds as $guild)
                    <div class="row">
                        <div class="col-sm-2 col-md-1 pr-0 d-flex align-items-center">
                            <div class="img-thumbnail w-100">
                                <img src="{{ (empty($guild->logo) ? 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg' : url('images/'.$guild->logo)) }}" class="img-fluid" alt="{{$guild->name}}'s Logo">
                            </div>
                        </div>
                        <div class="col-sm d-flex align-items-center">
                            <h5 class="h5 font-weight-light">{{$guild->name}} <small class="text-muted">({{$guild->type}})</small></h5>
                        </div>
                        <div class="col-2 text-right">
                            @foreach($guild->requirements as $requirement)

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
