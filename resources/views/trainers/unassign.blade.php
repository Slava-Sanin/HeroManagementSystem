
<form action="{{ route('trainer.unassign', $hero->id) }}" method="post">
@csrf
<button type="submit">Unassign Hero</button>
</form>

