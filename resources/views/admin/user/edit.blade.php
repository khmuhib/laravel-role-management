@extends('layouts.index')
@section('title', 'User update')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}
@endsection
@section('page_title', 'User Update')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>

                <form class="form-horizontal" method="post" action="{{ route('user.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Name"
                                    name="name" value="{{ $user->name }}" @error('name') @enderror>
                                @error('name')
                                    <p class="text-danger text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                    name="email" value="{{ $user->email }}" @error('email') @enderror>
                                @error('email')
                                    <p class="text-danger text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                    name="password" value="{{ $user->password }}" @error('password') @enderror>
                                @error('password')
                                    <p class="text-danger text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3"
                                    placeholder="Confirm Password" name="confrim_password"
                                    value="{{ old('confrim_password') }}" @error('confrim_password') @enderror>
                                @error('confrim_password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row" data-select2-id="42">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="select2bs4 select2-hidden-accessible" multiple=""
                                    data-placeholder="Select a State" style="width: 100%;" data-select2-id="23"
                                    tabindex="-1" aria-hidden="true" name="roles[]" required>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if (in_array($role->id, $userRoles)) selected @endif>{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="status"
                                        value="1" {{ $user->status == 1 ? 'checked' : '' }}>
                                    <label for="customRadio1" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="status"
                                        value="2" {{ $user->status == 2 ? 'checked' : '' }}>
                                    <label for="customRadio2" class="custom-control-label">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update User</button>
                        <a href="{{ route('user.index') }}" type="submit" class="btn btn-default float-right">Show
                            User</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection


@section('js')





@endsection
