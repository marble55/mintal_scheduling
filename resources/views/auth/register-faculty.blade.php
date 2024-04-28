<x-guest-layout>
    <h1>Create Faculty</h1>
    <form method="POST" action="{{ route('register.faculty.update', ['user' => $user]) }}">
        @csrf

        <label for="id_usep">ID USEP:</label>
        <input type="text" id="id_usep" name="id_usep" required maxlength=10><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="remarks">Remarks:</label>
        <input type="text" id="remarks" name="remarks" required><br>

        <label for="is_part_timer">Is Part Timer:</label>
        <input type="checkbox" id="is_part_timer" name="is_part_timer"><br>

        <label for="is_graduate">Is Graduate:</label>
        <input type="checkbox" id="is_graduate" name="is_graduate"><br>

        <button type="submit">Submit</button>
    </form>
</x-guest-layout>