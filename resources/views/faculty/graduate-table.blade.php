@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Graduate
        </h1>
        <br>
    </div>
    <div class="container pt-5">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Faculty ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Remarks</th>
                    <th>Degree</th>
                    <th>PH_ID</th>
                    <th>Date Added</th>
                    <th>Edit | Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>{{ $faculty->id_usep }}

                        </td>
                        <td>{{ $faculty->first_name }}
                            @if ($faculty->is($faculty->program_head->faculty))
                                (You)
                            @endif
                        </td>
                        <td>{{ $faculty->last_name }}</td>
                        <td>{{ $faculty->remarks }}</td>
                        <td>{{ $faculty->is_part_timer ? 'Yes' : 'No' }}</td>
                        <td>{{ $faculty->is_graduate ? 'Yes' : 'No' }}</td>
                        <td>{{ $faculty->designation_id }}</td>
                        <td>{{ $faculty->program_head->name }}</td>
                        <td>{{ $faculty->created_at }}</td>
                        <td>{{ $faculty->updated_at }}</td>
                        <td>
                            @if ($faculty->program_head->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('faculty.edit', $faculty)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('faculty.destroy', $faculty) }}">
                                            @csrf
                                            @method('delete')

                                            <x-dropdown-link :href="route('faculty.destroy', $faculty)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a href="?page=AssignFaculty"> Add a Faculty</a>
    </div>
    </body>
@endsection
