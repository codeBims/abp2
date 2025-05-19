
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Daftar Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('customers.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Pelanggan
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <table class="table-auto w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $index => $customer)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $customers->firstItem() + $index }}</td>
                                <td class="px-4 py-2">{{ $customer->name }}</td>
                                <td class="px-4 py-2">{{ $customer->email }}</td>
                                <td class="px-4 py-2">{{ $customer->address }}</td>
                                <td class="px-4 py-2">{{ $customer->phone }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('customers.show', $customer) }}" class="text-green-500 hover:text-green-700">Lihat</a>
                                    <a href="{{ route('customers.edit', $customer) }}" class="text-blue-500 hover:text-blue-700 ml-2">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus pelanggan ini?')" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-500">Belum ada pelanggan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>