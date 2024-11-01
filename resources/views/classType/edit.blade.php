<x-layout title="Edit Class Type">
    <h1>Edit Class Type</h1>

    <form action="{{ route('class_types.update', $classType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="class">Class</label>
        <select name="class" id="class" required>
            <option value="light">Light</option>
            <option value="medium">Medium</option>
            <option value="heavy">Heavy</option>
        </select>

        <div>
            <label for="ability">Ability:</label>
            <input type="text" id="ability" name="ability" value="{{ $classType->ability }}" required>
        </div>

        <div>
            <label for="damage">Damage:</label>
            <input type="number" id="damage" name="damage" value="{{ $classType->damage }}" required>
        </div>

        <div>
            <label for="cooldown">Cooldown:</label>
            <input type="text" id="cooldown" name="cooldown" value="{{ $classType->cooldown }}" required>
        </div>

        <button type="submit">Update Class Type</button>
    </form>

    <a href="{{ route('class_types.index') }}">Back to List</a>
</x-layout>
