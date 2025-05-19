<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                @if($transaction)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Pelanggan</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Nama: {{ $transaction->customer->name ?? 'N/A' }}<br>
                                Email: {{ $transaction->customer->email ?? 'N/A' }}<br>
                                Telepon: {{ $transaction->customer->phone ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Transaksi</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Tanggal: {{ $transaction->transaction_date->format('d/m/Y') }}<br>
                                Total: Rp{{ number_format($transaction->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Detail Produk</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Nama Mobil: {{ $transaction->product->name ?? 'N/A' }}<br>
                            Harga: Rp{{ number_format($transaction->product->price ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                @else
                    <p class="text-red-500">Data transaksi tidak ditemukan</p>
                @endif

                <div class="flex space-x-4">
                    <a href="{{ route('transactions.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>