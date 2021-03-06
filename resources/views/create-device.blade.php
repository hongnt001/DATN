@extends('layout.master')
@section('title', 'Thêm thiết bị')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')
    <main class="h-full overflow-y-auto">
        <div id="map"></div>
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Thêm thiết bị
            </h2>
            @if ($errors->any())
                <div
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form class="w-full" method="POST" action="{{route('create_device')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Tên thiết bị<span class="text-red-400">*</span>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="name" name="name" type="text" placeholder="" required>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                Phân loại<span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="category" name="category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Model
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="model" name="model" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Nhãn hiệu
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="brand" name="brand" type="text" placeholder="">
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Lat
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                 name="lat" type="text" placeholder="" readonly>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Long
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                 name="long" type="text" placeholder="" readonly>
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Code - Mã số
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="code" name="code" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                Số phòng<span class="text-red-400">*</span>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="room" name="room" type="text" placeholder="" required>
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Số Seri
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="seri" name="seri" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Số lượng
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="number" name="number" type="number" value="1" placeholder="">
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Nơi sản xuất
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="manu" name="manu" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                Trạng thái<span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="status" name="status">
                                    @foreach($status as $key=>$statu)
                                    <option value="{{$key}}">{{$statu}}</option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                Loại tài sản
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="type_ts" name="type_ts">
                                    <option value="Tài sản cố định">Tài sản cố định</option>
                                    <option value="Tài sản mượn">Tài sản mượn</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                % sử dụng
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="per" name="per">
                                    <option value="100">100 %</option>
                                    <option value="95">95 %</option>
                                    <option value="95">90 %</option>
                                    <option value="95">85 %</option>
                                    <option value="95">80 %</option>
                                    <option value="95">75 %</option>
                                    <option value="95">70 %</option>
                                    <option value="95">65 %</option>
                                    <option value="95">60 %</option>
                                    <option value="95">55 %</option>
                                    <option value="95">50 %</option>
                                    <option value="95">45 %</option>
                                    <option value="95">40 %</option>
                                    <option value="95">35 %</option>
                                    <option value="95">30 %</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Nguyên giá<span class="text-red-400">*</span>
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                </div>
                                <input name="price_ac" class="form-input appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white sm:text-sm sm:leading-5"
                                       placeholder="0.00" required>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <span>VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                     for="grid-first-name">
                            Giá trị còn lại<span class="text-red-400">*</span>
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                            <input name="price_now" class="form-input appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white sm:text-sm sm:leading-5"
                                   placeholder="0.00" required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <span>VNĐ</span>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Năm đưa vào sử dụng
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="year_use" name="year_use" type="text" value="2020">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Ghi chú
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="note" name="note" type="text" >
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Upload ảnh thiết bị
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type='file' id="image_device"  name="image_device" onchange="readURL(this);" />
                            <img id="blah" class="max-w-lg hidden" src="http://placehold.it/180" alt="your image" />
                    </div>
                    </div>
                    <div class="px-6 my-6">
                        <button
                            class="flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Thêm
                            <span class="ml-2" aria-hidden="true">+</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
        @include('sidebar.footer')
    </main>

