<x-layout title="Books">
    <div class="max-w-6xl mx-auto mt-12 px-4 pb-20">

        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Book Management</h1>
                <p class="text-blue-200/60 text-sm mt-1">Reviewing books in the collection.</p>
            </div>

            <a href="{{ route('books.create') }}"
               class="flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create New Book
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50/10 border border-green-500/20 text-green-300 p-4 mb-6 rounded-xl">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 text-blue-200/70 text-xs uppercase tracking-widest font-bold">
                            <th class="px-6 py-4">Book</th>
                            <th class="px-6 py-4">Genre</th>
                            <th class="px-6 py-4">ISBN</th>
                            <th class="px-6 py-4">Cover</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">
                        @foreach($books as $book)
                            <tr class="group hover:bg-white/[0.03] transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-white/10 flex items-center justify-center text-blue-300 font-bold">
                                            {{ substr($book->title, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="text-white font-semibold">{{ $book->title }}</div>
                                            <div class="text-blue-100/40 text-xs font-mono">by {{ $book->author }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-5 text-blue-100/70 text-sm">
                                    {{ $book->genre }}
                                </td>

                                <td class="px-6 py-5 text-blue-100/70 text-sm font-mono">
                                    {{ $book->isbn ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-5">
                                    @if(!empty($book->cover_image) && is_string($book->cover_image))
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="w-12 h-16 object-cover rounded border border-white/10">
                                    @else
                                        <span class="text-blue-100/40 text-xs">No image</span>
                                    @endif
                                </td>

                                <td class="px-6 py-5">
                                    @if($book->is_available)
                                        <span class="bg-green-400/10 text-green-300 px-2.5 py-0.5 rounded-full text-xs border border-green-400/20">
                                            Available
                                        </span>
                                    @else
                                        <span class="bg-red-400/10 text-red-300 px-2.5 py-0.5 rounded-full text-xs border border-red-400/20">
                                            Not Available
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('books.show', $book) }}"
                                           class="p-2 text-blue-300 hover:bg-blue-400/20 rounded-lg transition-colors" title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('books.edit', $book) }}"
                                           class="p-2 text-yellow-300 hover:bg-yellow-400/20 rounded-lg transition-colors" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this book permanently?')"
                                                    class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($books->isEmpty())
                <div class="py-20 text-center">
                    <p class="text-blue-200/40 italic font-mono">No books found in collection.</p>
                </div>
            @endif
        </div>
    </div>
</x-layout>
