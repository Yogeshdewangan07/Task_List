@extends('layouts.app')

<nav class="flex justify-between items-center p-2 bg-slate-300">
    <p class="font-medium">Task List</p>
    <form action="{{ route('logout.user') }}" method="post">
        @csrf
        @method('POST')
        <button class="btn">Logout</button>
    </form>
</nav>

@section('title', 'The list of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}
        </a>
        @if ($task->important)
        <span class="font-medium text-red-500"> important</span>
            @endif
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
@endsection