
@foreach($heroes as $hero)
    <p>Name: {{ $hero->name }}</p>
    <p>Ability: {{ $hero->ability }}</p>
    <p>Trainer: {{ $hero->trainer->full_name }}</p>
    <!-- Другие поля героя -->
@endforeach
