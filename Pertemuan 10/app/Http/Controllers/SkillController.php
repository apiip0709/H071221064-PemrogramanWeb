<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('id_user', $user->id)->first();
        $skill = Skill::where('id_profile', $profile->id)->get();
        return view('pelamar.skill.index-skill')->with(compact('profile', 'skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $profile = Profile::where('id_user', $user->id)->first();
        return view('pelamar.skill.create-skill')->with(compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|exists:profiles,id',
            'inputfile' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('/pelamar/skill/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $foto = $request->file('inputfile');
        $filename = date('Y-m-d') . '-' . $foto->getClientOriginalName();
        $path = 'photo-user-' . $input['nama'] . '/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));

        Skill::create([
            'skill' => $filename,
            'id_profile' => $input['nama'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Assuming you're storing the skill and displaying a success message
        return redirect('/pelamar/skill/create')->with('message', 'Skill added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $filename = $skill->skill;
        $idProfile = $skill->id_profile;

        // Memastikan file terkait ada dan menghapusnya
        if ($filename && Storage::disk('public')->exists('photo-user-' . $idProfile . '/' . $filename)) {
            Storage::disk('public')->delete('photo-user-' . $idProfile . '/' . $filename);
        }

        Skill::where('id', $skill->id)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
