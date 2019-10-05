<section class="px-6">
    <header>
        <h2 class="font-semibold text-3xl">{{ __( 'New article' ) }}</h2>
    </header>

    @include('articles::admin.create-form')

    <p><a href="{{ route('articles.admin.index') }}" class="underline">{{ __( 'Return back' ) }}</a></p>
</section>
