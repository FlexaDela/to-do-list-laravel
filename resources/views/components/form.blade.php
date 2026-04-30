<form method="POST" action="{{ $action }}">
    @csrf
    {{ $slot }}
</form>
