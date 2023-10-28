@extends('layouts.index')
@section('title', 'File Manager')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}
@endsection
@section('page_title', 'Role Management')
@section('content')

    <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row py-2">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Name" name="name"
                        value="{{ old('name') }}" @error('name') @enderror>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                                name="permission[]">
                                            <label class="form-check-label" id="checkAll">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-12">
                <div class="d-flex justify-content-start">
                    <a type="submit" class="btn btn-secondary" href="{{ route('role.index') }}">Cancle</a>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('js')
    {{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}
    <script>
        $("#checkAll").click(function() {
            $(".check").prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
