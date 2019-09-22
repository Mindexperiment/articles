<section>
    <h2>{{ __( 'Articles' ) }}</h2>

    <div>
        @forelse($articles as $article)

        @empty
            <p>{{ __( 'No article' ) }}</p>

        @endforelse
    </div>
</section>
