<div class="py-4 mb-6">
    <p>
        <a href="{{ route('articles.article', $article) }}" class="underline">{{ $article->title }}</a>

        <small>{{ $article->updated_at->diffForHumans() }}</small>
    </p>
</div>
