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
                Kiểm kê
            </h2>
            <div class="px-6 my-6 flex button">
                <p>Thời gian:  {{$inventory->date_inventory}} - {{$inventory->time_inventory}} </p>
                <p>Địa điểm:
                @foreach($inventory->locate as $locate)
                    <p>{{$locate}}</p>
                    @endforeach</p>

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
            height: 85%;
        }
    </style>

    <script>
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
    </script>

    <script>
        // map init
        const center = new google.maps.LatLng(38.44878983, -122.74372341);

        let map = new google.maps.Map(document.getElementById('map'), {
            center: center,
            zoom: 18
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

        const bounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(38.447803, -122.745024),
            new google.maps.LatLng(38.449699, -122.74273)

        );

        var srcImage = "/uploads/floor_demo1.svg";


        const overlay = new USGSOverlay(bounds, srcImage);
        overlay.setMap(map);

        //Button Floor
        function CenterControl(controlDiv, map) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#000000";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Click to recenter the map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "16px";
            controlText.style.lineHeight = "38px";
            controlText.style.paddingLeft = "5px";
            controlText.style.paddingRight = "5px";
            controlText.innerHTML = "Change Floor";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", changeFloor);
        }


        //add Button Floor
        const centerControlDiv = document.createElement("div");
        CenterControl(centerControlDiv, map);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(
            centerControlDiv
        );

        function changeFloor(){
            if(srcImage = "/uploads/floor_demo1.svg" ) {
                srcImage = "/uploads/floor_demo2.svg"
        } else if(srcImage = "/uploads/floor_demo2.svg"){
                srcImage = "/uploads/floor_demo1.svg"
            }
        }
    </script>
@endpush

