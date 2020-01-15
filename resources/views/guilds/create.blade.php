@extends('layouts.app')
@section('title', '- Guilds')
@section('content')
    <div class="container">
        <form class="form validate" action="{{ url('guilds') }}" method="post">
            <div class="card">
                <div class="card-header info-color white-text text-center py-4">
                    <span class="font-weight-light text-uppercase">Register your Guild</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Guild Name -->
                        <div class="col-12">
                            <div class="md-form md-outline my-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <!-- Guild Description -->
                        <div class="col-12">
                            <div class="md-form md-outline my-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="md-textarea form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                    <h5 class="h5-responsive font-weight-light mt-5">Requirements</h5>
                    <hr class="mt-0"/>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="md-form md-outline my-2">
                                <label for="required-gear">Gear Score</label>
                                <input type="number" name="required-gear" id="required-gear" class="form-control" size="3" min="0" step="1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="md-form md-outline my-2">
                                        <label for="required-quest-quantity">Quests</label>
                                        <input type="number" name="required-quest-quantity" id="required-quest-quantity" class="form-control" size="3" min="0" step="1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="select-outline my-2">
                                        <label for="required-quest-interval"></label>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
