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
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
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
                                  class="block flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-red-200 hover:bg-red-200  focus:outline-none focus:shadow-outline-purple">
                                Thêm thành viên
                                <span class="ml-2" aria-hidden="true">+</span>
                            </span>

                            <div class="relative py-2 hidden" id="tvp_4">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="tv_4" name="tv_4">
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
                            <span onclick="add5()" id="add_5"
                                  class="hidden flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-red-200 hover:bg-red-200  focus:outline-none focus:shadow-outline-purple">
                            Thêm thành viên
                            <span class="ml-2" aria-hidden="true">+</span>
                        </span>
                            <div class="relative py-2 hidden" id="tvp_5">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="tv_5" name="tv_5">
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
                                <span onclick="add6()" id="add_6"
                                      class="hidden block flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-red-200 hover:bg-red-200  focus:outline-none focus:shadow-outline-purple">
                            Thêm thành viên
                            <span class="ml-2" aria-hidden="true">+</span>
                        </span>
                            </div>


                            <div class="relative py-2 hidden" id="tvp_6">
                                <select
                                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="tv_6" name="tv_6">
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
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-state">
                                Vị trí trong hội đồng kiểm kê
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
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 ">
                Danh sách quyết định kiểm kê
            </h2>

        </div>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
                    >
                        <th class="px-4 py-3">Người quyết định</th>
                        <th class="px-4 py-3">Ngày</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y"
                    >
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div
                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                >
                                    <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt=""
                                        loading="lazy"
                                    />
                                    <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                    ></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600">
                                        10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button
                                class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                Chi tiết
                                <span class="ml-2" aria-hidden="true">+</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div
                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                >
                                    <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt=""
                                        loading="lazy"
                                    />
                                    <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                    ></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600">
                                        10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button
                                class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                Chi tiết
                                <span class="ml-2" aria-hidden="true">+</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="text-gray-700 ">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div
                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                >
                                    <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt=""
                                        loading="lazy"
                                    />
                                    <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                    ></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600 ">
                                        10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button
                                class="ml-16 flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                Chi tiết
                                <span class="ml-2" aria-hidden="true">+</span>
                            </button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9"
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
        </div>
    </main>
@stop
@push('js')
    <script>
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


    </script>
@endpush

