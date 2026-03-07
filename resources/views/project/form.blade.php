<x-app-layout title="{{ $page_meta['title'] ?? 'Form Skema' }}">
    <x-slot name="heading">{{ $page_meta['title'] ?? 'Form project' }}</x-slot>

    <x-slot name="body">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ $page_meta['url'] }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @if (($page_meta['method'] ?? 'POST') !== 'POST')
                @method($page_meta['method'])
                @endif

                {{-- Nama Skema --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">foto</label>
                    <input type="file" name="foto"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('foto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">project</label>
                    <input type="text" name="nama_project"
                        value="{{ old('nama_project', $project->nama_project) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('project')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jumlah Unit --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">projeck</label>
                    <input type="text" name="link"
                        value="{{ old('link', $project->link) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('project.index') }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        {{ $page_meta['button'] ?? 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>