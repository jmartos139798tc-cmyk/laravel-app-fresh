<x-layout title="Add New Book">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-8">
            <a href="{{ route('books.index') }}" class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Books List
            </a>
        </div>

        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="border-b border-white/10 pb-8 mb-8">
                    <h2 class="text-3xl font-black text-white tracking-tight">Create New Book</h2>
                    <p class="mt-2 text-blue-200/60 text-sm">Please fill in the details below to add a new book to the collection.</p>
                </div>

                 <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-semibold text-blue-100 mb-2">Title *</label>
                        <input id="title" type="text" name="title" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="Enter book title" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="author" class="block text-sm font-semibold text-blue-100 mb-2">Author *</label>
                        <input id="author" type="text" name="author" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="Enter author name" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="genre" class="block text-sm font-semibold text-blue-100 mb-2">Genre *</label>
                        <input id="genre" type="text" name="genre" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., Fiction" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="publisher" class="block text-sm font-semibold text-blue-100 mb-2">Publisher *</label>
                        <input id="publisher" type="text" name="publisher" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., Penguin Books" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="isbn" class="block text-sm font-semibold text-blue-100 mb-2">ISBN *</label>
                        <input id="isbn" type="text" name="isbn" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., 978-3-16-148410-0" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="language" class="block text-sm font-semibold text-blue-100 mb-2">Language *</label>
                        <input id="language" type="text" name="language" required
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., English" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="published_year" class="block text-sm font-semibold text-blue-100 mb-2">Published Year</label>
                        <input id="published_year" type="number" name="published_year"
                            class="block w-full rounded-xl bg-white/5 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., 2023" />
                    </div>

                    <div class="sm:col-span-3">
                        <label for="pages" class="block text-sm font-semibold text-blue-100 mb-2">Pages *</label>
                        <input id="pages" type="number" name="pages" required min="1"
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., 300" />
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="Brief description of the book"></textarea>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="price" class="block text-sm font-semibold text-blue-100 mb-2">Price *</label>
                        <input id="price" type="number" name="price" required step="0.01" min="0"
                            class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-hidden transition-all sm:text-sm"
                            placeholder="e.g., 19.99" />
                    </div>

                    <div class="sm:col-span-4">
                        <label for="cover_image" class="block text-sm font-semibold text-blue-100 mb-2">Cover Image</label>
                        <input id="cover_image" type="file" name="cover_image" accept="image/*"
                            class="block w-full text-sm text-blue-200/60 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-400 file:text-amber-950 hover:file:bg-amber-300 cursor-pointer" />
                    </div>

                    <div class="sm:col-span-2">
                        <label class="flex items-center">
                            <input id="is_available" type="checkbox" name="is_available" value="1" checked
                                class="rounded border-white/10 text-amber-400 focus:ring-amber-400 focus:ring-2" />
                            <span class="ml-2 text-sm font-semibold text-blue-100">Available</span>
                        </label>
                    </div>
                </div>

                <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                    <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-sm font-bold text-white hover:text-red-400 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-amber-400 hover:bg-amber-300 text-amber-950 px-8 py-2.5 rounded-xl font-black text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95 cursor-pointer">
                        Save Book
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-blue-200/30 uppercase tracking-tighter">
            Book Management System
        </p>
    </div>
</x-layout>
