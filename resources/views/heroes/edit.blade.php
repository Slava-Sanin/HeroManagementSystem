
<form action="{{ route('heroes.update', $hero->id) }}" method="post">
@csrf
@method('PUT')
<!-- Поля формы для редактирования героя -->
<button type="submit">Update Hero</button>
</form>

