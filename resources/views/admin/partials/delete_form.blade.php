<form class="d-inline" action="{{ $route }}" method="POST" onsubmit="return confirm('{{ $message }}')">
    @csrf
    @method('DELETE')

    <button title="Elimina" class="btn btn-danger" type="submit">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
