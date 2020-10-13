@extends('layout.master')
@section('title', 'Quyết định kiểm kê')
@section('sidebar')
    @include('sidebar.menu')
@stop
@section('content')
    @include('sidebar.header')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Quyết định kiểm kê
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-800 text-xl">Thành viên hội đồng kiểm kê</span>
                </label>

                <div class="grid gap-6 mb-8 md:grid-cols-2">
                    <div class="min-w-0 p-2 bg-white  dark:bg-gray-800">
                        <label class="block mt-1 text-sm ">
                <span class="text-gray-800 dark:text-gray-400">
                  Họ và tên
                </span>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full my-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Nguyễn Hoàng Dương</option>
                                <option>Nguyễn Hoàng A</option>
                                <option>Nguyễn Hoàng B</option>
                                <option>Nguyễn Hoàng C</option>
                            </select>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full my-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Nguyễn Hoàng A</option>
                                <option>Nguyễn Hoàng A</option>
                                <option>Nguyễn Hoàng B</option>
                                <option>Nguyễn Hoàng C</option>
                            </select>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Nguyễn Hoàng B</option>
                                <option>Nguyễn Hoàng A</option>
                                <option>Nguyễn Hoàng B</option>
                                <option>Nguyễn Hoàng C</option>
                            </select>
                        </label>
                    </div>

                    <div class="min-w-0 p-2 bg-white dark:bg-gray-800">
                        <label class="block mt-1 text-sm ">
                <span class="text-gray-700 dark:text-gray-400">
                  Đại diện
                </span>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Trưởng ban</option>
                                <option>Ủy viên</option>
                            </select>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Ủy viên</option>
                                <option>Trưởng ban</option>
                            </select>
                            <select
                                class="rounded-lg shadow-xs p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option>Ủy viên</option>
                                <option>Trưởng ban</option>

                            </select>
                        </label>
                    </div>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Ngày kiểm kê</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="10/10/2020"></textarea>
                </label>

                <label class="block mt-0 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Ghi chú</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Note"></textarea>
                </label>
                <div class="px-6 my-6">
                    <button
                        class="flex items-center justify-between w-auto px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                        Tạo
                        <span class="ml-2" aria-hidden="true">+</span>
                    </button>
                </div>
            </div>

        </div>
        <div class="container px-6 mx-auto grid">
            <h2 class="my-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Danh sách quyết định kiểm kê
            </h2>

        </div>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Người quyết định</th>
                        <th class="px-4 py-3">Ngày</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <tr class="text-gray-700 dark:text-gray-400">
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
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
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
                    <tr class="text-gray-700 dark:text-gray-400">
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
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
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
                    <tr class="text-gray-700 dark:text-gray-400">
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
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
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
        </div>
    </main>
@stop

