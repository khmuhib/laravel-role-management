@extends('layouts.index')
@section('title', 'User')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}
@endsection
@section('page_title', 'Role List')
@section('content')
    <div class="row">
        <div class="col-12">
            {!! Toastr::message() !!}
            <a type="submit" class="btn btn-primary mb-2" href="{{ route('permission') }}"">Create New Role</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Role <span class="bg-primary">{{ $roles->count() }}</span></h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body table-responsive p-0" style="height: 800px;">
                    @if ($roles->count())
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="bg-success">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('permission', $role->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('role.edit', $role->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('role.destroy', $role->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <h3>Role Not Found</h3>
                    @endif


                </div>

            </div>

        </div>
    </div>
@endsection
