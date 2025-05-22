@extends('layouts.app')

@section('content')
<h2 class="text-lg font-bold mb-4">Edit Pasien</h2>
<form action="{{ route('pasien.update', $pasien->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    @include('pasien.form', ['pasien' => $pasien])
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
