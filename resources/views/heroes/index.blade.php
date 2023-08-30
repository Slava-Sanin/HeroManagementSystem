
@foreach($heroes as $hero)
    <p>Name: {{ $hero->name }}</p>
    <p>Ability: {{ $hero->ability }}</p>
    <p>Trainer: {{ $hero->trainer->full_name }}</p>
    <p>Started Training: {{ $hero->started_training_date }}</p>
    <p>Suit Colors: {{ $hero->suit_colors }}</p>
    <p>Starting Power: {{ $hero->starting_power }}</p>
    <p>Current Power: {{ $hero->current_power }}</p>
    <!-- Другие поля героя -->
@endforeach
