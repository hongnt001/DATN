@extends('layout.master')
@section('title', 'Kế hoạch nâng cấp')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Kế hoạch nâng cấp các thiết bị
            </h2>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs uppercase tracking-wide text-gray-700 font-bold text-left border-b bg-gray-200"
                        >
                            <th class="px-4 py-3">Thiết bị</th>
                            <th class="px-4 py-3">Địa điểm</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Thời gian cập nhật</th>
{{--                            <th class="px-4 py-3">Lên lịch sửa chữa</th>--}}
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                        @foreach($device_lose as $device)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{$device->name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->locate." - ". $device->room_number}}</td>

                                <td class="px-4 py-3 text-sm">
                                    <span class="px-4 py-2 font-semibold leading-tight text-white bg-gray-700 rounded-full dark:text-gray-100 dark:bg-gray-700">
                          {{$device->status}}
                        </span>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->updated_at}}</td>
{{--                                <td class="px-4 py-3 text-sm">--}}
{{--                                    <input--}}
{{--                                        class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"--}}
{{--                                        name="date_schedule" type="date" value="{{$device->date_schedule}}" >--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        @foreach($device_tt as $device)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{$device->name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->locate." - ". $device->room_number}}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-4 py-2 font-semibold leading-tight text-white bg-red-800 rounded-full dark:text-red-100 dark:bg-red-700">
                                            {{$device->status}}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->updated_at}}</td>
                            </tr>
                        @endforeach
                        @foreach($device_fix as $device)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{$device->name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->locate." - ". $device->room_number}}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-4 py-2 font-semibold leading-tight text-white bg-orange-700 rounded-full dark:text-white dark:bg-orange-600">
                           {{$device->status}}
                        </span>
                                   </td>
                                <td class="px-4 py-3 text-sm">{{$device->updated_at}}</td>
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

