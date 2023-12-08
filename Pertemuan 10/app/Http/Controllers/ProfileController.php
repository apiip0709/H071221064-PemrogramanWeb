<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile.index-profile')->with(compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role','Pelamar')->get();
        return view('admin.profile.create-profile')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'no_hp' => 'required|string|max:15',
            'umur' => 'required|numeric|min:0',
            'inputEmail3' => 'required|email',
            // 'skills_certificate' => 'required|image|mimes:jpeg,png,jpg|max:2048', // validasi file gambar
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/profile/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke database
        $input = $request->all();
        Profile::create([
            'nama' => $input['nama'],
            'email' => $input['inputEmail3'],
            'no_hp' => $input['no_hp'],
            'umur' => $input['umur'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'deskripsi' => $input['deskripsi'],
            'id_user' => $input['id_user'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/admin/profile/create')
            ->with('message', 'Profile Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $profile = Profile::findorfail($profile->id);
        $skill = Skill::where('id_profile', $profile->id)->get();
        return view('admin.profile.show-profile')->with(compact('profile', 'skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $data = Profile::where('id',$profile->id)->first();
        return view('admin.profile.edit-profile')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'no_hp' => 'required|string|max:15',
            'umur' => 'required|numeric|min:0',
            'inputEmail3' => 'required|email',
            // 'skills_certificate' => 'required|image|mimes:jpeg,png,jpg|max:2048', // validasi file gambar
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/profile/{$profile->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke database
        $input = $request->all();
        $data = [
            'nama' => $input['nama'],
            'email' => $input['inputEmail3'],
            'no_hp' => $input['no_hp'],
            'umur' => $input['umur'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'deskripsi' => $input['deskripsi'],
            'id_user' => auth()->user()->id,
            'updated_at' => Carbon::now(),
        ];

        $profile = Profile::findorfail($profile->id);
        $profile->update($data);

        return redirect()->back()->with('message', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $skills = Skill::where('id_profile', $profile->id)->get();
        foreach ($skills as $skill) {
            $skill->delete();       
        };

        Profile::where('id',$profile->id)->delete();
        
        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
