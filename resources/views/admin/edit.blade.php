<section class="px-6">
    <header>
        <h2 class="font-semibold text-3xl">{{ __( 'Edit article' ) }}</h2>

        <p class="font-medium text-2xl">{{ $article->title }}</p>
    </header>

    @include( 'articles::admin.edit-form' )

    <p><a href="{{ route('articles.admin.index') }}" class="underline">{{ __( 'Return back' ) }}</a></p>
</section>
