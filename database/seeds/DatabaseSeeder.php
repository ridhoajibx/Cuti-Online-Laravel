<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $level_users = ['Admin','HRD','karyawan',];
      foreach ($level_users as $k => $v) {
        DB::table('level_users')->insert([
            'nama' => $v,
        ]);
      }
      $jeniscuti = ['CUTI MELAHIRKAN','CUTI HARIAN','CUTI BULANAN','CUTI TAHUNAN',];
      foreach ($jeniscuti as $k => $v) {
        DB::table('jenis_cutis')->insert([
            'nama' => $v,
        ]);
      }
      $jabatan = ['DIREKTUR','KEPALA BAGIAN','MANAJER','ADMIN', 'GURU', 'CLEANING SERVICE'];
      foreach ($jabatan as $k => $v) {
        DB::table('jabatans')->insert([
            'nama' => $v,
        ]);
      }
      $statuskaryawan = ['PEGAWAI TETAP','PEGAWAI KONTRAK','PEGAWAI HARIAN LEPAS',];
      foreach ($statuskaryawan as $k => $v) {
        DB::table('status_karyawans')->insert([
            'nama' => $v,
        ]);
      }
      $user = ['admin','hrd','karyawan',];
      foreach ($user as $k => $v) {
        DB::table('users')->insert([
            'nama' => $v,
            'email' => $v."@".$v.".com",
            'password' => bcrypt('123456'),
            'user_level_id' => ($k+1),
            'status_karyawan_id' => ($k+1),
            'jabatan_id' => ($k+1),
        ]);
      }
    }
}