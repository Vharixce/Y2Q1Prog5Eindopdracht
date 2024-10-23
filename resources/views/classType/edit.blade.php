<x-layout title="Edit Class Type">
    <h1>Edit Class Type</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('classTypes.update', $classType->id) }}" method="POST">
        @csrf
        @method('PUT')
        Class: <input type="text" name="class" value="{{ $classType->class }}"><br>
        Ability: <input type="text" name="ability" value="{{ $classType->ability }}"><br>
        Damage: <input type="number" name="damage" value="{{ $classType->damage }}"><br>
        Cooldown: <input type="text" name="cooldown" value="{{ $classType->cooldown }}"><br>
        <button type="submit">Update</button>
    </form>
</x-layout>




<?php
