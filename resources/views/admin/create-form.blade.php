<form method="POST" action="{{ route('articles.admin.store') }}">
    @csrf

    <fieldset>
        <legend>{{ __( 'Article details' ) }}</legend>

        <div>
            <label for="title">{{ __( 'Title' ) }}</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required />

            @if ( $errors->has('title') )
                <p>{{ $errors->first('title') }}</p>
            @endif

            <p><small>{{ __( 'Enter article title' ) }}</small></p>
        </div>

        <div>
            <label for="body">{{ __( 'Body' ) }}</label>
            <textarea name="body" id="body">{{ old('body') }}</textarea>

            @if ( $errors->has('body') )
                <p>{{ $errors->first('body') }}</p>
            @endif

            <p><small><span></span> <a href="" target="_blank">{{ __( 'Style with Markdown' ) }}</a></small></p>
        </div>
    </fieldset>

    <button type="submit">{{ __( 'Create' ) }}</button>
</form>
