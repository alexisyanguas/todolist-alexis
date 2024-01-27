<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    FormTaskRequest,
};
use App\Models\{
    Task,
    Category,
    User,
};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(8);
        return view('tasks.index', [
            'title' => 'Tâches',
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        return view('tasks.create', [
            "title" => "Créer une tâche",
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTaskRequest $request, Task $task = null): RedirectResponse
    {
        $task = Task::updateOrCreate(["id" => $task?->id], $request->validated());

        $message = "La tâche <strong>$task->title</strong> créé avec succès";
        return redirect()->route('tasks.index')->with([
            "message" => $message,
            "alert-type" => "success",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $users = User::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        return view('tasks.edit', [
            "title" => "Modifier une tâche",
            'task' => $task,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormTaskRequest $request, Task $task): RedirectResponse
    {
        $this->store($request, $task);
        return redirect()->route('tasks.index')->with([
            "message" => "La tâche <strong>$task->title</strong> modifié avec succès",
            "alert-type" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $message = "La tâche <strong>$task->title</strong> supprimé avec succès";
        $task->delete();
        return redirect()->route('tasks.index')->with([
            "message" => $message,
            "alert-type" => "success",
        ]);
    }
}
