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
            'project' => new Project(),
            'page_meta' => [
                'title'  => 'Tambah project baru',
                'method' => 'POST',
                'url'   => route('project.store'),
                'button'  => 'Simpan'
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

    public function edit(Project $project)
    {
        return view('project.form', [
            'project' => $project,
            'page_meta' => [
                'title' => 'Update Project ' . $project->nama_project,
                'method' => 'PUT',
                'url' => route('project.update', ['project' => $project->id]),
            ],
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpg,jpg,png,jpeg|max:2048',
            'nama_project' => 'required|string|max:225',
            'link' => 'required|string|max:225',
        ]);

        $project->update($validated);

        return redirect()->route('project.index')
            ->with('success', 'data berhasil diubah');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index')
            ->with('success', 'data berhasil dihapus');
    }
}
