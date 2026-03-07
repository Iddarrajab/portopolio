<x-app-layout title='project'>
    <x-slot name='body'>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-gray-800">Data Peserta yang sudah daftar</h1>
            <a href="{{route('admin.create')}}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Tambah Project
            </a>
        </div>

        <form action="#" method="GET" class="mb-4 flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari nama peserta"
                class="border px-2 py-1 rounded w-full md:w-1/3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">
                Cari
            </button>
        </form>

        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>username</x-table.th>
                    <x-table.th>email</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </x-table.thead>

            <x-table.tbody>
                @forelse ($admin as $item)
                <tr>
                    <x-table.td>{{ $item->username}}</x-table.td>
                    <x-table.td>{{ $item->email}}</x-table.td>
                    <x-table.td class="flex gap-2">
                        <a href="#" class="text-blue-500 hover:underline">
                            Edit
                        </a>
                        <form action="#" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus peserta ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </x-table.td>
                </tr>
                @empty
                <tr>
                    <x-table.td colspan="8" class="text-center text-gray-500">
                        Belum ada data peserta
                    </x-table.td>
                </tr>
                @endforelse
            </x-table.tbody>
        </x-table>
    </x-slot>
</x-app-layout>