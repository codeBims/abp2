<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow-sm">
            <!-- Tampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Alamat</label>
                    <textarea name="address" class="w-full border rounded px-3 py-2" required>{{ old('address', $customer->address) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>