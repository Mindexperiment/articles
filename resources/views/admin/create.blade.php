<section>
    <header>
        <h2>{{ __( 'New article' ) }}</h2>
    </header>

    @include('articles::admin.create-form')

    <p><a href="{{ back() }}">{{ __( 'Return back' ) }}</a></p>
</section>
