@extends('layout.master')
@section('title', 'Thống kê thiết bị')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    <style>
        #example tr>td {
            min-width: 150px;
            max-width: 200px;
        }
        .l-col {
            width: 150px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    @include('sidebar.header')

    <main class="h-full">
        <div id="map"></div>
        <div class="container px-6 mx-auto grid">
            <div class="flex w-full">
                <h2 class="w-1/2 my-4 text-2xl font-semibold text-gray-700 ">
                    Kiểm kê
                </h2>
                <div class="flex p-10 w-1/2 justify-end">
                    <div class="dropdown inline-block relative">
                        <button class="bg-purple-600 text-white border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 font-semibold py-2 px-4 inline-flex items-center">
                            <span class="mr-1">Chuyển tầng Maps</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                            <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">One</a></li>
                            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Two</a></li>
                        </ul>
                    </div>
                </div>

            </div>

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


            </div>
            <!-- New Table -->
            <div class="w-full overflow-x-auto rounded-lg shadow-xs mb-12">
                <div class="w-full ">
                    <table id="example"  class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thiết bị</th>
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

                            <th>Trạng thái thiết bị</th>
                            <th>Ghi chú</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                        @foreach($devices as $key=> $device)
                            <iframe name="votar{{$device->id}}" style="display:none;"></iframe>
                            <form target="votar{{$device->id}}" class="myForm" method="POST" action="{{route('create_inven_detail', array('id_inventory' => $inventory->id, 'id_device' => $device->id))}}">
                                {{ csrf_field() }}
                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3 text-center">{{$key+1}}</td>
                            <td class="px-4 py-3 text-center cursor-pointer" onclick="displayDevice({{$device}})">{{$device->name}}</td>
                            <td class="px-4 py-3 text-center" >{{$device->acc_number_device}}</td>
                            <td class="px-4 py-3 text-center" >
                                {{number_format($device->acc_original_price, 0, ',', ',')}}</td>
                            <td class="px-4 py-3 text-center " >
                                <input
                                    class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="acc_present_price" type="text" data-type='currency' required value="{{number_format($device->acc_present_price, 0, ',', ',')}}" ></td>
                            <td class="px-4 py-3 text-center">
                                <input
                                    class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                     name="number_device" type="text" required value=" {{$device->number_device}}" >
                               </td>
                            <td class="px-4 py-3 text-center">
                                <input
                                    class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="original_price" type="text" data-type='currency' pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required value="{{number_format($device->original_price, 0, ',', ',')}}" >
                                </td>
                            <td class="px-4 py-3 text-center ">
                                <input
                                    class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="present_price" type="text" data-type='currency' required value="{{number_format($device->present_price, 0, ',', ',')}}" >
                            <td class="px-4 py-3 text-center">
                                <select
                                    class="l-col block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                     name="status">
                                    @foreach($status as $key=>$statu)
                                        <option value="{{$key}}">{{$statu}}</option>
                                    @endforeach
                                </select>
                                </td>
                            <td class="px-4 py-3 text-center">
                                <input
                                    class="l-col block w-auto bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="notes" type="text" value="{{$device->notes}}" >
                            </td>
                        </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex mb-8">
                <a  href="{{route('inven_end',array('id_inventory'=> $inventory->id))}}"
                    class="max-w-xs mx-auto  text-center mb-12 items-center justify-between px-6 py-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Hoàn thành kiểm kê
                </a>
            </div>

        </div>
        @include('sidebar.footer')
    </main>
@stop
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        (function () {

            var auto_refresh = setInterval(function () {
                submitform();
            }, 10000);

            function submitform() {
                var x = document.getElementsByClassName("myForm");
                for ( i = x.length -1; i >= 0; i--){
                        x[i].submit();
                }
            }
        })();

        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            // blur: function() {
            //   formatCurrency($(this), "blur");
            // }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val =  left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }



    </script>
    <style type="text/css">
        #map {
            height: 85%;
        }
    </style>

    <script src="{{ asset('assets/js/mapcir/js/mapcir.js') }}"></script>
    <script>
        // (function() {
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
                zoom: 20
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


            var devices =  {!! json_encode($devices) !!};
            for( var i=0; i< devices.length; i++) {
                var device = devices[i];
                drawPoi(device, map);
            }

            function drawPoi(poi, map) {
                var zoom = map.getZoom();
                var scale = 1128.497220 *  0.00067 * (21 > zoom ? zoom/21 : 21/zoom);

                var circle = new google.maps.Circle({
                    radius: 1.5*scale,
                    center: new google.maps.LatLng(poi.latitude, poi.longitude),
                    clickable: true,
                    strokeOpacity: 0,
                    fillOpacity: 0
                });

                var url_image = '/' + poi.image;
                if(poi.image == ''){
                    url_image = url_image + 'uploads/image_device/default.jpg';
                }

                var contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<img class="max-w-lg" style="width:350px;height:200px;" src="'+url_image+'" alt="image device" />'+
                    '<h1 id="firstHeading" class="font-bold text-lg">'+poi.name+'</h1>' +
                    '<div id="bodyContent">' +
                    '<p><b>Nhãn hiệu: </b>'+poi.brand_name+'</p>'+
                    '<p><b>Model: </b>'+poi.model_number+'</p>'+
                    '<p><b>Seri: </b>'+poi.serial_number+'</p>'+
                    "</p>" +
                    "</div>" +
                    "</div>";

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 500,
                });

                google.maps.event.addListener(circle, 'click', function(ev) {
                    infowindow.setPosition(ev.latLng);
                    infowindow.open(map);
                });

                var devicetype = {!! json_encode($cate) !!};

                var url_icon = '3063/3063668.svg';
                for( var i = 0; i < devicetype.length; i++){
                    if(poi.category_id == devicetype[i].id){
                        url_icon = devicetype[i].icon;
                        break;
                    }
                }

                var iconBase = 'https://www.flaticon.com/svg/static/icons/svg/' + url_icon;

                var bounds = circle.getBounds();
                const overlay = new USGSOverlay(bounds, iconBase);
                overlay.setMap(map);
                circle.setMap(map);
            }

            function displayDevice(device){
                var latlg = new google.maps.LatLng(device.latitude, device.longitude);
                var url_image = '/' + device.image;
                if(device.image == ''){
                    url_image = url_image + 'uploads/image_device/default.jpg';
                }

                var contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<img class="max-w-lg" style="width:350px;height:200px;" src="'+url_image+'" alt="image device" />'+
                    '<h1 id="firstHeading" class="font-bold text-lg">'+device.name+'</h1>' +
                    '<div id="bodyContent">' +
                    '<p><b>Nhãn hiệu: </b>'+device.brand_name+'</p>'+
                    '<p><b>Model: </b>'+device.model_number+'</p>'+
                    '<p><b>Seri: </b>'+device.serial_number+'</p>'+
                    "</p>" +
                    "</div>" +
                    "</div>";

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 500,
                    position: latlg,
                });
                window.scroll({
                    top: 0,
                    left: 0,
                });
                infowindow.open(map);

            }

        // })();

    </script>


@endpush

