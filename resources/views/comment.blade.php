@extends('layout.master')
@section('title', 'Đánh giá Tổng kết')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    <style>
        #example tr>td {
            min-width: 50px;
            max-width: 200px;
        }

    </style>
    @include('sidebar.header')

    <main class="h-full">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Kết quả kiểm kê
            </h2>
            <div class="">
                <div class="flex">
                    <div class="w-1/3 px-4 py-2 m-2 font-bold">
                        Thời gian:
                    </div>
                    <div class="w-2/3 px-4 py-2 m-2">
                        {{$inventory->time_inventory}} ngày {{$inventory->date_inventory}}
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/3 px-4 py-2 m-2 font-bold">
                        Địa điểm:
                    </div>
                    <div class="w-2/3 px-4 py-2 m-2">
                        @foreach($inventory->locate as $locate)
                            <p>{{$locate}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/3 px-4 py-2 m-2 font-bold">
                        Mục đích:
                    </div>
                    <div class="w-2/3 px-4 py-2 m-2">
                        {{$inventory->reason}}

                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/3 px-4 py-2 m-2 font-bold">
                        Thành phần hội đồng:
                    </div>
                    <div class="w-2/3 px-4 py-2 m-2">
                        @foreach($inventory->group as $mem)
                            <p>{{$mem}}</p>
                        @endforeach
                    </div>
                </div>
                <p class="my-4">Kết quả kiểm kê như sau:</p>
            </div>
            <!-- New Table -->
            <div class="w-full overflow-x-auto rounded-lg shadow-xs mb-12">

                <div class="w-full ">
                    <table id="example"  class="display text-xs" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thiết bị</th>
                            <th>Code</th>
                            <th>Model</th>
                            <th>Địa điểm</th>
                            <th colspan="3" ><p class="italic border-b-2 border-black">Theo sổ kế toán</p>
                                <div class="flex">
                                    <p class="w-1/3">Số lượng</p>
                                    <p class="w-1/3">Nguyên giá</p>
                                    <p class="w-1/3">Giá trị còn lại</p>
                                </div>
                            </th>
                            <th colspan="3" ><p class="italic border-b-2 border-black">Theo kiểm kê</p>
                                <div class="flex">
                                    <p class="w-1/3">Số lượng</p>
                                    <p class="w-1/3">Nguyên giá</p>
                                    <p class="w-1/3">Giá trị còn lại</p>
                                </div>
                            </th>
                            <th colspan="3" ><p class="italic border-b-2 border-black">Chênh lệch</p>
                                <div class="flex">
                                    <p class="w-1/3">Số lượng</p>
                                    <p class="w-1/3">Nguyên giá</p>
                                    <p class="w-1/3">Giá trị còn lại</p>
                                </div>
                            </th>
                            <th>Ghi chú</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                        @foreach($devices as $key=> $device)
                                <tr class="text-gray-700 text-xs ">
                                    <td class="px-1 py-3 text-center">{{$key +1}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->name}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->code}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->model_number}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->locate.' - Phòng '.$device->room_number}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->acc_number_device}}</td>
                                    <td class="px-2 py-3 text-center">{{number_format($device->acc_original_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center">{{number_format($device->acc_present_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->number_device}}</td>
                                    <td class="px-2 py-3 text-center">{{number_format($device->original_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center ">{{number_format($device->present_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center ">{{$device->cl_number_device}}</td>
                                    <td class="px-2 py-3 text-center ">{{number_format($device->cl_original_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center ">{{number_format($device->cl_present_price, 0, ',', ',')}}</td>
                                    <td class="px-2 py-3 text-center">{{$device->notes}}</td>
                                </tr>
                        @endforeach
                        <tr class="text-gray-700 ">
                            <td class="px-2 py-3 text-center">Tổng</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">{{number_format($total_acc_original_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center">{{number_format($total_acc_present_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center">x</td>
                            <td class="px-2 py-3 text-center">{{number_format($total_original_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center ">{{number_format($total_present_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center ">x</td>
                            <td class="px-2 py-3 text-center ">{{number_format($total_cl_original_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center ">{{number_format($total_cl_present_price, 0, ',', ',')}}</td>
                            <td class="px-2 py-3 text-center">x</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex mb-8">
                <form class="w-full" method="POST" action="{{route('rate_comment')}}">
                    {{ csrf_field() }}
                    <input type="text" class="hidden" name="id" value="{{$inventory->id}}">
                    <div class="flex">
                        <div class="w-1/2 px-3 mb-6 md:mb-0 block">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Đánh giá
                            </label>
                            <textarea
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                name="comment" rows="2" required>{{$inventory->comment}}</textarea>
                        </div>
                        <div class="w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Ghi chú
                            </label>
                            <textarea
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                name="note" rows="2" required>{{$inventory->note}}</textarea>
                        </div>
                    </div>
                    <div class="block flex">
                        <button type="submit" class="w-1/2 mt-6 max-w-xs mx-auto  text-center mb-12 px-4 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Hoàn thành
                        </button>
                        <a href="" class="w-1/2 mt-6 max-w-xs mx-auto mb-12 text-center  justify-end px-4 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Xuất báo cáo kết quả kiểm kê
                        </a>

                    </div>


                </form>
            </div>

        </div>
        @include('sidebar.footer')
    </main>
@stop
