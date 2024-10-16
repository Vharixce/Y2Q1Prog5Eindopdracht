<x-layout title="Specialisations">
    <h1>SPECIALISATIONS !!! Page</h1>
    <p>Welcome to the YARRR page!</p>
{{--    @foreach($names as $name)--}}
    <ul>
        @foreach($specialisations as $specialisation)
            <li>
                Class: {{ $specialisation->class }} <br>
                Specialisatie: {{ $specialisation->ability }} <br>
                Tijd toegevoegd: {{ $specialisation->created_at }}
            </li>
        @endforeach
    </ul>

{{--    @endforeach--}}
</x-layout>


{{--<a href="{{route('showproduct', ['id' => '200'])}}">ga naar product pagina</a>--}}

