@extends('layout.app')


@section('title', 'Register Customer')

@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css'>
    <link rel='stylesheet' href='{{ asset('webcam/style.css') }}'>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Error Occured!</span> {{ $error }}
                    </div>
                </div>
            @endforeach
        @endif
        @if (session()->has('success'))
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Success!</span> {{ session()->get('success') }}
                </div>
            </div>
        @endif
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-50 max-w-md">
            <a href="{{ route('welcome') }}" class="p-1 text-xl font-black leading-none text-gray-900"><span>vascomm</span><span
                    class="text-indigo-600">.</span></a>
            <div class="font-extrabold self-center text-xl sm:text-3xl text-gray-900">
                Register Customer
            </div>
            <div class="mt-10">
                <form action="{{ route('processRegister') }}" method="POST">
                    @csrf
                    <div class="flex flex-col mb-6">
                        <label for="name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Name:</label>
                        <div class="relative">
                            <input id="name" type="text" name="name"
                                class="text-sm placeholder-gray-500 px-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-indigo-400"
                                placeholder="Enter your name" />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="username" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Username:</label>
                        <div class="relative">
                            <input id="username" type="text" name="username"
                                class="text-sm placeholder-gray-500 px-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-indigo-400"
                                placeholder="Enter your username" />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Password:</label>
                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="text-sm placeholder-gray-500 px-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-indigo-400"
                                placeholder="Enter your password" />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="image" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Image:</label>
                        <input type="hidden" name="image" id="image-file">
                        <div class="relative overflow-hidden w-[50vmin] h-[50vmin] [border:5px_solid_#9ca3af] rounded-md">
                            <video autoplay id="video"></video>
                            <canvas></canvas>
                            <img src="" alt="" class="image image--hidden" />
                            <button class="btn btn--delete btn--hidden">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                            <button class="btn btn--shoot"><i class="fa fa-camera"></i></button>
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit"
                            class=" flex mt-2 items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-indigo-600 hover:bg-indigo-700 rounded-2xl py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Register</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-center items-center mt-6">
            <a href="#" target="_blank" class="inline-flex items-center text-gray-700 font-medium text-xs text-center">
                <span class="ml-2">Already have an account?
                    <a href="{{ route('loginCustomer') }}" class="text-xs ml-2 text-indigo-600 font-semibold">Sign in</a>
                </span>
            </a>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="{{ asset('webcam/script.js') }}"></script>
@endsection
