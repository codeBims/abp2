<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow-sm">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Nama:</label>
                <p class="text-gray-900">{{ $customer->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Email:</label>
                <p class="text-gray-900">{{ $customer->email }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Alamat:</label>
                <p class="text-gray-900">{{ $customer->address }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Telepon:</label>
                <p class="text-gray-900">{{ $customer->phone }}</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('customers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">
                    Kembali
                </a>
                <a href="{{ route('customers.edit', $customer) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>