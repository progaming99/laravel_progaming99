<x-app-layout>
    <div class="container mx-auto p-6 bg-white rounded shadow mt-6">
        <h1 class="text-2xl font-bold mb-6">Edit Pasien</h1>

        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('pasien.form')
            <div class="mt-4">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-black px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
