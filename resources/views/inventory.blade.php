@extends('layout.master')
@section('title', 'Danh sách kiểm kê')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div id="map"> </div>
        <div class="container px-6 mx-auto grid mb-12">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Danh sách kiểm kê
            </h2>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-bold tracking-wide text-left text-gray-800 uppercase border-b  bg-gray-200"
                        >
                            <th class="px-4 py-3">Thời gian</th>
                            <th class="px-4 py-3">Địa điểm</th>
                            <th class="px-4 py-3">Người đưa quyết định</th>
                            <th class="px-4 py-3">Danh sách hội đồng</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Tiến hành kiểm kê</th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y "
                        >
                        @foreach($inventories as $inventory)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                   {{$inventory->date_inventory}} - {{$inventory->time_inventory}}
                                    @if(!empty($inventory->reason))<p>{{$inventory->reason}}</p>@endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @foreach($inventory->locate as $locate)
                                        <p>{{$locate}}</p>
                                        @endforeach
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$inventory->user}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @foreach($inventory->group as $mem)
                                        <p>{{$mem}}</p>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3 text-sm">{{$inventory->status}}</td>
                                <td class="px-4 py-3">
                                    @if($inventory->member&&($inventory->status != 'Đóng')&&($inventory->status != 'Chờ đánh giá tổng kết'))
                                    <a href="{{route('active',array('id_inventory'=> $inventory->id))}}"
                                       class="w-10 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                       aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                        @endif
                                </td>
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


