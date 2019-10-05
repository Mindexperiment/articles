<section class="px-6">
    <header>
        <h2 class="font-semibold text-3xl">{{ $article->title }}</h2>

        <p class="font-mono"><small>{{ $article->author->name }} - {{ $article->updated_at->diffForHumans() }} ({{ $article->created_at->toFormattedDateString() }})</small></p>
    </header>

    <div class="constrain markdown">
        {!! $article->parsedBody !!}
    </div>

    <p><a href="{{ route('articles.admin.index') }}" class="underline">{{ __( 'Return back' ) }}</a></p>
</section>
