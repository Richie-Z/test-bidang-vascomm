@extends('layout.admin')

@section('here')
    <div class="bg-white p-8 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div>
                <h2 class="text-gray-600 font-semibold">Detail Customer</h2>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="flex flex-col mb-6">
                    <label for="name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Name:</label>
                    <div class="relative">
                        <input disabled id="name" type="text" name="name"
                            class="text-sm placeholder-gray-500 px-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-indigo-400"
                            value="{{ $customer->name }}" />
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <label for="username" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Username:</label>
                    <div class="relative">
                        <input disabled id="username" type="text" name="username"
                            class="text-sm placeholder-gray-500 px-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-indigo-400"
                            value="{{ $customer->username }}" />
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="image" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-700">Image:</label>
                    <div class="relative overflow-hidden w-[50vmin] h-[50vmin] [border:5px_solid_#9ca3af] rounded-md">
                        <img src="{{ asset("customers/$customer->image") }}" alt="" class="image" />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
