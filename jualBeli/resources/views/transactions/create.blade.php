@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-6">
    <h1 class="text-xl font-semibold mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Pelanggan</label>
            <select name="customer_id" class="form-input w-full" required>
                <option value="">-- pilih --</option>
                @foreach ($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Produk / Mobil</label>
            <select name="product_id" class="form-input w-full" required>
                <option value="">-- pilih --</option>
                @foreach ($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} (Rp{{ number_format($p->price,0,',','.') }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tanggal Transaksi</label>
            <input type="date" name="trx_date" class="form-input w-full" value="{{ date('Y-m-d') }}" required>
        </div>

        <div>
            <label>Total</label>
            <input type="number" name="total" class="form-input w-full" required>
        </div>

        <button class="px-4 py-2 bg-indigo-600 text-white rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
