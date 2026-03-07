<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Psy\CodeCleaner\FunctionContextPass;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::latest()->get();
        return view('admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.form', [
            'admin' => new admin(),
            'page_meta' => [
                'title' => 'tambah admin baru',
                'method' => 'POST',
                'url'    =>  route('admin.store'),
                'button' => 'Simpan'
            ]
        ]);
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']); // 🔥 WAJIB

        Admin::create($data);

        return redirect()->route('admin.index')
            ->with('success', 'admin berhasil ditambahkan');
    }

    public function edit(Admin $admin)
    {
        return view('admin.form', [
            'admin' => $admin,
            'page_meta' => [
                'title' => 'edit admin' . $admin->username,
                'method' => 'PUT',
                'url' => route('admin.update', $admin),
                'button' => 'Update'
            ]
        ]);
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());

        return redirect()->route('admin.index')
            ->with('success', 'admin berhasil di ubah');
    }

    public function destoy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')
            ->with('success', 'data berhasl di hapus');
    }
}
