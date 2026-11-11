@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-emerald-700">Community bulletin</p>
        <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">Latest posts</h1>
        <p class="mt-3 text-slate-600">Find announcements, health updates, and activities in our barangay.</p>
    </div>

    <form method="GET" action="{{ route('posts.index') }}" class="mb-8 flex flex-col gap-4 rounded-xl border border-stone-200 bg-white p-5 sm:flex-row sm:items-end">
        <div class="min-w-0 flex-1">
            <label for="q" class="mb-2 block text-sm font-medium">Search posts</label>
            <input
                id="q"
                type="search"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search by title"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 focus:border-emerald-700 focus:outline-2 focus:outline-emerald-700"
            >
        </div>

        <div class="sm:w-56">
            <label for="category" class="mb-2 block text-sm font-medium">Category</label>
            <select id="category" name="category" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 focus:border-emerald-700 focus:outline-2 focus:outline-emerald-700">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(request('category') === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="rounded-lg bg-emerald-800 px-5 py-2 font-semibold text-white hover:bg-emerald-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-800">
            Filter
        </button>
        <a href="{{ route('posts.index') }}" class="rounded-lg px-3 py-2 text-center font-medium text-slate-600 underline underline-offset-4 hover:text-emerald-800">Reset</a>
    </form>

    <div class="grid gap-5 md:grid-cols-2">
        @forelse ($posts as $post)
            <article class="flex flex-col rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
                <div class="mb-4 flex flex-wrap items-center gap-2">
                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
                        {{ $post->category }}
                    </span>
                    @if ($post->is_pinned)
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-900">Pinned</span>
                    @endif
                </div>

                <h2 class="text-xl font-bold leading-snug break-words">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-emerald-800 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mt-3 flex-1 leading-relaxed text-slate-600 break-words">
                    {{ \Illuminate\Support\Str::limit($post->body, 150) }}
                </p>
                <div class="mt-5 flex flex-wrap gap-x-4 gap-y-1 border-t border-stone-100 pt-4 text-sm text-slate-500">
                    <span>{{ $post->published_at?->format('M j, Y') ?? 'Date unavailable' }}</span>
                    <span>{{ $post->views }} {{ $post->views === 1 ? 'view' : 'views' }}</span>
                </div>
            </article>
        @empty
            <div class="rounded-xl border border-dashed border-stone-300 bg-white p-10 text-center md:col-span-2">
                <p class="font-semibold">No posts match your search.</p>
                <a href="{{ route('posts.index') }}" class="mt-3 inline-block text-emerald-800 underline underline-offset-4">View all posts</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8 space-y-4">
        {{ $posts->links() }}
        <p class="text-sm text-slate-600">
            Showing {{ $posts->firstItem() ?? 0 }}–{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
        </p>
    </div>
@endsection
