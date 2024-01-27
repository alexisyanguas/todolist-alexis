<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    FormCategoryRequest,
};
use App\Models\{
    Category,
};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public $icons = [
        'fa-poo',
        'fa-briefcase',
        'fa-users',
        'fa-user-friends',
        'fa-heartbeat',
        'fa-gamepad',
        'fa-futbol',
        'fa-plane',
        'fa-question',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(8);
        return view('categories.index', [
            'title' => 'Catégories',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create', [
            "title" => "Créer une catégorie",
            "icons" => $this->icons,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormCategoryRequest $request, Category $category = null): RedirectResponse
    {
        $category = Category::updateOrCreate(["id" => $category?->id], $request->validated());

        $message = "La catégorie <strong>$category->name</strong> créé avec succès";
        return redirect()->route('categories.index')->with([
            "message" => $message,
            "alert-type" => "success",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            "title" => "Modifier une catégorie",
            "category" => $category,
            "icons" => $this->icons,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormCategoryRequest $request, Category $category): RedirectResponse
    {
        $this->store($request, $category);
        return redirect()->route('categories.index')->with([
            "message" => "La catégorie <strong>$category->name</strong> modifié avec succès",
            "alert-type" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $message = "La catégorie <strong>$category->name</strong> supprimé avec succès";
        $category->delete();
        return redirect()->route('categories.index')->with([
            "message" => $message,
            "alert-type" => "success",
        ]);
    }
}
