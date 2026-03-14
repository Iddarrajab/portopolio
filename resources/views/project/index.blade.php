<x-app-layout title='project'>
    <x-slot name='body'>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-gray-800">Data Peserta yang sudah daftar</h1>
            <a href="{{route('project.create')}}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Tambah Project
            </a>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="px-3 mb-5 py-2 bg-red-600 rounded hover:bg-red-700">
                Logout
            </button>
        </form>

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
                    <x-table.th>foto</x-table.th>
                    <x-table.th>porject</x-table.th>
                    <x-table.th>link</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </x-table.thead>

            <x-table.tbody>
                @forelse ($project as $item)
                <tr>
                    <x-table.td>{{ $item->foto}}</x-table.td>
                    <x-table.td>{{ $item->nama_project}}</x-table.td>
                    <x-table.td>{{ $item->link}}</x-table.td>
                    <x-table.td class="flex gap-2">
                        <a href="{{route ('project.edit', $item)}}" class="text-blue-500 hover:underline">
                            Edit
                        </a>
                        <form action="{{ route('project.destroy', $item) }}" method="POST"
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