@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow mt-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">Tambah Pasien</h1>

    <form action="{{ route('pasien.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('pasien.form', ['rumahSakits' => $rumahSakits])
        <div class="flex justify-end mt-4">
            <a href="{{ route('pasien.index') }}" class="bg-gray-500 text-black px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
