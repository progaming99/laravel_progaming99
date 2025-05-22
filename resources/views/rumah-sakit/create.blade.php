<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-md mt-6">
        <h1 class="text-2xl font-semibold mb-6">Tambah Rumah Sakit</h1>

        <form action="{{ route('rumah-sakit.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Nama RS</label>
                <input type="text" name="nama_rumah_sakit" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Telepon</label>
                <input type="text" name="telepon" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
