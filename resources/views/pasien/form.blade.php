@php
    $isEdit = isset($pasien);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block font-semibold mb-1">Nama Pasien</label>
        <input type="text" name="nama_pasien" value="{{ old('nama_pasien', $isEdit ? $pasien->nama_pasien : '') }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">No Telepon</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon', $isEdit ? $pasien->no_telepon : '') }}" class="w-full border px-3 py-2 rounded" required>
        @error('no_telepon')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-4">
    <label class="block font-semibold mb-1">Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat', $isEdit ? $pasien->alamat : '') }}" class="w-full border px-3 py-2 rounded" required>
</div>

<div class="mt-4">
    <label class="block font-semibold mb-1">Rumah Sakit</label>
    <select name="rumah_sakit_id" class="w-full border px-3 py-2 rounded" required>
        <option value="">Pilih Rumah Sakit</option>
        @foreach ($rumahSakits as $rs)
            <option value="{{ $rs->id }}" {{ old('rumah_sakit_id', $isEdit ? $pasien->rumah_sakit_id : '') == $rs->id ? 'selected' : '' }}>
                {{ $rs->nama_rumah_sakit }}
            </option>
        @endforeach
    </select>
</div>
