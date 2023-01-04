<form action="{{ route('word') }}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="submit">
</form>