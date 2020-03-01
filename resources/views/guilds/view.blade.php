@extends('layouts.app')
@section('title', '- Guilds: '.$guild->name)
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{$guild->logo ?? 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg'}}" class="img-fluid img-thumbnail" alt="{{$guild->name}}'s logo">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col">
                                    <h4 class="h4 font-weight-light">{{$guild->name}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p id="description" class="font-weight-light collapse minimized mb-0">{!! nl2br($guild->description) !!}</p>
                                    <button id="show-more" class="btn btn-sm btn-flat p-2" data-target="#description" data-toggle="collapse"><i class="fas fa-plus"></i> Show More</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-2">
                                    <h5 class="h5 font-weight-light m-0">Members</h5>
                                </div>
                            </div>
                            <hr class="my-2"/>
                            @if( count($guild->members) > 0 )
                                @foreach($guild->members as $member)
                                    <div class="row">
                                        <div class="col">{{$member->user}} <small class="text-muted">({{$member->family}})</small></div>
                                        <div class="col"></div>
                                    </div>
                                @endforeach
                            @else

                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('#show-more').on('click', function () {
            if ($('#description').hasClass('show')) $(this).html('<i class="fas fa-plus"></i> Show More');
            else $(this).html('<i class="fas fa-minus"></i> Show Less')
        });
    </script>
@endsection
