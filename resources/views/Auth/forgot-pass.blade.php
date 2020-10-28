@extends('layout.master')
@section('title', 'Quên mật khẩu')
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
                    Quên mật khẩu
                </h1>
                <label class="block text-sm">
                    <span class="text-gray-900">Email</span>
                    <input
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple p-2 border border-gray-200 rounded form-input"
                        placeholder="admin@admin.com"
                        type="email" required
                    />
                </label>

                <a
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="../index.html"
                >
                    Yêu cầu cấp lại mật khẩu
                </a>
            </div>
        </div>
    </div>
</div>
@stop
