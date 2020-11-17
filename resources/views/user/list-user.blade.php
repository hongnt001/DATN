@extends('layout.master')
@section('title', 'Danh sách người dùng')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Danh sách người dùng
            </h2>
            <div class="px-6 my-6 flex justify-end">
                <a
                    class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{route('add_user')}}"
                >
                    Thêm mới
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>

            </div>
            <!-- New Table -->
            <div class="w-full mb-6 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs uppercase tracking-wide text-gray-700 font-bold text-left border-b bg-gray-200"
                        >
                            <th class="px-4 py-3">Họ và tên</th>
                            <th class="px-4 py-3">Chức vụ</th>
                            <th class="px-4 py-3">Phòng ban</th>
                            <th class="px-4 py-3">Quyền</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                        @foreach($users as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{$user->full_name}}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{$user->email}}
                                        </p>
                                    </div>
                                    </td>
                                <td class="px-4 py-3 text-sm">{{$user->position}}</td>
                                <td class="px-4 py-3 text-sm">{{$user->department}}</td>
                                <td class="px-4 py-3 text-sm">{{config('define.roles')[$user->role_id]}}</td>
                                @if(1 == 1)
                                <td class="px-4 py-3">
                                    <a href="{{route('add_user')}}"
                                        class="w-10 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                </td>
                                    @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('sidebar.footer')
    </main>
@stop

