<form method="POST" action="{{ route('articles.admin.destroy', $article) }}">
    @csrf
    @method('DELETE')

    <button type="submit">{{ __( 'Delete' ) }}</button>
</form>
