@extends('export.layoutPdf')

@section('laporan')

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
    {{ $no = 1 }}
    @foreach ($data as $d )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$d->nama_barang}}</td>
            <td>{{ $d->kategori }}</td>
            <td>{{ $d->harga }}</td>
            <td>{{ $d->stok }}</td>
            <td>{{ $d->created_at->isoFormat('D-MMMM-Y')}}</td>
        </tr>
    @endforeach
    </tbody>

@endsection
