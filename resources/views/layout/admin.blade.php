@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- page -->
    <main class="min-h-screen w-full bg-gray-100 text-gray-700 font-medium" x-data="layout">
        <!-- header page -->
        <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
            <!-- logo -->
            <div class="flex items-center space-x-2">
                <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
                <a href="{{ route('welcome') }}" class="p-1 text-xl font-black leading-none text-gray-900"><span>vascomm</span><span
                        class="text-indigo-600">.</span></a>
            </div>

            <!-- button profile -->
            <div>
                <button type="button" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" class="">
                    {{ Auth::guard('admin')->user()->username }}
                </button>

                <!-- dropdown profile -->
                <div class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md" x-show="profileOpen"
                    x-transition>
                    <div class="flex items-center space-x-2 p-2">
                        <div class="font-medium">{{ Auth::guard('admin')->user()->username }}</div>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('logoutAdmin') }}" class="flex items-center space-x-2 transition hover:text-indigo-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <div>Log Out</div>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- aside -->
            <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2 min-h-screen" x-show="asideOpen">
                <a href="{{ route('admin') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-indigo-600">
                    <span class="text-2xl"><i class="bx bx-home"></i></span>
                    <span>Dashboard</span>
                </a>
            </aside>

            <!-- main content page -->
            <div class="w-full p-4">@yield('here')</div>
        </div>
    </main>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("layout", () => ({
                profileOpen: false,
                asideOpen: true,
            }));
        });
    </script>
@endsection
