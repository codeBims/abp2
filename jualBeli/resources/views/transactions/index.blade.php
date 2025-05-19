<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Pelanggan</th>
                                <th class="px-4 py-2">Mobil</th>
                                <th class="px-4 py-2">Tanggal Transaksi</th>
                                <th class="px-4 py-2">Total</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $index => $transaction)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $transaction->customer->name ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $transaction->car->name ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $transaction->transaction_date }}</td>
                                    <td class="px-4 py-2">Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Yakin ingin hapus transaksi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($transactions->isEmpty())
                        <p class="mt-4 text-gray-500">Tidak ada data transaksi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
