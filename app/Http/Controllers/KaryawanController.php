<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\JenisCuti;
use App\Models\LevelUser;
use App\Models\Pengajuan;
use App\Models\StatusKaryawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:karyawan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_pengajuan = Pengajuan::where('pemohon_id',Auth::User()->id)->get();

        return view('karyawan.permohonan',['data_pengajuan'=>$data_pengajuan,'auth'=>Auth::User(),'jenis_cuti'=>JenisCuti::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $awal       = new DateTime($r->dari);
        $akhir      = new DateTime($r->sampai);
        $now        = new DateTime();

        // cek tanggal
        if($akhir->format('%d')<$awal->format('%d')){
          if($akhir->format('%m')<=$awal->format('%m')){
            if($akhir->format('%y')<=$awal->format('%y')){
              return redirect('karyawan/')->with('Gagal', 'Minimal Cuti 1 Hari.');
            }
          }
        }

        Pengajuan::insert([
                            'jenis_cuti_id'=>$r->jenis_cuti_id,
                            'dari'=>$r->dari,
                            'status'=>1,
                            'sampai'=>$r->sampai,
                            'pemohon_id'=>Auth::User()->id,
                            'tgl_dibuat'=>$now->format('Y-m-d'),
                            'keterangan'=>$r->keterangan,]
                          );

        return redirect('karyawan/')->with('Berhasil', 'Anda Berhasil Mengajukan Cuti.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
