@extends('layouts.index')
@section('title', 'File Manager')
@section('content')
    <div class="">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-5 py-3 border border-b-2 border-gray-200 bg-gray-100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-5 border border-b border-gray-200 bg-white text-sm">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-5 border border-b border-gray-200 bg-white text-sm">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-5 border border-b border-gray-200 bg-white text-sm">
                                            {{ $user->is_role == 1 ? 'Super Admin' : ($user->is_role == 2 ? 'Admin' : 'User') }}
                                        </td>
                                        <td class="px-5 border border-b border-gray-200 bg-white text-sm">
                                            {{ $user->status }}
                                        </td>
                                        <td class="px-5 border border-b border-gray-200 bg-white text-sm">
                                            <a href="{{-- {{ route('users.edit', $user->id) }} --}}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>


@endsection
