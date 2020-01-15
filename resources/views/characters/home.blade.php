@extends('layouts.app')
@section('title', '- Characters')
@section('content')
    <style>
        .character-card, .character-card * {
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="card mb-2">
            <div class="card-body py-2">
                <div class="row">
                    <div class="col">
                        <h4 class="my-2 font-weight-light">Characters</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-sm btn-success" href="{{ url('account/characters/create') }}">
                            <i class="fas fa-plus"></i> New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if( isset($characters) && count($characters) > 0 )
            @foreach($characters as $character)
                <div class="card character-card my-2" data-uuid="{{$character->uuid}}">
                    <div class="card-body p-3">
                        <div class="row white rounded d-flex align-items-center flex-row">
                            <div class="col-lg-1 col-md-2 col-sm-3 offset- mb-3 mb-sm-0">
                                <div class="avatar text-center px-5 px-sm-0">
                                    <img src="{{asset("storage/class_icons/{$character->class_name}_icon.png")}}" class="img-fluid rounded-circle z-depth-1 bg-light" alt="Class Image" />
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 text-center text-sm-left">
                                <h4 class="font-weight-normal">{{$character->name}}</h4>
                                <div class="font-weight-light">Lvl. {{$character->level}} {{$character->class_name}}</div>
                            </div>
                            <hr class="d-md-none w-100" />
                            <div class="col-lg-1 col-md-1 col-4 my-3 my-m-0 text-center text-md-left">
                                <h5>AP</h5>
                                <div class="font-weight-light">{{$character->ap}}</div>
                            </div>
                            <div class="col-lg-1 col-md-auto col-4 my-3 my-md-0 text-center text-md-left">
                                <h5>AAP</h5>
                                <div class="font-weight-light">{{$character->aap}}</div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-4 my-3 my-md-0 text-center text-md-left">
                                <h5>DP</h5>
                                <div class="font-weight-light">{{$character->dp}}</div>
                            </div>
                            <hr class="d-md-none w-100" />
                            <div class="col-12 col-sm text-center text-md-right">
                                <h5>Class Knowledge</h5>
                                <div class="font-weight-light">{{$character->knowledge_text}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col d-flex align-items-center" style="height: 70vh">
                <h3 class="text-muted text-light font-weight-light text-center w-100">Peekaboo!!<br/>Wait, where is everyone?</h3>
            </div>
        @endif
    </div>
    <script>
        $('.character-card').on('click', function () {
            window.location = "{{ url('account/characters') }}/" + $(this).data('uuid');
        })
    </script>
@endsection
