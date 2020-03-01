@extends('layouts.app')
@section('title', '- User: '.$user->user)
@section('content')
    <div class="container">
        <!-- Rotating card -->
        <div class="card-wrapper">
            <div id="card-1" class="card card-rotating text-center">

                <!-- Front Side -->
                <div class="face front">

                    <!-- Image-->
                    <div class="card-up">
                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo7.jpg" alt="Image with a photo of clouds.">
                    </div>

                    <!-- Avatar -->
                    <div class="avatar mx-auto white">
                        <img src="{{$user->avatar}}" class="rounded-circle" alt="{{$user->user}}'s Avatar" width="120px" height="120px" style="object-fit: cover;">
                    </div>

                    <!-- Content -->
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-3">{{$user->user}}</h4>
                        <p class="font-weight-bold blue-text">{{$user->family}}</p>
                        <div class="row border-bottom border-light">
                            <div class="col text-left">
                                <h4 class="my-2 font-weight-light">Characters</h4>
                            </div>
                        </div>
                        @if( isset($user->characters) && count($user->characters) > 0 )
                            @foreach($user->characters as $character)
                                <div class="row white rounded d-flex align-items-center flex-row border-bottom border-light">
                                    <div class="col-lg-1 col-md-2 col-sm-3 offset- mb-3 mb-sm-0">
                                        <div class="text-center px-5 px-sm-0 w-100">
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
                            @endforeach
                        @else
                            <div class="col d-flex align-items-center" style="height: 70vh">
                                <h3 class="text-muted text-light font-weight-light text-center w-100">Peekaboo!!<br/>Wait, where is everyone?</h3>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Front Side -->

                <!-- Back Side -->
                <div class="face back">
                    <div class="card-body">

                        <!-- Content -->
                        <h4 class="font-weight-bold mb-0">About me</h4>
                        <hr>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat tenetur odio suscipit non commodi vel
                            eius veniam maxime?
                        <hr>
                        <!-- Social Icons -->
                        <ul class="list-inline py-2">
                            <li class="list-inline-item"><a class="p-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="p-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="p-2 fa-lg gplus-ic"><i class="fab fa-google-plus-g"></i></a></li>
                            <li class="list-inline-item"><a class="p-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                        <!-- Triggering button -->
                        <a class="rotate-btn" data-card="card-1"><i class="fas fa-undo"></i> Click here to rotate back</a>

                    </div>
                </div>
                <!-- Back Side -->

            </div>
        </div>
        <!-- Rotating card -->
    </div>
@endsection
