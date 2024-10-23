<form action="{{ route('classTypes.store') }}" method="POST">
    @csrf
    <label for="class">Class</label>
    <input type="text" name="class" id="class" required>

    <label for="ability">Ability</label>
    <input type="text" name="ability" id="ability" required>

    <label for="damage">Damage</label>
    <input type="number" name="damage" id="damage" required>

    <label for="cooldown">Cooldown</label>
    <input type="text" name="cooldown" id="cooldown" required>

    <button type="submit">Create Class Type</button>
</form>
