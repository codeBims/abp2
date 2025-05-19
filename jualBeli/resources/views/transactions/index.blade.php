<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('transactions.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Transaksi
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <table class="table-auto w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Pelanggan</th>
                            <th class="px-4 py-2">Mobil</th>
                            <th class="px-4 py-2">Tanggal Transaksi</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $transaction)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $transactions->firstItem() + $index }}</td>
                                <td class="px-4 py-2">{{ $transaction->customer->name }}</td>
                                <td class="px-4 py-2">{{ $transaction->product->name }}</td>
                                <td class="px-4 py-2">{{ $transaction->formatted_date }}</td>
                                <td class="px-4 py-2">{{ $transaction->formatted_total }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('transactions.show', $transaction) }}" class="text-green-500 hover:text-green-700">Lihat</a>
                                    <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-500 hover:text-blue-700 ml-2">Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus transaksi ini?')" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-500">Tidak ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>