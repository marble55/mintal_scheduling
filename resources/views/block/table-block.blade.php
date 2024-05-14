@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Block
        </h1>
        <br>
        <!-- <img src="table.png"></img> -->
    </div>
    <div class="container pt-5" style="margin-bottom:-5%;">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Block ID</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Year Level</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($blocks as $block)
                    <tr>
                        <td>{{ $block->id }}</td>
                        <td>{{ $block->course }}</td>
                        <td>{{ $block->section }}</td>
                        <td>{{ $block->year_level }}</td>
                        <!--Action-->
                        <td><a href="{{ route('block.edit', $block->id) }}">Edit</a> |
                            <form method="POST" action="{{ route('block.destroy', $block->id) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('block.destroy', $block->id) }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('block.create') }}"> Add a Block</a>
    </div>
@endsection


