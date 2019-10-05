<section class="px-6">
    <header>
        <h2 class="font-semibold text-3xl">{{ __( 'Articles' ) }}</h2>

        <a href="{{ route('articles.admin.create') }}" class="underline">{{ __( 'New article' ) }}</a>
    </header>

    <div>
        @forelse($articles as $article)
            @include('articles::admin.summary')

        @empty
            <p>{{ __( 'No article' ) }}</p>

        @endforelse
    </div>
</section>
