<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name" class="w-full border p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="w-full border p-2" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="w-full border p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="w-full border p-2" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>