<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Ambil data pekerjaan berdasarkan ID
        $jobpost = Jobpost::find($id);
        $perusahaan = Perusahaan::findorFail($jobpost->id_company);

        $formattedGaji = $jobpost->formatGaji();
        $profile = Profile::where('id_user', auth()->user()->id)->first();

        // Jika data tidak ditemukan, dapatkan data pekerjaan lainnya atau tampilkan pesan kesalahan
        if (!$jobpost) {
            // Misalnya, arahkan ke halaman 404
            abort(404, 'Pekerjaan tidak ditemukan');
        }

        // Kirim data pekerjaan ke tampilan
        return view('apply-create', compact('jobpost', 'perusahaan', 'formattedGaji', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($tes)) {
            if (Auth::user()->role == 'Pelamar') {
                $input = $request->all();
                $profile = Profile::where('id_user', auth()->user()->id)->first();

                Applicant::create([
                    'id_jobpost' => $input['job'],
                    'id_profile' => $profile->id,
                    'status' => 'menunggu',
                ]);

                return redirect("/jobs/{$profile->id}")->with('success', 'Data terkirim, Selamat menunggu');
            }
        }

        return back()->with('failed', 'Email Atau Password Anda Salah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data Applicant berdasarkan ID
        $applicant = Applicant::where('id_jobpost',$id)->first();
        
        // Mengambil data Jobpost berdasarkan ID Jobpost yang ada pada Applicant
        $jobpost = Jobpost::findOrFail($applicant->id_jobpost);
        
        // Mengambil data Profile berdasarkan ID Profile yang ada pada Applicant
        $profile = Profile::findOrFail($applicant->id_profile);
        
        // Mengambil data Skill berdasarkan ID Profile
        $skill = Skill::where('id_profile', $profile->id)->get();
        
        // Mengambil data Perusahaan berdasarkan ID Perusahaan yang ada pada Jobpost
        $perusahaan = Perusahaan::findOrFail($jobpost->id_company);
        
        // Format gaji, jumlah posisi, dan data lainnya
        $formattedGaji = $jobpost->formatGaji();
        $jumlahPosisi = Jobpost::countByCompany($jobpost->id_company);
        
        // Mengambil data Apply dari user yang sedang login
        $userApply = $applicant;

        // Mengirim data ke tampilan
        return view('penyedia.apply-edit', compact('jobpost', 'perusahaan', 'formattedGaji', 'jumlahPosisi', 'profile', 'skill', 'userApply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $applyId)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:diterima,dibatalkan',
        ]);

        if ($validator->fails()) {
            return redirect()->route('penyedia.apply-post')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'status' => $input['status']
        ];

        // Mengambil data Jobpost dan Apply
        $apply = Applicant::find($applyId);
        $apply->update($data);

        // Redirect atau tindakan lainnya
        return redirect()->route('penyedia')->with('message', 'Apply status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
