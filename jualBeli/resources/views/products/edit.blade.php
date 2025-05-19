<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name" class="w-full border p-2" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="w-full border p-2" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="w-full border p-2" value="{{ $product->price }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="w-full border p-2" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-green font-bold py-2 px-4 rounded">
                            Update Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>