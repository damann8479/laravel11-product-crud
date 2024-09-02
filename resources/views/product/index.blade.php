@extends('layouts.app')

@section('content')
@include('includes.notification')
    <div class="xl:container mx-auto mt-10">
        <div class="flex justify-between mb-3">
            <p class="font-bold">Products</p>
            <form action="{{ route('products.index') }}" method="GET">
                <div class="flex justify-between">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 p-2 rounded-md text-white mr-5">Create new Product</a>
                    <input type="text" name="search"
                        class="border none rounded-md shadow-md p-2 focus:border-blue-500  outline-none"
                        placeholder="search..." />
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Art-Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->article_code }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                   <a href="{{ route('products.edit',  $product->id ) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> 
                                    <form action="{{ route('products.destroy' , $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-5 text-red-600">Delete</button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @empty
                        <p>Products not found</p>
                    @endforelse


                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $products->links() }}
        </div>
    </div>
@endsection
