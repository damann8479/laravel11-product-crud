@extends('layouts.app')

@section('content')
    @include('includes.notification')
    <div class="xl:container mx-auto mt-10">
        <div class="w-1/2 mx-auto shadow-md p-5 bg-blue-50">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div>
                    <label for="article_code" class="block font-bold text-gray-500">Art-Nummer:</label>
                    <input name="article_code" type="text"
                        class="border none rounded-md shadow-md p-2 focus:border-blue-500  outline-none w-full"
                        value="{{ old('article_code') }}">
                    @error('article_code')
                        <p class="text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="name" class="block font-bold text-gray-500">Product Name:</label>
                    <input name="name" type="text"
                        class="border none rounded-md shadow-md p-2 focus:border-blue-500  outline-none w-full"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5 flex justify-between">
                    <div>
                        <label for="name" class="block font-bold text-gray-500">Quantity:</label>
                        <input name="quantity" type="number"
                            class="border none rounded-md shadow-md p-2 focus:border-blue-500  outline-none w-full"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <p class="text-xs text-red-600 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="block font-bold text-gray-500">Product Price:</label>
                        <input name="price" type="number"
                            class="border none rounded-md shadow-md p-2 focus:border-blue-500  outline-none w-full"
                            value="{{ old('price') }}">
                        @error('price')
                            <p class="text-xs text-red-600 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="description" class="block font-bold text-gray-500">Description:</label>
                    <textarea name="description" class="w-full border rounded-md focus:border-blue-500 p-2 outline-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <button class="bg-blue-500 p-2 rounded-md text-white mt-5">Save</button>
            </form>
        </div>
    </div>
@endsection
