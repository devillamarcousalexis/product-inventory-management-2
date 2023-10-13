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
                ARCHIVED <span class="text-black dark:text-black">PRODUCTS</span>
            </h1>
        </div>
        <div class="text-right">
            <a href="view-product" type="button" class="text-center no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">
                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                    <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
                </svg></a>
        </div>
    </div>

    <div class="w-full md:w-4/5 border rounded-lg shadow-sm overflow-x-auto">
        <table class="w-full min-w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-black">
                <tr>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white">
                        Product ID
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($tbl_product as $product)
                <tr>
                    @if ($product->category)
                    <td scope="col">{{ $product->product_id }}</td>
                    <td scope="col">{{ $product->category->category_name }}</td>
                    <td scope="col">{{ $product->product_name }}</td>
                    <td scope="col">
                        <a href="{{ url('/product/restore/'.$product->product_id) }}" type="button" onclick="return confirm('Are you sure you want to restore this product?')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 20 20"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                </svg></a>
                    </td>
                    @else
                    <td scope="col">{{ $product->product_id }}</td>
                    <td scope="col">The category for this product is deleted.</td>
                    <td scope="col">{{ $product->product_name }}</td>
                    <td scope="col">
                        <a href="{{ url('/product/restore/'.$product->product_id) }}" type="button" onclick="return confirm('Are you sure you want to restore this product?')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 20 20"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                </svg></a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection