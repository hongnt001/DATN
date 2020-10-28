@extends('layout.master')
@section('title', 'Thống kê thiết bị')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div id="map"> </div>
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Danh sách thiết bị
            </h2>
            <div class="px-6 my-6 flex button">
                <button
                    class="mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    Danh mục
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <button
                    class="mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    NSX
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <button
                    class=" mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    Phân loại
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <button
                    class=" mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    Năm sử dụng
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <button
                    class=" mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    Địa điểm
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <button
                    class="mr-4 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-gray-100 hover:bg-gray-100 focus:outline-none "
                >
                    Trạng thái
                    <span class="ml-2" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
</svg>
                    </span>
                </button>
                <a href="{{route('add_device')}}"
                    class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Thêm mới
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>

            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-bold tracking-wide text-left text-gray-800 uppercase border-b  bg-gray-200"
                        >
                            <th class="px-4 py-3">Tên thiết bị</th>
                            <th class="px-4 py-3">Model</th>
                            <th class="px-4 py-3">Nhãn hiệu</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Ngày cập nhật</th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y "
                        >
                        @foreach($devices as $device)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{$device->name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{$device->model_number}}</td>
                                <td class="px-4 py-3 text-sm">{{$device->brand_name}}</td>
                                <td class="px-4 py-3 text-sm">{{$device->status}}</td>
                                <td class="px-4 py-3 text-sm">{{$device->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t  bg-gray-50 sm:grid-cols-9">
                <span class="flex justify-end item-center col-span-9 ">
                  {{ $devices->links() }}
                </span>

                </div>
            </div>
        </div>
    </main>
@stop
@push('js')
    <script src="{{ asset('assets/js/mapcir/js/mapcir.js') }}"></script>
    <style type="text/css">
        #map {
            height: 80%;
        }
    </style>
    <script>
        // map init
        const center = new google.maps.LatLng(21.006145, 105.843114);

        let map = new google.maps.Map(document.getElementById('map'), {
            center: center,
            zoom: 15
        });

        // load map tiles
        const TILE_URL = 'http://maptile.mapcir.com/lyrs=p&x={x}&y={y}&z={z}';
        const TILE_SIZE = 256;
        const TILE_LAYER_ID = 'layer_tiles';
        let layerTiles = new google.maps.ImageMapType({
            name: TILE_LAYER_ID,
            getTileUrl: function(coord, zoom) {
                const url = TILE_URL
                    .replace('{x}', coord.x)
                    .replace('{y}', coord.y)
                    .replace('{z}', zoom);
                return url;
            },
            tileSize: new google.maps.Size(TILE_SIZE, TILE_SIZE),
            minZoom: 1,
            maxZoom: 21
        });

        map.mapTypes.set(TILE_LAYER_ID, layerTiles);
        map.setMapTypeId(TILE_LAYER_ID);
    </script>
@endpush

