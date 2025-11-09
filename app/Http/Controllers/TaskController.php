<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 🟢 Afficher toutes les tâches
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }
    public function taches()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.taches', compact('tasks'));
    }

    // 🟢 Afficher le formulaire de création
    public function create()
    {
        return view('tasks.create');
    }

    // 🟢 Enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche créée avec succès !');
    }

    // 🟢 Marquer une tâche comme terminée
    public function complete(Task $task)
    {
        $task->update(['completed' => true]);

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche marquée comme terminée !');
    }

    // 🟢 Supprimer une tâche
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche supprimée avec succès !');
    }
}
