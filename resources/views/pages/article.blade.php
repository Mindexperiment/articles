<article>
    <header>
        <h2>{{ $article->title }}</h2>

        <p><small>{{ $article->author->name }} - {{ $article->updated_at->diffForHumans() }} ({{ $article->created_at->toFormattedDateString() }})</small></p>
    </header>

    <div>
        {{ $article->parsedBody }}
    </div>
</article>
