<!-- resources/views/classType/confirm.blade.php -->
<x-layout title="Confirmation">
    <h1>Confirmation Required</h1>
    <p>To create a new class type, please type the following phrase exactly:</p>
    <form action="{{ route('classTypes.confirmPost') }}" method="POST">
        @csrf
        <label for="confirmationText">"I am human and I love the game The Finals"</label>
        <input type="text" name="confirmationText" required>
        <button type="submit">Confirm</button>
    </form>
</x-layout>
<?php
