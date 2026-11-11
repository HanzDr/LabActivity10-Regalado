@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('posts.index') }}" class="mb-6 inline-block font-medium text-emerald-800 underline underline-offset-4 hover:text-emerald-950">
            ← Back to all posts
        </a>

        <article class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm sm:p-10">
            <div class="mb-5 flex flex-wrap items-center gap-2">
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-800">
                    {{ $post->category }}
                </span>
                @if ($post->is_pinned)
                    <span class="rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-900">Pinned</span>
                @endif
            </div>

            <h1 class="text-3xl font-bold leading-tight tracking-tight break-words sm:text-4xl">{{ $post->title }}</h1>

            <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 border-b border-stone-200 pb-6 text-sm text-slate-500">
                <span>Published {{ $post->published_at?->format('F j, Y') ?? 'Date unavailable' }}</span>
                <span>Author ID: {{ $post->author_id }}</span>
                <span>{{ $post->views }} {{ $post->views === 1 ? 'view' : 'views' }}</span>
            </div>

            <div class="mt-6 leading-8 whitespace-pre-wrap break-words text-slate-700">{{ $post->body }}</div>
        </article>
    </div>
@endsection
