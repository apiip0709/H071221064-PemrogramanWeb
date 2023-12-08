<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function jobs()
    {
        $job = Jobpost::all();
        $jobposts = Jobpost::select('posisi')->distinct()->get();
        $lokasi = Jobpost::select('lokasi')->distinct()->get();
        $perusahaan = Perusahaan::all();
        $fulltime = Jobpost::where('type', 'full-time')->get();
        $parttime = Jobpost::where('type', 'part-time')->get();

        // Tambahkan properti baru ke setiap objek Jobpost dengan nama 'similarPositionsCount'
        foreach ($jobposts as $jobpost) {
            $jobpost->similarPositionsCount = Jobpost::where('posisi', $jobpost->posisi)->count();
        }

        return view('jobs')->with(compact('job', 'jobposts', 'lokasi', 'fulltime', 'parttime', 'perusahaan'));
    }

    public function show($id)
    {
        // Ambil data pekerjaan berdasarkan ID
        $jobpost = Jobpost::find($id);
        $perusahaan = Perusahaan::findorFail($jobpost->id_company);

        // Jika data tidak ditemukan, dapatkan data pekerjaan lainnya atau tampilkan pesan kesalahan
        if (!$jobpost) {
            // Misalnya, arahkan ke halaman 404
            abort(404, 'Pekerjaan tidak ditemukan');
        }

        $formattedGaji = $jobpost->formatGaji();
        $jumlahPosisi = Jobpost::countByCompany($jobpost->id_company);

        if (auth()->user()->role == 'Pelamar' ) {
            $profile = Profile::where('id_user', auth()->user()->id)->first();
            // Ambil data aplikasi berdasarkan profil dan pekerjaan
            $userApply = Applicant::where('id_jobpost', $jobpost->id)
                ->where('id_profile', $profile->id)
                ->get();
    
            $otherApply = Applicant::where('id_jobpost', $jobpost->id)
                ->where('id_profile', '<>', $profile->id)
                ->get();
                
            return view('jobs-detail', compact('jobpost', 'perusahaan', 'formattedGaji', 'jumlahPosisi', 'profile', 'userApply','otherApply'));
        }

        // Kirim data pekerjaan ke tampilan
        return view('jobs-detail', compact('jobpost', 'perusahaan', 'formattedGaji', 'jumlahPosisi'));
    }

    public function search(Request $request)
    {
        $jobposts = Jobpost::select('posisi')->distinct()->get();
        $lokasi = Jobpost::select('lokasi')->distinct()->get();
        $perusahaan = Perusahaan::all();

        // Tambahkan properti baru ke setiap objek Jobpost dengan nama 'similarPositionsCount'
        foreach ($jobposts as $jobpost) {
            $jobpost->similarPositionsCount = Jobpost::where('posisi', $jobpost->posisi)->count();
        }

        // Ambil input dari formulir pencarian
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $location = $request->input('location');
        $inputpers = $request->input('perusahaan');

        // Query berdasarkan kriteria pencarian
        $jobs = Jobpost::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('posisi', 'like', '%' . $keyword . '%')
                        ->orWhere('lokasi', 'like', '%' . $keyword . '%')
                        ->orWhere('type', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%')
                        ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                        ->orWhere('gaji', 'like', '%' . $keyword . '%');
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where('posisi', $category);
            })
            ->when($location, function ($query) use ($location) {
                $query->where('lokasi', $location);
            })
            ->when($inputpers, function ($query) use ($inputpers) {
                $query->where('id_company', $inputpers);
            })
            ->get();

        // Kirim data hasil pencarian ke tampilan
        return view('jobs-search', compact('jobs', 'jobposts', 'lokasi', 'perusahaan'));
    }
}
