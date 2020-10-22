@extends('layout.master')
@section('title', 'Đăng nhập')
@section('content')
<div class="items-center p-6 bg-gray-50 ">
    <div
        class="h-auto my-8 max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
    >
        <div class="p-6 sm:p-12 md:w-full">
            <div class="w-full">
                <img class="h-32 p-2 w-auto mx-auto" src="https://icon-library.com/images/inventory-management-icon/inventory-management-icon-0.jpg">
                <h1
                    class="mb-4 text-2xl font-semibold text-gray-700 text-center"
                >
                    Đăng nhập
                </h1>
                <label class="block text-sm">
                    <span class="text-gray-900">Email</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="admin@admin.com"
                        type="email" required
                    />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-900">Mật khẩu</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="***************"
                        type="password" required
                    />
                </label>

                <!-- You should use a button here, as the anchor is only used for the example  -->
                <a
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="../index.html"
                >
                    Đăng nhập
                </a>

                <hr class="my-8" />
                <p class="mt-4">
                    <a
                        class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                        href="./forgot-password.html"
                    >
                        Quên mật khẩu?
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop
