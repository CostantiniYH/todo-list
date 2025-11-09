@extends('layouts.app')

@section('content')
<h2>Toutes mes tâches</h2>

@if($tasks->count() > 0)
    @foreach($tasks as $task)
        <div class="task {{ $task->completed ? 'completed' : '' }} shadow p-3 mb-5 bg-body rounded-3">
            @if($task->completed)
                <span class="badge bg-success float-end">Terminée</span>
            @endif  
            <h4>{{ $task->title }}</h4>

            @if($task->description)
                <p>{{ $task->description }}</p>
            @endif

            <small>Créée le : {{ $task->created_at->format('d/m/Y H:i') }}</small>

            <div style="margin-top: 10px;">
                @if(!$task->completed)
                    <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Terminer</button>
                    </form>
                @endif

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette tâche ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p>Aucune tâche pour le moment.</p>
@endif
@endsection