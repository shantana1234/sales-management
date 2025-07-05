@extends('layouts.app')

@section('content')
<div class="max-w-9xl mx-auto ">

   <div class="flex items-center justify-between mt-10 mb-8 px-4">
    <h2 class="text-2xl font-semibold">🗑️ Deleted Sales (Trash)</h2>

    <a href="{{ route('sales.index') }}"
       class="inline-flex items-center bg-green-600 text-white px-5 py-2 rounded hover:bg-gray-700 transition">
        ← Back to Sales List
    </a>
</div>
<hr class="border-t border-gray-300 my-8">


    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($sales->count())
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm divide-y divide-gray-200 p-2">
                <thead class="bg-gray-100 text-left font-semibold">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Deleted At</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($sales as $sale)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration + ($sales->currentPage() - 1) * $sales->perPage() }}</td>
                            <td class="px-4 py-2">{{ $sale->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $sale->sale_date }}</td>
                            <td class="px-4 py-2 font-semibold">{{ $sale->formatted_total }}</td>
                            <td class="px-4 py-2 text-gray-600">{{ $sale->deleted_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 space-x-2">
                               
                                <form action="{{ route('sales.restore', $sale->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                      ⏪  Restore
                                    </button>
                                </form>

                            <form action="{{ route('sales.forceDelete', $sale->id) }}" method="POST"
      class="inline-block delete-form">
    @csrf
    @method('DELETE')
    <button type="button"
            class="open-delete-modal bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 flex items-center gap-1">
        ❌ Delete Permanently
    </button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $sales->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-gray-600 text-center mt-6">No deleted sales found.</p>
    @endif

  <!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 text-center">
        <h2 class="text-lg font-bold text-gray-800 mb-3">Confirm Deletion</h2>
        <p class="text-sm text-gray-600 mb-6">Are you sure you want to permanently delete this item? This action cannot be undone.</p>
        <div class="flex justify-center gap-4">
            <button id="cancel-delete"
                class="px-4 py-2 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                Cancel
            </button>
            <button id="confirm-delete"
                class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

</div>



@endsection

@push('scripts')
<script>
    let targetForm = null;

    document.querySelectorAll('.open-delete-modal').forEach(button => {
        button.addEventListener('click', function () {
            targetForm = button.closest('form');
            document.getElementById('delete-modal').classList.remove('hidden');
        });
    });

    document.getElementById('cancel-delete').addEventListener('click', function () {
        document.getElementById('delete-modal').classList.add('hidden');
        targetForm = null;
    });

    document.getElementById('confirm-delete').addEventListener('click', function () {
        if (targetForm) {
            targetForm.submit();
        }
    });
</script>
@endpush

