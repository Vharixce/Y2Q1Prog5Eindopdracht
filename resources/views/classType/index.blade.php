<x-layout title="Class Types">
    <h1>Class Types</h1>
    <p>Welcome to the class types page!</p>

    <a href="{{ route('classTypes.create') }}" class="button create-button">Create New Class Type</a>

    <div class="filter-buttons">
        <form action="{{ route('classTypes.filter') }}" method="GET">
            <button type="submit" name="class_type" value="Light" class="filter-button">Light</button>
            <button type="submit" name="class_type" value="Medium" class="filter-button">Medium</button>
            <button type="submit" name="class_type" value="Heavy" class="filter-button">Heavy</button>
            <button type="submit" name="class_type" value="" class="filter-button">All</button>
        </form>
    </div>

    <!-- Display Filtered Results -->
    <ul>
        @foreach($classTypes as $classType)
            <li>
                Class: {{ $classType->class }} <br>
                Ability: {{ $classType->ability }} <br>
                <a href="{{ route('class_types.show', $classType->id) }}">More Details</a>
                <a href="{{ route('class_types.edit', $classType->id) }}">Edit</a>
                <form action="{{ route('class_types.destroy', $classType->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Optional message if no items match the filter -->
    @if($classTypes->isEmpty())
        <p>No items found for this class type.</p>
    @endif

{{--    everything else--}}

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
