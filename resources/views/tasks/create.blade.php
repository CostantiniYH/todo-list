@extends('layouts.app')

@section('content')
<a href="{{ route('tasks.index') }}" class="btn btn-primary">
    Retour
</a>
<div class="container shadow m-3 p-4 col-md-4 mx-auto rounded ">
    <h2>Nouvelle tâche</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div style="margin: 15px 0;">
            <label for="title">Titre * :</label><br>
            <input
                class="form-control"
                type="text"
                name="title"
                id="title"
                value="{{ old('title') }}"
                style="width: 100%; padding: 8px;"
                required
            >
        </div>

        <div style="margin: 15px 0;">
            <label for="description">Description :</label><br>
            <textarea
                class="form-control"
                name="description"
                id="description"
                rows="4"
                style="width: 100%; padding: 8px;"
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Créer la tâche
        </button>
    </form>
</div>
@endsection
