<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags|max:255',
            'color' => 'nullable|string',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'color' => $request->color ?? '#4a5568',
        ]);

        return response()->json($tag, 201);
    }
}
