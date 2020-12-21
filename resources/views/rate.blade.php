@extends('layout.master')
@section('title', 'Đánh giá kết quả')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div id="map"> </div>
        <div class="container px-6 mx-auto grid mb-12">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Đánh giá tổng kết kiểm kê
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
                            <th class="px-4 py-3">Danh sách hội đồng</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Tiến hành đánh giá tổng kết</th>
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
                                    @foreach($inventory->group as $mem)
                                        <p>{{$mem}}</p>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3 text-sm">{{$inventory->status}}</td>
                                <td class="px-4 py-3 mx-auto text-center flex items-center justify-between">
                                    @if($inventory->status == 'Chờ đánh giá tổng kết')
                                        <a href="{{route('inven_end',array('id_inventory'=> $inventory->id))}}"
                                           class="max-w-xs mx-auto text-center  px-4 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Kết quả và đánh giá
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

    </main>
    @include('sidebar.footer')
@stop


