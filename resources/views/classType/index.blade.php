<x-layout title="Class Types">
    <h1>Class Types</h1>
    <p>Welcome to the class types page!</p>

    <a href="{{ route('classTypes.create') }}">Create New Class Type</a>

    <ul>
        @foreach($classTypes as $classType)
            <li>
                Class: {{ $classType->class }} <br>
                Ability: {{ $classType->ability }} <br>
                Damage: {{ $classType->damage }} <br>
                Cooldown: {{ $classType->cooldown }} <br>
                Added at: {{ $classType->created_at }}
            </li>
        @endforeach
    </ul>
</x-layout>
