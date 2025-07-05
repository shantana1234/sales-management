<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Management</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>
<body class="bg-white text-gray-800">

  {{-- Navigation --}}
<nav class="bg-black p-4 text-white shadow mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <a href="{{ route('sales.home') }}">ERP | My Sales</a>
        </h1>
        <div class="flex gap-3">
            <a href="{{ route('sales.index') }}"
               class="border border-white px-4 py-2 rounded hover:bg-white hover:text-green-900 transition">
               🚀 Sales
            </a>
            <a href="{{ route('sales.create') }}"
               class="border border-white px-4 py-2 rounded hover:bg-white hover:text-green-900 transition">
                 ➕ Create Sale
            </a>
        </div>
    </div>
</nav>


    {{-- Main Content --}}
    <main class="container mx-auto px-20 bg-white pb-50 ">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
