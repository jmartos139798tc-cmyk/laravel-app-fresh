<x-layout title="Edit Book">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-8 flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Books List
            </a>
            <span class="text-xs font-mono text-blue-200/30 tracking-widest uppercase">Editing Record #{{ $book->id }}</span>
        </div>

        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>

            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PATCH')

                <div class="border-b border-white/10 pb-8 mb-8">
                    <h2 class="text-3xl font-black text-white tracking-tight">Update Book Information</h2>
                    <p class="mt-2 text-blue-200/60 text-sm">Modifying details for <span class="text-blue-300 font-semibold">{{ $book->title }}</span> by {{ $book->author }}.</p>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-semibold text-blue-100 mb-2">Title *</label>
                        <input id="title" type="text" name="title" value="{{ $book->title }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="author" class="block text-sm font-semibold text-blue-100 mb-2">Author *</label>
                        <input id="author" type="text" name="author" value="{{ $book->author }}" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm" />
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-hidden transition-all sm:text-sm">{{ $book->description }}</textarea>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="published_year" class="block text-sm font-semibold text-blue-100 mb-2">Published Year</label>
                        <input id="published_year" type="number" name="published_year" value="{{ $book->published_year }}"
                            class="block w-full rounded-xl bg-white/5 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-hidden transition-all sm:text-sm" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="isbn" class="block text-sm font-semibold text-blue-100 mb-2">ISBN</label>
                        <input id="isbn" type="text" name="isbn" value="{{ $book->isbn }}"
                            class="block w-full rounded-xl bg-white/5 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-hidden transition-all sm:text-sm" />
                    </div>
                </div>

                <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                        @csrf
                    </form>
                    <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-sm font-bold text-white hover:text-red-400 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-400 text-white px-8 py-2.5 rounded-xl font-black text-sm transition-all shadow-lg shadow-blue-500/20 active:scale-95 cursor-pointer">
                        Update Book Record
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 flex justify-center gap-4 text-[10px] font-mono text-blue-200/20 uppercase tracking-[0.2em]">
            <span>Method: POST</span>
            <span>Spoofing: PATCH</span>
            <span>Security: CSRF Active</span>
        </div>
    </div>
</x-layout>
