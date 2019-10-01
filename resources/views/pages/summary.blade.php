<div>
    <p>
        <a href="{{ route('articles.article', $article) }}">{{ $article->title }}</a>

        <span>{{ $article->updated_at->diffForHumans() }}</span>
    </p>
</div>
