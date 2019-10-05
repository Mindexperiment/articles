<article class="py-4 mb-6">
    <h2><a href="{{ route('articles.admin.show', $article) }}" class="underline">{{ $article->title }}</a></h2>

    <p>
        <a href="{{ route('articles.admin.edit', $article) }}" class="underline">{{ __( 'Edit' ) }}</a>
    </p>
</article>
