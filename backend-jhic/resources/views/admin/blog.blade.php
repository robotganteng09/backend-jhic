<x-admin-layout>
    <x-slot name="title">Blog - Admin</x-slot>
    <x-slot name="header">Data Blog</x-slot>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penulis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($blogs as $blog)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $blog->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $blog->judul }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $blog->penulis }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $blog->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500" colspan="4">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
