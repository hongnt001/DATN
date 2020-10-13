@extends('layout.master')
@section('map')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAowly3iT7ilrF0--nM-HcUDnOT4XubRh0&&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <style type="text/css">
        #map {
            height: 80%;
        }
    </style>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 21.006145, lng: 105.843114 } ,
                zoom: 15,
            });
        }
    </script>
    @stop

@section('title', 'Thống kê thiết bị')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')

    <main class="h-full overflow-y-auto">
        <div id="map" ></div>
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Danh sách thiết bị
            </h2>
            <div class="px-6 my-6 flex">
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
                <button
                    class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Thêm mới
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>

            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">Tên thiết bị</th>
                            <th class="px-4 py-3">Model</th>
                            <th class="px-4 py-3">Trạng thái</th>
                            <th class="px-4 py-3">Ngày cập nhật</th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        <tr class="text-gray-700 dark:text-gray-400">

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                        >
                          <svg
                              aria-hidden="true"
                              class="w-4 h-4 fill-current"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next"
                        >
                          <svg
                              class="w-4 h-4 fill-current"
                              aria-hidden="true"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
                </div>
            </div>
        </div>
    </main>
@stop

