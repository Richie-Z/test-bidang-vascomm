@extends('layout.app')

@section('title', 'Homepage')
@section('content')
    @php
    $isLogedIn = Auth::guard('admin')->check() || Auth::guard('customer')->check();
    $guard = $isLogedIn && Auth::guard('admin')->check() ? 'Admin' : 'Customer';
    @endphp
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a href="#home" class="inline-block py-4 md:py-0">
                            <span class="p-1 text-xl font-black leading-none text-gray-900"><span>vascomm</span><span
                                    class="text-indigo-600">.</span></span>
                        </a>
                    </div>
                    <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4  lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                            <a href="#home"
                                class="items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">vascomm<span
                                    class="text-indigo-600">.</span></a>
                            <div
                                class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                <a href="#home"
                                    class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-gray-700 md:ml-0 md:w-auto md:px-0 hover:text-indigo-600 md:mx-2 lg:mx-3 md:text-center">Home</a>
                                <a href="#product"
                                    class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Product</a>
                            </div>
                            <div class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                                @if (!$isLogedIn)
                                    <a href="{{ route('loginCustomer') }}"
                                        class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Sign In</a>
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">Sign
                                        Up</a>
                                @else
                                    @if (Auth::guard('admin')->user())
                                        <a href="{{ route('admin') }}"
                                            class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Dashboard</a>
                                    @else
                                        <span class="py-2 mx-0 ml-6 font-medium text-left text-gray-700 md:py-0 md:-ml-6 hover:text-indigo-600">
                                            Hello,
                                            {{ Auth::guard('customer')->user()->name }}</span>
                                    @endif
                                    <a href="{{ route("logout$guard") }}"
                                        class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 ml-0 md:ml-4 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">Sign
                                        Out</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                        class="absolute right-0 flex flex-col items-center  justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" x-cloak="">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </nav>

            <!-- Main Hero Content -->
            <div id="home" class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center">
                <h1
                    class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span class="inline md:block">Test Bidang</span>
                    <span
                        class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block">Vascomm</span>
                </h1>
                <div class="mx-auto mt-5 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium massa quis leo vestibulum, sit amet eleifend erat posuere.
                    Mauris feugiat pretium mauris ac tempus. Suspendisse eget nunc odio.
                </div>
                <div class="flex flex-col items-center mt-12 text-center">
                    <span class="relative inline-flex w-full md:w-auto">
                        <a href="#product"
                            class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                            Explore Now
                        </a>
                    </span>
                    <a href="https://tailwindcomponents.com" target="blank" class="mt-3 text-sm text-indigo-500">Component By tailwindComponents</a>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>

    <section class="bg-stone-100 -scroll-mt-5" id="product">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-full ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                        <p class="text-gray-500 ">{{ $count }} items</p>

                    </div>

                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                        @foreach ($products as $product)
                            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                                <img class="object-cover w-full rounded-md h-72 xl:h-80" src="{{ asset("customers/$product->image") }}" alt="T-Shirt">
                                <h4 class="mt-2 text-lg font-medium text-gray-700 ">{{ $product->name }}</h4>
                                <p class="text-blue-500">Rp. {{ number_format($product->price, 2) }}</p>

                                <button
                                    class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                    <span class="mx-1">Add to cart</span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
