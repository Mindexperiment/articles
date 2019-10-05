<section class="px-6">
    <h2>{{ config('articles.header_label') }}</h2>

    <div>
        @forelse($articles as $article)
            @include('articles::pages.summary')

        @empty
            <p>{{ __( 'No article' ) }}</p>

        @endforelse
    </div>
</section>
