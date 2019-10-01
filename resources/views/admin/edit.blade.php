<section>
    <header>
        <h2>{{ __( 'Edit article' ) }}</h2>

        <p>{{ $article->title }}</p>
    </header>

    @include( 'articles::admin.edit-form' )

    <p><a href="{{ route('articles.admin.index') }}">{{ __( 'Return back' ) }}</a></p>
</section>
