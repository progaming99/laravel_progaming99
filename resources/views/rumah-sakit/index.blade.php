<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Daftar Rumah Sakit</h1>

    <a href="{{ route('pasien.index') }}"
               class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                Lihat Pasien
            </a>
    <a href="{{ route('rumah-sakit.create') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded mb-4">
        + Tambah Rumah Sakit
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm text-left text-gray-800">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nama RS</th>
                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Telepon</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rumahSakits as $rs)
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $rs->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $rs->nama_rumah_sakit }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $rs->alamat }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $rs->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $rs->telepon }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="{{ route('rumah-sakit.edit', $rs->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded text-xs">
                            Edit
                        </a>
                        <form action="{{ route('rumah-sakit.destroy', $rs->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Yakin hapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $rumahSakits->links() }}
    </div>
</x-app-layout>
