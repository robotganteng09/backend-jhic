<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-6 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 border-l-4 border-blue-500' : 'hover:bg-gray-700' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.ppdb') }}" 
                   class="flex items-center px-6 py-3 {{ request()->routeIs('admin.ppdb') ? 'bg-gray-700 border-l-4 border-blue-500' : 'hover:bg-gray-700' }}">
                    <span>PPDB</span>
                </a>
                <a href="{{ route('admin.blog') }}" 
                   class="flex items-center px-6 py-3 {{ request()->routeIs('admin.blog') ? 'bg-gray-700 border-l-4 border-blue-500' : 'hover:bg-gray-700' }}">
                    <span>Blog</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="px-8 py-4">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
