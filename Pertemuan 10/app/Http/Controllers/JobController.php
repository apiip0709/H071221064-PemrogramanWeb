<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil pekerjaan yang dibuat oleh pengguna saat ini
        $jobposts = Jobpost::where('id_user', auth()->user()->id)->get();

        // Memeriksa apakah ada data pekerjaan
        if ($jobposts->isNotEmpty()) {
            // Mengambil data perusahaan untuk setiap pekerjaan
            foreach ($jobposts as $jobpost) {
                $perusahaan = Perusahaan::where('id', $jobpost->id_company)->first();
                $data[] = [
                    'jobpost' => $jobpost,
                    'perusahaan' => $perusahaan,
                ];
            }

            // Menampilkan tampilan dengan data yang telah diambil
            return view('penyedia.jobpost.index-jobpost')->with(compact('data'));
        } else {
            // Menampilkan tampilan tanpa data jika tidak ada pekerjaan
            return view('penyedia.jobpost.index-jobpost');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = Perusahaan::where('id_user', auth()->user()->id)->get();
        return view('penyedia.jobpost.create-jobpost')->with(compact('perusahaan'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'posisi' => 'required|string',
            'gaji' => 'required|numeric|min:0', // Ensure 'gaji' is not negative
            'type' => 'required|in:part-time,full-time',
            'inputEmail3' => 'required|email',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            // Add more validation rules as needed.
        ]);

        if ($validator->fails()) {
            return redirect('/penyedia/jobpost/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke database
        $input = $request->all();
        Jobpost::create([
            'posisi' => $input['posisi'],
            'lokasi' => $input['lokasi'],
            'type' => $input['type'],
            'email' => $input['inputEmail3'],
            'deskripsi' => $input['deskripsi'],
            'gaji' => $input['gaji'],
            'id_company' => $input['company'],
            'id_user' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/penyedia/jobpost/create')
            ->with('message', 'Job Post Berhasil Ditambah');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jobpost $jobpost)
    {
        $jobpost = Jobpost::findOrFail($jobpost->id);
        $perusahaan = Perusahaan::findorFail($jobpost->id_company);

        $formattedGaji = $jobpost->formatGaji();
        $jumlahPosisi = Jobpost::countByCompany($jobpost->id_company);
        return view('penyedia.jobpost.show-jobpost')->with(compact('jobpost','perusahaan','formattedGaji','jumlahPosisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobpost $jobpost)
    {
        $data = Jobpost::where('id', $jobpost->id)->first();
        $perusahaan = Perusahaan::where('id_user', auth()->user()->id)->get();

        return view('penyedia.jobpost.edit-jobpost')->with(compact('data', 'perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobpost $jobpost)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'posisi' => 'required|string',
            'gaji' => 'required|numeric|min:0', // Ensure 'gaji' is not negative
            'type' => 'required|in:part-time,full-time',
            'inputEmail3' => 'required|email',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            // Add more validation rules as needed.
        ]);

        if ($validator->fails()) {
            return redirect("/penyedia/jobpost/{$jobpost->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'posisi' => $input['posisi'],
            'lokasi' => $input['lokasi'],
            'type' => $input['type'],
            'email' => $input['inputEmail3'],
            'deskripsi' => $input['deskripsi'],
            'gaji' => $input['gaji'],
            'updated_at' => Carbon::now(),
        ];

        $jobpost = Jobpost::findorfail($jobpost->id);
        $jobpost->update($data);

        return redirect()->back()->with('message', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobpost $jobpost)
    {
        Jobpost::where('id', $jobpost->id)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
