@extends('layout.master')
@section('title', 'Quyết định kiểm kê')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700">
                Quyết định kiểm kê
            </h2>

            @if ($errors->any())
                <div
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-red-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

                <div id="create_group" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                    <label class="block text-sm pb-4">
                        <span class="text-gray-800 text-xl">Thành viên hội đồng kiểm kê</span>
                    </label>
                    <form class="w-full" method="POST" action="{{route('create_group')}}">
                        {{ csrf_field() }}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="grid-state">
                                    Họ tên
                                </label>
                                <div class="relative py-2">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tv_1" name="tv_1">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
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
                                <div class="relative py-2">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tv_2" name="tv_2">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
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
                                <div class="relative py-2">
                                    <select
                                        class=" block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tv_3" name="tv_3">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
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
                                <span onclick="add4()" id="add_4"
                                      class="cursor-pointer block flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-red-200 hover:bg-red-200  focus:outline-none focus:shadow-outline-purple">
                                Thêm thành viên
                                <span class="ml-2" aria-hidden="true">+</span>
                            </span>

                                <div class="relative py-2 hidden" id="tvp_4">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tv_4" name="tv_4">
                                        @foreach($users as $user)
                                            <option value="" selected disabled hidden>Chọn</option>
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
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
                                <span onclick="add5()" id="add_5"
                                      class="cursor-pointer hidden flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-red-200 hover:bg-red-200  focus:outline-none focus:shadow-outline-purple">
                            Thêm thành viên
                            <span class="ml-2" aria-hidden="true">+</span>
                        </span>
                                <div class="relative py-2 hidden" id="tvp_5">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tv_5" name="tv_5">
                                        @foreach($users as $user)
                                            <option value="" selected disabled hidden>Chọn</option>
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
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

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="grid-state">
                                    Vị trí trong hội đồng
                                </label>

                                <div class="relative py-2">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_1" name="p_1">
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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
                                <div class="relative py-2">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_2" name="p_2">
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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

                                <div class="relative py-2">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_3" name="p_3">
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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

                                <div class="relative py-2 hidden" id="ptv_4">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_4" name="p_4">
                                        <option value="" selected disabled hidden>Chọn</option>
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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

                                <div class="relative py-2 hidden" id="ptv_5">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_5" name="p_5">
                                        <option value="" selected disabled hidden>Chọn</option>
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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

                                <div class="relative py-2 hidden " id="ptv_6">
                                    <select
                                        class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="p_6" name="p_6">
                                        <option value="" selected disabled hidden>Chọn</option>
                                        <option value="Chủ tịch hội đồng">Chủ tịch hội đồng</option>
                                        <option value="Phó chủ tịch hội đồng">Phó chủ tịch hội đồng</option>
                                        <option value="Thư ký">Thư ký</option>
                                        <option value="Thành viên">Thành viên</option>
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
                                    Địa điểm<span class="text-red-400">*</span>
                                </label>
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    name="locations[]" multiple="multiple" id="locations" required>
                                    @foreach($venues as $venue)
                                        <option value="{{$venue->id}}">{{$venue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="block w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-state">
                                            Ngày kiểm kê<span class="text-red-400">*</span>
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-600 rounded pt-1 pb-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            name="date" type="date" placeholder="" required>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-state">
                                            Thời gian bắt đầu<span class="text-red-400">*</span>
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-600 rounded pt-1 pb-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            name="time" type="time" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="grid-first-name">
                                    Mục đích
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white text-gray-700 border border-gray-600 rounded pt-1 pb-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="reason" type="text" placeholder="" >
                            </div>

                        </div>
                        <div class="px-6 my-6">
                            <button
                                class="flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                Thành lập hội đồng
                                <span class="ml-2" aria-hidden="true">+</span>
                            </button>
                        </div>
                    </form>
                </div>
        </div>

        </div>
        </div>
        @include('sidebar.footer')
    </main>
@stop
@push('js')
    <script>
        // document.getElementsByClassName('.select2-search__field').classList.add('p-4');

        function add4() {
            document.getElementById('add_4').classList.add('hidden');
            document.getElementById('tvp_4').classList.remove('hidden');
            document.getElementById('ptv_4').classList.remove('hidden');
            document.getElementById('add_5').classList.remove('hidden');
        }

        function add5() {
            document.getElementById('add_5').classList.add('hidden');
            document.getElementById('tvp_5').classList.remove('hidden');
            document.getElementById('ptv_5').classList.remove('hidden');
            document.getElementById("add_6").classList.remove('hidden');
        }

        function add6() {
            document.getElementById('add_6').classList.add('hidden');
            document.getElementById('tvp_6').classList.remove('hidden');
            document.getElementById('ptv_6').classList.remove('hidden');
        }

        (function ($) {
            $(document).ready(function () {
                $('#locations').select2();
            });
        })(jQuery);

    </script>
@endpush

