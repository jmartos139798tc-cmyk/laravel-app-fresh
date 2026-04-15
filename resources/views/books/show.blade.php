<x-layout title="{{ $book->title }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-8 flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Books List
            </a>
            <span class="text-xs font-mono text-blue-200/30 tracking-widest uppercase">Viewing Record #{{ $book->id }}</span>
        </div>

        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>

            <div class="border-b border-white/10 pb-8 mb-8">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-white/10 flex items-center justify-center text-blue-300 font-bold text-xl">
                        {{ substr($book->title, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-white tracking-tight">{{ $book->title }}</h2>
                        <p class="text-blue-200/60 text-sm">by {{ $book->author }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-blue-100 mb-2">Author</label>
                        <div class="bg-white/5 border border-white/10 px-4 py-2.5 text-white rounded-xl">
                            {{ $book->author }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-blue-100 mb-2">Published Year</label>
                        <div class="bg-white/5 border border-white/10 px-4 py-2.5 text-white rounded-xl">
                            {{ $book->published_year ?? 'Not specified' }}
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-blue-100 mb-2">ISBN</label>
                        <div class="bg-white/5 border border-white/10 px-4 py-2.5 text-white rounded-xl">
                            {{ $book->isbn ?? 'Not specified' }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-blue-100 mb-2">Date Added</label>
                        <div class="bg-white/5 border border-white/10 px-4 py-2.5 text-white rounded-xl">
                            {{ $book->created_at->format('M j, Y') }}
                        </div>
                    </div>
                </div>
            </div>

            @if($book->description)
                <div class="mt-8">
                    <label class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                    <div class="bg-white/10 border border-white/10 px-4 py-3 text-white rounded-xl min-h-[100px]">
                        {{ $book->description }}
                    </div>
                </div>
            @endif

            <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-sm font-bold text-white hover:text-red-400 transition-colors">
                    Back to List
                </a>
                <a href="{{ route('books.edit', $book) }}" class="px-6 py-2.5 bg-yellow-600 hover:bg-yellow-500 text-white rounded-xl font-black text-sm transition-all shadow-lg shadow-yellow-600/20 active:scale-95">
                    Edit Book
                </a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2.5 text-sm font-bold text-red-400 hover:bg-red-400/10 rounded-xl transition-all"
                        onclick="return confirm('Delete this book permanently?')">
                        Delete Book
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-8 flex justify-center gap-4 text-[10px] font-mono text-blue-200/20 uppercase tracking-[0.2em]">
            <span>View Mode</span>
            <span>Record #{{ $book->id }}</span>
        </div>
    </div>
</x-layout>
