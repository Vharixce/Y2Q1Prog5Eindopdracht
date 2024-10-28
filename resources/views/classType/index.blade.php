<x-layout title="Class Types">
    <h1>Class Types</h1>
    <p>Welcome to the class types page!</p>

    <a href="{{ route('classTypes.create') }}" class="button create-button">Create New Class Type</a>

    <ul>
        @foreach($classTypes as $classType)
            <li>
                Class: {{ $classType->class }} <br>
                Ability: {{ $classType->ability }} <br>

                <a href="{{ route('class_types.show', $classType->id) }}" class="custom-button">More Details</a>
                <a href="{{ route('class_types.edit', $classType->id) }}" class="custom-button">Edit</a>
                <form action="{{ route('class_types.destroy', $classType->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="custom-button" onclick="return confirm('Are you sure you want to delete this item?')">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
