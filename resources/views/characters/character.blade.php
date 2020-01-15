@extends('layouts.app')
@section('title', ' - ' . (isset($character->name) ? "Edit Character: $character->name"  : 'Create Character'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <form class="form validate" action="{{ url('account/characters/'. ($character->uuid ?? ''))  }}" method="POST" enctype="multipart/form-data">
                    @if( isset($character) ) @method('PUT') @endif
                    @csrf
                    <div class="card">

                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 font-weight-light">{{ (isset($character) ? 'Edit Character' : 'New Character') }}</h4>
                            </div>
                            <hr/>
                            @if(isset($character) && isset($character->gear_picture))
                                <div class="gear-picture-container img-thumbnail my-2">
                                    <img class="w-100" src="{{ url($character->gear_picture) }}" alt="Gear Picture">
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="md-form md-outline my-2">
                                        <input type="text" id="name" name="name" class="form-control my-0" value="{{$character->name ?? ''}}">
                                        <label for="name" class="{{ (isset($character) ? 'active' : '') }}">Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-form md-outline my-2">
                                        <input type="number" id="level" name="level" min="0" step="1" max="100" class="form-control my-0"  value="{{$character->level ?? ''}}">
                                        <label for="level" class="{{ (isset($character) ? 'active' : '') }}">Level</label>
                                    </div>
                                </div>
                                <div class="col-sm-8 select-outline">
                                    <select class="mdb-select md-form md-outline colorful-select dropdown-primary my-2" id="class" name="class">
                                        <option value="" disabled {{ (isset($character->class) ? '' : 'selected') }}>Choose your class</option>
                                        @foreach( App\Enums\ClassType::toArray() as $class)
                                            <option {{ (($character->class ?? '') === $class ? 'selected' : '') }} value="{{$class}}">{{App\Enums\ClassType::getKey($class)}}</option>
                                        @endforeach
                                    </select>
                                    <label for="class">Class</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-form md-outline my-2">
                                        <input type="number" id="ap" name="ap" min="0" step="1" max="600" class="form-control my-0"  value="{{$character->ap ?? ''}}">
                                        <label for="ap" class="{{ (isset($character) ? 'active' : '') }}">AP</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-form md-outline my-2">
                                        <input type="number" id="aap" name="aap" min="0" step="1" max="600" class="form-control my-0"  value="{{$character->aap ?? ''}}">
                                        <label for="aap" class="{{ (isset($character) ? 'active' : '') }}">AAP</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-form md-outline my-2">
                                        <input type="number" id="dp" name="dp" min="0" step="1" max="800" class="form-control my-0"  value="{{$character->dp ?? ''}}">
                                        <label for="dp" class="{{ (isset($character) ? 'active' : '') }}">DP</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 select-outline">
                                    <select class="mdb-select md-form md-outline colorful-select dropdown-primary my-2" id="knowledge" name="knowledge">
                                        <option value="" disabled {{ (isset($character->knowledge) ? '' : 'selected') }}>Class Knowledge</option>
                                        @foreach( App\Enums\ClassKnowledge::toArray() as $knowledge)
                                            <option {{ (($character->knowledge ?? '') == $knowledge ? 'selected' : '') }} value="{{$knowledge}}">{{App\Enums\ClassKnowledge::getKey($knowledge)}}</option>
                                        @endforeach
                                    </select>
                                    <label for="knowledge">Knowledge</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-2">
                                    <div class="file-field">
                                        <a class="btn-floating btn-sm blue-gradient float-left mt-1">
                                            <i class="fas fa-paperclip" aria-hidden="true"></i>
                                            <input type="file" name="gear-picture">
                                        </a>
                                        <div class="file-path-wrapper px-0">
                                            <div class="md-form md-outline my-1">
                                                <input class="file-path form-control" id="file-name" type="text" style="box-sizing: border-box" value="{{ (isset($character) && isset($character->gear_picture) ? url($character->gear_picture) : '') }}">
                                                <label for="file-name" class="{{ (isset($character) && isset($character->gear_picture) ? 'active' : '') }}">Gear Picture</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        @if(isset($character))
                            <div class="col px-2">
                                <button type="button" id="btn-delete" class="btn btn-sm btn-danger" onclick="$('#delete-form').submit()">Delete</button>
                            </div>
                        @endif
                        <div class="col text-right px-2">
                            <a href="{{ url('account/characters') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">{{ isset($character) ? 'Save' : 'Add' }}</button>
                        </div>
                    </div>
                </form>
                @if(isset($character))
                    <form id="delete-form" action="{{ url('account/characters/'. $character->uuid) }}" method="post">
                        @method('DELETE')
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.mdb-select').materialSelect();
            $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
                $(this).closest('.select-outline').find('label').toggleClass('active');
                $(this).closest('.select-outline').find('.caret').toggleClass('active');
            });
        });
    </script>
@endsection
