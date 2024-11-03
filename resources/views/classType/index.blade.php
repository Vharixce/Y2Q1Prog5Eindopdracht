<x-layout title="Class Types">
    <h1>Class Types</h1>
    <p>Welcome to the class types page!</p>

    <!-- Conditionally render the button -->
    @if (Auth::check())
        <a href="{{ route('classTypes.create') }}" class="button create-button">Create New Class Type</a>
    @else
        <button class="button create-button" disabled title="You must be logged in to create a new class type">Create New Class Type</button>
    @endif

    <!-- Filter Form with Search Input -->
    <div class="filter-buttons">
        <form action="{{ route('classTypes.filter') }}" method="GET">
            <input type="text" name="search" placeholder="Search..." value="{{ $searchTerm ?? '' }}" class="search-input">
            <select name="class_type" id="class_type" onchange="this.form.submit()">
                <option value="">Select...</option>
                <option value="light" {{ request('weight') == 'light' ? 'selected' : '' }}>light</option>
                <option value="medium" {{ request('weight') == 'medium' ? 'selected' : '' }}>medium</option>
                <option value="heavy" {{ request('weight') == 'heavy' ? 'selected' : '' }}>heavy</option>
            </select>

            <!-- Other form content, buttons, or fields as needed -->
            <button type="submit">Search</button>
            <a href="{{ route('classTypes.index') }}" class="filter-button clear-button">Reset filters</a>
        </form>
    </div>


    <!-- Display Filtered Results -->
    <ul>
        @foreach($classTypes as $classType)
            <li>
                Class: {{ $classType->class }} <br>
                Ability: {{ $classType->ability }} <br>

                <!-- Conditionally show the buttons based on ownership -->
                @if($classType->user_id == $userId)
                    <a href="{{ route('class_types.edit', $classType->id) }}" class="custom-button">Edit</a>
                    <form action="{{ route('class_types.destroy', $classType->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="custom-button" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                @else
                    <span class="custom-button disabled">Edit</span>
                    <span class="custom-button disabled">Delete</span>
                @endif
            </li>
        @endforeach

    </ul>

    <!-- Optional message if no items match the filter -->
    @if($classTypes->isEmpty())
        <p>No items found for this class type.</p>
    @endif
</x-layout>
