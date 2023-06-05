<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminFishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.fish.index", [
            "title" => "Ikan",
            "fishs" => Fish::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.fish.create", [
            "title" => "Tambah Ikan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "price" => "required|number",
            "image" => "required|image",
        ]);

        $validated["image"] = $$request->file('image')->store('fish');
        Fish::create($validated);
        return redirect()->route("admin.fish.index")->with("success", "Ikan berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function show(Fish $fish)
    {
        return view("admin.fish.show", [
            "title" => "Detail Ikan",
            "fish" => $fish,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function edit(Fish $fish)
    {
        return view("admin.fish.edit", [
            "title" => "Edit Ikan",
            "fish" => $fish,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fish $fish)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "price" => "required|number",
            "image" => "nullable|image",
        ]);

        if ($request->file("image")) {
            Storage::delete($fish->images);
            $validated["image"] = $request->file('image')->store('fish');
        }
        $fish->update($validated);
        return redirect()->route("admin.fish.index")->with("success", "Perubahan berhasil di simpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fish $fish)
    {
        Storage::delete($fish->image);
        $fish->delete();
        return redirect()->route("admin.fish.index")->with("success", "Ikan berhasil di hapus");
    }
}
