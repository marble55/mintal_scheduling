@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Block
        </h1>
        <br>
        <!-- <img src="table.png"></img> -->
    </div>
    <div class="container pt-5">
        <table id="datatablesDefault" class="table table-striped" data-export-filename="Blocks CDM Scheduling" data-export-title="Blocks">
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
                        <td class="d-flex align-items-center gap-3">
                            <a href="{{ route('block.edit', $block->id) }}">Edit</a>
                            <form method="POST" action="{{ route('block.destroy', $block->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('block.destroy', $block->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);"
                                    class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th>Block ID</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Year Level</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        <a href="{{ route('block.create') }}"> Add a Block</a>
    </div>
@endsection
