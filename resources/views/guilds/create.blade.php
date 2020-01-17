@extends('layouts.app')
@section('title', '- Guilds')
@section('content')
    <div class="container">
        <form class="form validate" action="{{ url('guilds') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header info-color white-text text-center py-4">
                    <span class="font-weight-light text-uppercase">Register your Guild</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="file-field my-2">
                                <div class="z-depth-1-half flex-center mb-2 img-thumbnail">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" id="logo-preview" class="img-fluid"
                                         alt="Guild Logo">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-dark btn-rounded float-left">
                                        <span>Logo</span>
                                        <input type="file" name="logo" id="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-row">
                                <!-- Guild Name -->
                                <div class="col-sm-10">
                                    <div class="md-form md-outline my-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Guild Type -->
                                <div class="col-sm-2">
                                    <div class="select-outline my-2">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="my-0 mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option>PVX</option>
                                            <option>PVP</option>
                                            <option>PVE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Guild Description -->
                                <div class="col-12">
                                    <div class="md-form md-outline my-2">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="md-textarea form-control" rows="10" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <h5 class="h5-responsive font-weight-light mt-5">Requirements</h5>
                            <hr class="mt-0"/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="col-sm col-md-auto">
                                            <div class="md-form md-outline my-2">
                                                <label for="required-gear-score">Gear Score</label>
                                                <input type="number" name="required-gear-score" id="required-gear-score" class="form-control" size="3" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-2">
                                            <div class="select-outline my-2">
                                                <label for="required-gear-offhand">Offhand</label>
                                                <select name="required-gear-offhand" id="required-gear-offhand" class="my-0 mdb-select md-form md-outline colorful-select dropdown-primary">
                                                    <option>Any</option>
                                                    <option>Kutum</option>
                                                    <option>Nouver</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="col-sm col-md-auto">
                                            <div class="md-form md-outline my-2">
                                                <label for="required-quest-quantity">Quests</label>
                                                <input type="number" name="required-quest-quantity" id="required-quest-quantity" class="form-control" size="3" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-2">
                                            <div class="select-outline my-2">
                                                <label for="required-quest-interval">Interval</label>
                                                <select name="required-quest-interval" id="required-quest-interval" class="my-0 mdb-select md-form md-outline colorful-select dropdown-primary">
                                                    <option>Per Day</option>
                                                    <option>Per Week</option>
                                                    <option>Per Month</option>
                                                    <option>Per Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="col-sm col-md-auto">
                                            <div class="md-form md-outline my-2">
                                                <label for="required-war-quantity">Node War</label>
                                                <input type="number" name="required-war-quantity" id="required-war-quantity" class="form-control" size="3" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-2">
                                            <div class="select-outline my-2">
                                                <label for="required-war-interval">Interval</label>
                                                <select name="required-war-interval" id="required-war-interval" class="my-0 mdb-select md-form md-outline colorful-select dropdown-primary">
                                                    <option>Per Week</option>
                                                    <option>Per Month</option>
                                                    <option>Per Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-center text-md-right white">
                    <a class="btn  btn-secondary" href="{{ url('guilds') }}">Cancel</a>
                    <button type="submit" class="btn  btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(function () {
            $('.mdb-select').materialSelect();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#logo').on('change', function (evt) {
            readURL(this);
        });
    </script>
@endsection
