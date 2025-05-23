<x-app-layout>
    <div class="container mx-auto p-6 bg-white rounded shadow mt-6">
        <h1 class="text-3xl font-bold mb-6">Data Pasien</h1>

        <div class="mb-4">
            <label for="filter-rumah-sakit" class="block mb-2 font-semibold text-gray-700">Filter Rumah Sakit</label>
            <select id="filter-rumah-sakit" class="border rounded px-3 py-2 w-full max-w-xs">
                <option value="">Semua Rumah Sakit</option>
                @foreach($rumahSakits as $rs)
                    <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('pasien.create') }}" class="mb-4 inline-block bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
            + Tambah Pasien
        </a>

        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <table class="min-w-full border border-gray-300" id="table-pasiens">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">ID</th>
                    <th class="border px-4 py-2 text-left">Nama Pasien</th>
                    <th class="border px-4 py-2 text-left">Alamat</th>
                    <th class="border px-4 py-2 text-left">No Telepon</th>
                    <th class="border px-4 py-2 text-left">Rumah Sakit</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data pasien akan dimuat AJAX -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterSelect = document.getElementById('filter-rumah-sakit');
            const tbody = document.querySelector('#table-pasiens tbody');

            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

            function loadPasiens(rumahSakitId = '') {
                axios.get('{{ route("pasien.index") }}', {
                    params: { rumah_sakit_id: rumahSakitId }
                })
                .then(response => {
                    const pasiens = response.data;
                    let rows = '';

                    pasiens.forEach(pasien => {
                        rows += `
                            <tr>
                                <td class="border px-4 py-2">${pasien.id}</td>
                                <td class="border px-4 py-2">${pasien.nama_pasien}</td>
                                <td class="border px-4 py-2">${pasien.alamat}</td>
                                <td class="border px-4 py-2">${pasien.no_telepon}</td>
                                <td class="border px-4 py-2">${pasien.rumah_sakit ? pasien.rumah_sakit.nama_rumah_sakit : ''}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="/pasiens/${pasien.id}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">Edit</a>
                                    <button onclick="deletePasien(${pasien.id})" class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded">Hapus</button>
                                </td>
                            </tr>
                        `;
                    });

                    tbody.innerHTML = rows;
                })
                .catch(() => {
                    alert('Gagal memuat data pasien.');
                });
            }

            filterSelect.addEventListener('change', () => {
                loadPasiens(filterSelect.value);
            });

            window.deletePasien = function(id) {
                if (confirm('Yakin ingin menghapus pasien ini?')) {
                    axios.delete(`/pasien/${id}`)
                        .then(() => {
                            alert('Data pasien berhasil dihapus.');
                            loadPasiens(filterSelect.value);
                        })
                        .catch(() => {
                            alert('Gagal menghapus data pasien.');
                        });
                }
            };

            loadPasiens();
        });
    </script>
</x-app-layout>