@stop
@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('blah').classList.remove('hidden');
                    document.getElementById('blah').src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <style type="text/css">
        #map {
            height: 85%;
        }
    </style>
    <script src="{{ asset('assets/js/mapcir/js/mapcir.js') }}"></script>
    <script>
        (function() {
            // The custom USGSOverlay object contains the USGS image,
            // the bounds of the image, and a reference to the map.
            class USGSOverlay extends google.maps.OverlayView {
                constructor(bounds, image) {
                    super();
                    // Initialize all properties.
                    this.bounds_ = bounds;
                    this.image_ = image;
                    // Define a property to hold the image's div. We'll
                    // actually create this div upon receipt of the onAdd()
                    // method so we'll leave it null for now.
                    this.div_ = null;
                }

                /**
                 * onAdd is called when the map's panes are ready and the overlay has been
                 * added to the map.
                 */
                onAdd() {
                    console.log("on add")
                    this.div_ = document.createElement("div");
                    this.div_.style.borderStyle = "none";
                    this.div_.style.borderWidth = "0px";
                    this.div_.style.position = "absolute";
                    // Create the img element and attach it to the div.
                    const img = document.createElement("img");
                    img.src = this.image_;
                    img.style.width = "100%";
                    img.style.height = "100%";
                    img.style.position = "absolute";
                    this.div_.appendChild(img);
                    // Add the element to the "overlayLayer" pane.
                    const panes = this.getPanes();
                    panes.overlayLayer.appendChild(this.div_);
                }

                draw() {
                    // We use the south-west and north-east
                    // coordinates of the overlay to peg it to the correct position and size.
                    // To do this, we need to retrieve the projection from the overlay.
                    const overlayProjection = this.getProjection();
                    // Retrieve the south-west and north-east coordinates of this overlay
                    // in LatLngs and convert them to pixel coordinates.
                    // We'll use these coordinates to resize the div.
                    const sw = overlayProjection.fromLatLngToDivPixel(
                        this.bounds_.getSouthWest()
                    );
                    const ne = overlayProjection.fromLatLngToDivPixel(
                        this.bounds_.getNorthEast()
                    );

                    // Resize the image's div to fit the indicated dimensions.
                    if (this.div_) {
                        this.div_.style.left = sw.x + "px";
                        this.div_.style.top = ne.y + "px";
                        this.div_.style.width = ne.x - sw.x + "px";
                        this.div_.style.height = sw.y - ne.y + "px";
                    }
                }

                /**
                 * The onRemove() method will be called automatically from the API if
                 * we ever set the overlay's map property to 'null'.
                 */
                onRemove() {
                    if (this.div_) {
                        this.div_.parentNode.removeChild(this.div_);
                        this.div_ = null;
                    }
                }
            }

            USGSOverlay.prototype = new google.maps.OverlayView();
            USGSOverlay.prototype.constructor = USGSOverlay;

            // map init
            const center = new google.maps.LatLng(38.44878983, -122.74372341);

            let map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 19
            });

            // load map tiles
            const TILE_URL = 'http://maptile.mapcir.com/lyrs=p&x={x}&y={y}&z={z}';
            const TILE_SIZE = 256;
            const TILE_LAYER_ID = 'layer_tiles';
            let layerTiles = new google.maps.ImageMapType({
                name: TILE_LAYER_ID,
                getTileUrl: function (coord, zoom) {
                    const url = TILE_URL
                        .replace('{x}', coord.x)
                        .replace('{y}', coord.y)
                        .replace('{z}', zoom);
                    return url;
                },
                tileSize: new google.maps.Size(TILE_SIZE, TILE_SIZE),
                minZoom: 17,
                maxZoom: 25
            });

            map.mapTypes.set(TILE_LAYER_ID, layerTiles);
            map.setMapTypeId(TILE_LAYER_ID);

            const bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(38.447803, -122.745024),
                new google.maps.LatLng(38.449699, -122.74273)
            );

            var srcImage = "/uploads/floor_demo0.svg";


            const overlay = new USGSOverlay(bounds, srcImage);
            overlay.setMap(map);

            const myLatlng = { lat: 38.44878983, lng: -122.74372341 };


            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click chọn vị trí đặt thiết bị",
                position: myLatlng,
            });
            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                var latlng = JSON.stringify(mapsMouseEvent.latLng.toJSON());
                jQuery('input[name="lat"]').val(mapsMouseEvent.latLng.lat);
                jQuery('input[name="long"]').val(mapsMouseEvent.latLng.lng);

                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent("Vị trí đã chọn");
                infoWindow.open(map);

            });

        })();
    </script>
    @endpush


