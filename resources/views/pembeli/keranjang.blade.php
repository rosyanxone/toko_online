@extends('layouts.app')

@section('title')
  Penjual Homepage
@endsection

@section('content')

<div class="container mt-5 pt-5">
    @if(session('success'))
        <div class="">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Pembeli Id</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            @php $no = 1 @endphp
            @foreach($keranjangs as $keranjang)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $keranjang->produk->nama }}</td>
                    <td>{{ $keranjang->harga }}</td>
                    <td>{{ $keranjang->pembeli_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('checkout', Auth::user()->id) }}" class="btn btn-warning">Checkout</a>
</div>

@endsection