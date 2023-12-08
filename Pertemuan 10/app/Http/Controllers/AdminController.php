<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        if (Auth::user()->role == 'Admin') {
            $search = $request->search;
            return view('admin.admin')->with(compact('search'));
        } else {
            abort(404);
        }
    }

    public function adminApply(Request $request)
    {
        if (Auth::user()->role == 'Admin') {
            // Mengambil data dari tabel Applicant dengan menggabungkan beberapa tabel
            $applicants = DB::table('applicants')
                ->join('profiles', 'applicants.id_profile', '=', 'profiles.id')
                ->join('jobposts', 'applicants.id_jobpost', '=', 'jobposts.id')
                ->join('perusahaans', 'jobposts.id_company', '=', 'perusahaans.id')
                ->select('applicants.*', 'profiles.nama as namaProfile', 'perusahaans.namaCompany', 'jobposts.posisi')
                ->get();
                
            return view('admin.apply-data', ['applicants' => $applicants]);
        } else {
            abort(404);
        }
    }

    public function pelamar(Request $request)
    {
        if (Auth::user()->role == 'Pelamar') {
            $search = $request->search;
            $user = Auth::user();

            $profile = Profile::where('id_user', $user->id)->first();
            $skill = Skill::where('id_profile', $profile->id)->get();

            $applyData = [];
            
            $apply = Applicant::where('id_profile', $profile->id)->get();
            
            foreach ($apply as $item) {
                $jobpost = Jobpost::find($item->id_jobpost);
                $perusahaan = Perusahaan::where('id',$jobpost->id_company)->first();

                $applyData[] = [
                    'perusahaan' => $perusahaan->namaCompany,
                    'posisi' => $jobpost->posisi,
                    'status' => $item->status,
                ];
            }

            return view('pelamar.home')->with(compact('search', 'user', 'profile', 'skill', 'applyData'));
        } else {
            abort(404);
        }
    }

    public function penyedia(Request $request)
    {
        if (Auth::user()->role == 'Penyedia') {
            $search = $request->search;
            $user = Auth::user();

            // Mengambil perusahaan berdasarkan ID pengguna
            $perusahaan = Perusahaan::where('id_user', $user->id)->first();
            $jobposts = Jobpost::where('id_user', $user->id)->get();

            $applyData = [];

            foreach ($jobposts as $jobpost) {
                $apply = Applicant::where('id_jobpost', $jobpost->id)->get();

                foreach ($apply as $item) {
                    $profile = Profile::find($item->id_profile);

                    $applyData[] = [
                        'id_jobpost' => $jobpost->id,
                        'id_apply' => $item->id,
                        'nama' => $profile->nama,
                        'posisi' => $jobpost->posisi,
                        'status' => $item->status,
                    ];
                }
            }

            if ($perusahaan && $perusahaan->id_user === null) {
                return view('penyedia.index')->with(compact('search', 'user'));
            }

            return view('penyedia.index')->with(compact('search', 'user', 'perusahaan', 'applyData'));
        } else {
            abort(404);
        }
    }
}
