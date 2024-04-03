
@if($editLink)
<a href="{{ $editLink }}" class="btn btn-sm btn-primary">
    <span class="oi oi-pencil"></span>
</a>
@endif

@if($deleteLink)
<form class="d-inline" action="{{ $deleteLink }}" method="post" onsubmit="return confirm('Apakah Serius Ingin Menghapus Data Ini?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-danger">
        <span class="oi oi-trash"></span>
    </button>
</form>
@endif