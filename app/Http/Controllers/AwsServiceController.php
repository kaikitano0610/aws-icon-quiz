<?php

namespace App\Http\Controllers;

use App\Models\AwsService;
use Illuminate\Http\Request;

class AwsServiceController extends Controller
{
    public function index()
    {
        $services = AwsService::latest()->get();
        return view('aws-services.index', compact('services'));
    }

    public function create()
    {
        return view ('aws-services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['required', 'image', 'max:2048'],
        ]);

        $path = $request->file('icon')->store('aws-icons', 'public');

        AwsService::create([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'description' => $validated['description'] ?? null,
            'icon_path' => $path,
        ]);

        return redirect()
            ->route('aws-services.index')
            ->with('message', 'AWSサービスを登録した');
    }
}
