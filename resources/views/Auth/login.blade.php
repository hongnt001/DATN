@extends('layout.master')
@section('title', 'Đăng nhập')
@section('content')
    <div class="items-center p-6 bg-gray-50 ">
        <div
            class="h-auto my-8 max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
        >
            <div class="p-6 sm:p-12 md:w-full">
                <form class="w-full" method="POST" action="{{route('postLogin')}}">
                    {{ csrf_field() }}
                    <img class="h-32 p-2 w-auto mx-auto"
                         src="https://icon-library.com/images/inventory-management-icon/inventory-management-icon-0.jpg">
                    <h1
                        class="mb-4 text-2xl font-semibold text-gray-700 text-center"
                    >
                        Đăng nhập
                    </h1>
                    @if (isset($error))
                        <div
                            class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <label class="block text-sm">
                        <span class="text-gray-900">Email</span>
                        <input
                            class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border border-gray-200 p-2 rounded form-input"
                            placeholder="admin@admin.com"
                            type="email" name="email" required
                        />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-900">Mật khẩu</span>
                        <input
                            class="block w-full mt-1 text-sm border border-gray-200 rounded focus:border-purple-400 focus:outline-none focus:shadow-outline-purple p-2 form-input"
                            placeholder="********"
                            type="password" name="password" required
                        />
                    </label>
                    <button
                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                        Đăng nhập
                    </button>

                    <hr class="my-8"/>
{{--                    <p class="mt-4">--}}
{{--                        <a--}}
{{--                            class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"--}}
{{--                            href="{{route('forgot')}}"--}}
{{--                        >--}}
{{--                            Quên mật khẩu?--}}
{{--                        </a>--}}
{{--                    </p>--}}
                </form>
            </div>
        </div>
    </div>
    </div>
@stop
