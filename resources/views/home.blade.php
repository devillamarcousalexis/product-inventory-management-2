@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center mt-4">
    <div class="flex items-center justify-between mb-3 w-full md:w-4/5">
        <div class="text-left mb-2">
            <h1 class="text-2xl md:text-4xl font-poppins font-extrabold leading-none text-black">
                PRODUCT INVENTORY <span class="text-black dark:text-black">MANAGEMENT</span>
            </h1>
        </div>
        <div class="text-right font-poppins font-bold mb-2">
            <a href="view-category" type="button" class="no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">Add
                Product Category</a>
            <a href="view-product" type="button" class="no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">Add
                Products</a>
        </div>
    </div>
</div>
@endsection