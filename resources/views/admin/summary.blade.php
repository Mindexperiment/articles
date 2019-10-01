<article>
    <h2><a href="{{ route('articles.admin.show', $article) }}">{{ $article->title }}</a></h2>

    <p>
        <a href="{{ route('articles.admin.edit', $article) }}">{{ __( 'Edit' ) }}</a>
    </p>
</article>
