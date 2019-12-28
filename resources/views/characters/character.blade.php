@extends('layouts.app')
@section('title', ' - ' . ($character->name ?? 'New Character'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <form class="form validate" action="{{ url('account/characters/'. ($character->id ?? ''))  }}" method="POST">
                    @if( isset($character) ) @method('PUT') @endif
                    @csrf
                    <dic class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 font-weight-light">{{ (isset($character) ? 'Edit Character' : 'New Character') }}</h4>
                            </div>
                            <hr/>
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
                                        <option value="" disabled {{ (isset($character->class) ?: 'selected') }}>Choose your class</option>
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
                            </div>
                        </div>
                    </dic>
                </form>
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
