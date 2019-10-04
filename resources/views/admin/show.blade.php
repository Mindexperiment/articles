<section>
    <header>
        <h2>{{ $article->title }}</h2>

        <p><small>{{ $article->author->name }} - {{ $article->updated_at->diffForHumans() }} ({{ $article->created_at->toFormattedDateString() }})</small></p>
    </header>

    <div class="constrain markdown">
        {!! $article->parsedBody !!}
    </div>

    <p><a href="{{ route('articles.admin.index') }}">{{ __( 'Return back' ) }}</a></p>
</section>
