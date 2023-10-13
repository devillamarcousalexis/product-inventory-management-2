@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center mt-4">
    @if(session('message'))
    <div class="flex items-center justify-between font-poppins mb-3 w-full md:w-4/5">
        <div class="w-full flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg border-green-900 border-1 bg-blue-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('message') }}
            </div>
        </div>
    </div>
    @endif
    <div class="flex items-center justify-between font-poppins mb-3 w-full md:w-4/5">
        <div class="text-left mb-2">
            <h1 class="text-2xl md:text-4xl font-extrabold leading-none text-black">
                ADD <span class="text-black dark:text-black">CATEGORY</span>
            </h1>
        </div>
        <div class="text-right">
            <a href="/view-category" type="button" class="no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">
                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                    <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
                </svg></a>
        </div>
    </div>

    <div class="w-full md:w-4/5 ">
        <form class="space-y-6" method="POST" action="/save-category" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div>
                <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    Name</label>
                <input type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter category name" required>
            </div>
            <button type="submit" class="w-full text-white bg-[#0079FF] hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-[#0079FF] font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</div>
@endsection