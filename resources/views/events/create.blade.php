@extends('layouts.app')
@section('title', '- News')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('events') }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mt-2">
                            <div class="md-form md-outline my-0">
                                <input type="text" name="name" id="name" class="form-control my-0">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div class="file-field">
                                <a class="btn-floating btn-sm blue-gradient float-left mt-0">
                                    <i class="fas fa-paperclip" aria-hidden="true"></i>
                                    <input type="file" name="gear-picture">
                                </a>
                                <div class="file-path-wrapper px-0">
                                    <div class="md-form md-outline my-0">
                                        <input class="file-path form-control" id="file-name" type="text" style="box-sizing: border-box" value="">
                                        <label for="file-name">Image</label>
                                    </div>
                                </div>oo
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
