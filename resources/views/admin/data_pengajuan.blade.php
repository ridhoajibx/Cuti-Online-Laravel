@extends('admin.app')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <!-- <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div> -->


            </div>

            <div class="clearfix"></div>

            <div class="row">
              @if(session('Berhasil'))
                  <div class="alert alert-success" id="peringatan">
                      {{ session('Berhasil') }}
                  </div>
              @endif

              @if(session('Gagal'))
                  <div class="alert alert-danger" id="peringatan">
                      {{ session('Gagal') }}
                  </div>
              @endif





              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Cuti</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<br/><br/>
                    <table id="" class="datatable-fixed-header table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th nowrap align="center">No</th>
                          <th nowrap>Tanggal Pemohon</th>
                          <th nowrap>Nama</th>
                          <th nowrap>Jabatan</th>
                          <th nowrap>Awal Tanggal Cuti</th>
                          <th nowrap>Akhir Tanggal Cuti</th>
                          <th nowrap>Lama Cuti</th>
                          <th nowrap>Jenis Cuti</th>
                          <th nowrap>Keterangan</th>
                          <th nowrap>Status</th>
                          {{-- <th nowrap>Penyetuju</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @php $iter=1;@endphp
                          @foreach ($data_pengajuan as $k => $v)
                            <tr>
                              <td align="right">{{$iter}}</td>
                              <td nowrap>{{bulan_indo($v->tgl_dibuat)}}</td>
                              <td nowrap>{{$v->pemohon->nama}}</td>
                              <td nowrap>{{$v->pemohon->jabatan->nama}}</td>
                              <td nowrap>{{bulan_indo($v->dari)}}</td>
                              <td nowrap>{{bulan_indo($v->sampai)}}</td>
                              <td nowrap>
                                @php $awal       = new DateTime($v->dari); $akhir = new DateTime($v->sampai); $lama = $akhir->diff($awal)->format("%a"); @endphp
                                {{($lama+1)}} Hari
                              </td>
                              <td nowrap>{{$v->jenis_cuti->nama}}</td>
                              <td nowrap>{{$v->keterangan}}</td>
                              <td nowrap>@if($v->status==1) Belum Diputuskan @elseif($v->status==2) Cuti Ditolak @else <button class="btn-success">Cuti Diterima</button> @endif</td>
                              {{-- <td nowrap>{{$v->penyetuju->nama}}</td> --}}
                            </tr>
                            @php $iter++;@endphp
                          @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>




            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- modals -->
        <!-- Large modal -->


        

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('/template/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/template/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/template/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/template/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('/template/iCheck/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('/template/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/template/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{asset('/template/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>

    <script src="{{asset('/template/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/template/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('/template/jszip/dist/jszip.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('/template/js/custom.min.js')}}"></script>
    <script>
    $(document).ready(function() {
$('#dataTables-example').DataTable({
    responsive: true
});
//waktu mundur
var detik = 5;
var menit = 0;
function hitung(){
  setTimeout(hitung,1000);
  detik --;
  if(detik < 0){
    detik = 59;
    menit --;
    if(menit < 0){
      menit = 0;
      detik = 0;
    }
    $('#peringatan').hide();
  }
}
hitung();
});
      $(document).on('click','button.btn_edit', function()
      {
      var nama = $(this).attr('data-nama');
      var action = 'data_alternatif/'+$(this).attr('data-id');
      $('#edit_nama').val(nama);
      $("#edit_form").attr("action",action);
      });
      $(document).on('click','button.btn_hapus', function()
      {
      var nama = $(this).attr('data-nama');
      var action = 'data_alternatif/'+$(this).attr('data-id');
      isi_modal = "Apakah Anda Yakin Menghapus "+nama;
      $("#modal_hapus_pesan").html(isi_modal);
      $("#hapus_form").attr("action",action);
      });
    </script>

  </body>
</html>
@endsection