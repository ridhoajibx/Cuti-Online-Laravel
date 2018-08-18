<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\JenisCuti;
use App\Models\LevelUser;
use App\Models\Pengajuan;
use App\Models\StatusKaryawan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }

// public function __construct(Kriteria $kriteria)
// {
//   $this->kriteria = $kriteria;
// }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // untuk menampilkan data
    public function index()
    {
        return view('admin.index',['data_user'=>User::all(),'auth'=>Auth::User()]);
    }

    public function data_karyawan()
    {
        return view('admin.data_karyawan',['data_user'=>User::all(),
                                           'auth'=>Auth::User(),
                                           'data_status_karyawan'=>StatusKaryawan::all(),
                                            'data_jabatan'=>Jabatan::all(),
                                            'data_user_level'=>LevelUser::all()]);
    }

    public function data_pengajuan()
    {
        return view('admin.data_pengajuan',['data_pengajuan'=>Pengajuan::all(),'auth'=>Auth::User()]);
    }



    //untuk memasukkan data
    public function tambah_data_karyawan(Request $r)
    {
      $data = [
        'nama' => $r->nama,
        'email' => $r->email,
        'alamat' => $r->alamat,
        'telpon' => $r->telpon,
        'jns_klmin' => $r->jns_klmin,
        'tanggal_lahir' => $r->tanggal_lahir,
        'status_karyawan_id' => $r->status_karyawan_id,
        'jabatan_id' => $r->jabatan_id,
        'user_level_id' => $r->user_level_id,
        'password' => bcrypt('123456'),
      ];

      User::insert($data);
      return redirect('admin')->with('Berhasil', 'Data Karyawan Berhasil Ditambahkan.');;
    }


    //untuk mengupdate data
    public function update_data_karyawan(Request $r, $id)
    {

        $data = [
          'nama' => $r->nama,
          'email' => $r->email,
          'alamat' => $r->alamat,
          'telpon' => $r->telpon,
          'jns_klmin' => $r->jns_klmin,
          'tanggal_lahir' => $r->tanggal_lahir,
          'status_karyawan_id' => $r->status_karyawan_id,
          'jabatan_id' => $r->jabatan_id,
          'user_level_id' => $r->user_level_id,
        ];

        User::where('id',$r->id)->update($data);
        return redirect('admin')->with('Berhasil', 'Data Karyawan Berhasil Diubah.');
    }



    //untuk menhapus data
    public function delete_data_karyawan($id)
    {
      if(Auth::user()->id==$id){
        return redirect('/admin/data_karyawan/')->with('Gagal', 'Tidak Bisa Menghapus Diri Sendiri.');
      }

      // User::find($id)->Pengajuan()->delete();

      if(User::where(['id'=>$id])->delete()){
      return redirect('/admin/data_karyawan/')->with('Berhasil', 'Data Karyawan Berhasil Dihapus.');
      }

      return redirect('/admin/data_karyawan/')->with('Gagal', 'Data Karyawan Gagal Dihapus.');
    }














    public function data_cuti()
    {
        return view('admin.karyawan',['data_user'=>User::all(),'auth'=>Auth::User()]);
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
    public function store(Request $request)
    {
        //
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
