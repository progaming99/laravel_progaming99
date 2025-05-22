<x-app-layout>
    <div class="bg-white p-6 rounded shadow-md max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-6">Edit Rumah Sakit</h1>

        <form action="{{ route('rumah-sakit.update', $rumahSakit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Nama RS</label>
                <input type="text" name="nama_rumah_sakit" value="{{ $rumahSakit->nama_rumah_sakit }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ $rumahSakit->alamat }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ $rumahSakit->email }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Telepon</label>
                <input type="text" name="telepon" value="{{ $rumahSakit->telepon }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit"
                class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
