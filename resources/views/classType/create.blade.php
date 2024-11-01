<form action="{{ route('classTypes.store') }}" method="POST">
    @csrf

    <!-- Dropdown for Class Type -->
    <label for="class">Class</label>
    <select name="class" id="class" required>
        <option value="light">Light</option>
        <option value="medium">Medium</option>
        <option value="heavy">Heavy</option>
    </select>

    <!-- Input for Ability -->
    <label for="ability">Ability</label>
    <input type="text" name="ability" id="ability" required>

    <!-- Input for Damage -->
    <label for="damage">Damage</label>
    <input type="number" name="damage" id="damage" required>

    <!-- Input for Cooldown -->
    <label for="cooldown">Cooldown</label>
    <input type="text" name="cooldown" id="cooldown" required>

    <button type="submit">Create Class Type</button>
</form>
