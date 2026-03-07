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
                    <label class="block text-sm font-medium text-gray-700">usernama</label>
                    <input type="text" name="username"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">email</label>
                    <input type="email" name="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jumlah Unit --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">password</label>
                    <input type="password" name="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('password')
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