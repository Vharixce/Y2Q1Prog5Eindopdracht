<x-layout title="Class Type Details">
    <h1>Class Type Details</h1>

    <p>Class: {{ $classType->class }}</p>
    <p>Ability: {{ $classType->ability }}</p>
    <p>Damage: {{ $classType->damage }}</p>
    <p>Cooldown: {{ $classType->cooldown }}</p>
    <p>Created At: {{ $classType->created_at }}</p>

    <a href="{{ route('class_types.index') }}">Back to List</a>
</x-layout>
