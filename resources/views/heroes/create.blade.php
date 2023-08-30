
<form action="{{ route('heroes.store') }}" method="post">
@csrf
<!-- Поля формы для создания героя -->
<button type="submit">Create Hero</button>
</form>

