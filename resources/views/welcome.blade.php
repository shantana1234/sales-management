@extends('layouts.app')

@section('content')
<div class="bg-white flex flex-col items-center justify-center px-4 text-center">

    {{-- Hero Section --}}
    <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-800 leading-tight mb-10 mt-40">
        Manage Your Sales with Confidence
    </h1>

    <p class="text-gray-600 text-lg sm:text-xl max-w-2xl mb-10 leading-relaxed">
        Discover every transaction in your history,<br class="hidden sm:inline">
        create new sales effortlessly, and take full control<br class="hidden sm:inline">
        of your internal operations — all from one place.
    </p>

    {{-- Action Buttons --}}
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('sales.index') }}"
           class="px-6 py-3 border border-indigo-600 text-indigo-600 font-semibold rounded hover:bg-indigo-50 transition">
            🚀 Discover Sales
        </a>

        <a href="{{ route('sales.create') }}"
           class="px-6 py-3 border border-green-600 text-green-600 font-semibold rounded hover:bg-green-50 transition">
            ➕ Create Sale
        </a>
    </div>

</div>
@endsection
