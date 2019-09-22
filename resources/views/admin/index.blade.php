<section>
    <header>
        <h2>{{ __( 'Articles' ) }}</h2>

        <a href="{{ route('articles.admin.create') }}">{{ __( 'New article' ) }}</a>
    </header>

    <div>
        @forelse($articles as $article)

        @empty
            <p>{{ __( 'No article' ) }}</p>

        @endforelse
    </div>
</section>
