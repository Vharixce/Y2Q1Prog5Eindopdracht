<x-layout title="Admin Dashboard">
    <h1>Admin Dashboard</h1>
    <p>Manage all class types</p>

    <ul>
        @foreach($classTypes as $classType)
            <li>
                Class: {{ $classType->class }} <br>
                Ability: {{ $classType->ability }} <br>
                <a href="{{ route('class_types.edit', $classType->id) }}" class="button">Edit</a>
                <form action="{{ route('class_types.destroy', $classType->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
