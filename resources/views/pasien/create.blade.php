<x-app-layout>
    <div class="container mx-auto p-6 bg-black rounded shadow mt-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Pasien</h1>

        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            @include('pasien.form')

            <div class="mt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
