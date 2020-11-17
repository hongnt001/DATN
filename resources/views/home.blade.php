@extends('layout.master')
@section('title', 'Thống kê thiết bị')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
{{--        <div id="map"> </div>--}}
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Danh sách thiết bị
            </h2>
            <div class=" mb-6 flex button">
                <a href="{{route('add_device')}}"
                    class="items-center justify-end w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Thêm mới
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>

            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto p-4">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Địa điểm</th>
                            <th>Phòng</th>
                            <th>Phân loại</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th>Số lượng</th>
                            <th>Nhãn hiệu</th>
                            <th>Code</th>
                            <th>Số Seri</th>
                            <th>Model</th>
                            <th>Loại tài sản</th>
                            <th>Nơi sản xuất</th>
                            <th>Năm đưa vào dùng</th>
                            <th>Giá ban đầu</th>
                            <th>Giá trị hiện tại</th>
                            <th>% sử dụng</th>
                            <th>Ghi chú</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @include('sidebar.footer')
    </main>
@stop
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    (function() {

        $(function() {

            $('#example').DataTable({
                "scrollX": true,
                // dom: "Bfrtip",
                serverSide: true,
                ajax: "{{route('home_devices')}}",
                order: [[ 1, 'asc' ]],
                columns: [
                    { data: "stt" },
                    { data: "locate", name: "locate_id" },
                    { data: "room_number" },
                    { data: "category" },
                    { data: "name" },
                    { data: "status" },
                    { data: "number_device" },
                    { data: "brand_name" },
                    { data: "code" },
                    { data: "serial_number" },
                    { data: "model_number" },
                    { data: "type_ts" },
                    { data: "manufacturer_address" },
                    { data: "year_use_start" },
                    { data: "original_price" },
                    { data: "present_price" },
                    { data: "use_percent" },
                    { data: "notes" },
                ],
            });
        });
    })();

</script>
@endpush

