<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    protected ?Project $project = null;

    public function index()
    {
        $project = Project::latest()->get();
        return view('project.index', compact('project'));
    }

    public function create()
    {
        return view('project.form', [
            'project' => new project(),
            'page_meta' => [
                'title'  => 'Tambah project baru',
                'method' => 'POST',
                'url'   => route('project.store'),
                'botton'  => 'Simpan'
            ]
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/photos'), $filename);

            $data['foto'] = $filename;
        }

        Project::create($data);

        return redirect()->route('project.index')
            ->with('success', 'project berhasil ditambahkan');
    }
}
