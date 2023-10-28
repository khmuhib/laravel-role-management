@extends('layouts.index')
@section('title', 'User')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}
@endsection
@section('page_title', 'User Create')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>

                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="status">
                                    <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="status"
                                        checked="">
                                    <label for="customRadio2" class="custom-control-label">Custom Radio checked</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="#" type="submit" class="btn btn-info">Update User</a>
                        <a href="{{ route('user.index') }}" type="submit" class="btn btn-default float-right">Show User</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
