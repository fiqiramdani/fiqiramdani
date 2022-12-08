@extends('layout')

@section('content')
<br>
@if(Session('successUpdate'))
    <div class="alert alert-success">
        {{ Session('successUpdate') }}
    </div>
@endif
@if(Session('successDelete'))
    <div class="alert alert-danger">
        {{ Session('successDelete') }}
    </div>
@endif
    <table class="table table-success table-striped table-bordered"  style="text-align: center;">
        <tr>
            <td>No</td>
            <td>Kegiatan</td>
            <td>Deskripsi</td>
            <td>Batas Waktu</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($todos as $todo)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $todo['tittle'] }}</td>
            <td>{{ $todo['description'] }}</td>
            <!-- carbon : package date pada laravel, nntinya si date yang 2022-11-22 formatnya jadi 22 november 2022 -->
            <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
            <!-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-procces, status tuh boolean kan? cuman antara 1 atau 0 -->
            <td>{{ $todo['status'] ? 'Complated' : 'On-process'}}</td>
            <td class="d-flex">
                <form action="/edit/{{$todo['id']}}" method="GET">
                @csrf
                <button class="btn btn-primary me-1 " type="submit">Edit</button>
                </form>
                {{-- karena path {id} merupakan path dinamis, jadi kita harus isi
                path dinamis tersebut. karena kita mengisinya dengan data dinamis/
                data dari database jd buat isi nya pake kurung kurawal dua kali --}}
                {{-- <a href="/edit/{{$todo['id']}}">Edit</a> |  --}}
                {{-- fitur delete harus menggunakan form lagi. tombol hapusnya disimpan di tag button --}}
                <form action="/destroy/{{$todo['id']}}" method="POST">
                @csrf
                {{-- menyimpan method="POST", karena di route nya menggunakan method delete --}}
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
                &nbsp
                @if ($todo['status'] == 0)
                <form action="/complated/{{$todo['id']}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-dark   "type="submit">Complated</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection