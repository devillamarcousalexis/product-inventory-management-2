@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center mt-4">
    @if(session('message'))
    <div class="flex items-center justify-between font-poppins mb-3 w-full md:w-4/5">
        <div class="w-full flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg border-green-900 border-1 bg-blue-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('message') }}
            </div>
        </div>
    </div>
    @endif
    <div class="flex items-center justify-between font-poppins mb-3 w-full md:w-4/5">
        <a href="/home" type="button"
            class="text-center no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">
            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 16 14">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
            </svg></a>
        <div class="text-center">
            <h1 class="text-2xl md:text-4xl font-extrabold leading-none text-black">
                PRODUCT <span class="text-black dark:text-black">INVENTORY</span>
            </h1>
        </div>
        <div class="text-right">
            <a href="add-product" type="button"
                class="no-underline text-white bg-[#0079FF] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#0079FF] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-[#0079FF] dark:focus:ring-[#0079FF]">Add
                Product</a>
            <a href="archived-product" type="button"
                class="no-underline text-white bg-[#FF0060] hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-[#FF0060] font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-[#FF0060] dark:hover:bg-[#FF0060] dark:focus:ring-[#FF0060]">Archived
                Products</a>
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
                        <a href="edit-product/{{ $product->product_id }}" type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg
                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 20 20">
                                <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                            </svg></a>
                    </td>
                    <td scope="col">
                        <a href="{{ url('/softdelete/product/'.$product->product_id) }}" type="button"
                            onclick="return confirm('Are you sure you want to delete this product?')"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg
                                class="w-6 h-6 text-gray-800 dark:text-red" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 18 20">
                                <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                            </svg></a>
                    </td>
                    @else
                    <td scope="col">{{ $product->product_id }}</td>
                    <td scope="col">The category for this product is deleted.</td>
                    <td scope="col">{{ $product->product_name }}</td>
                    <td scope="col">
                        <a href="edit-product/{{ $product->product_id }}" type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            disabled><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 20 20">
                                <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                            </svg></a>
                    </td>
                    <td scope="col">
                        <a href="{{ url('/softdelete/product/'.$product->product_id) }}" type="button"
                            onclick="return confirm('Are you sure you want to delete this product?')"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            disabled><svg class="w-6 h-6 text-gray-800 dark:text-red" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 18 20">
                                <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
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