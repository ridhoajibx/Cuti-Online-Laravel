@extends('hrd.app')

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
                <div class="col-md-12">
                    <div class="">
                      <div class="x_content">
                        <div class="row">
                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

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
                    <h2>Approval Cuti</h2>

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
                                  <td nowrap>@if($v->status==1) <button data-toggle="modal"
                                                                        data-target=".modal-tambah-alternatif"
                                                                        data-id="{{$v->id}}"
                                                                        data-jabatan="{{$v->pemohon->jabatan->nama}}"
                                                                        data-nama="{{$v->pemohon->nama}}"
                                                                        data-dari="{{$v->dari}}"
                                                                        data-sampai="{{$v->sampai}}"
                                                                        data-lama="{{($lama+1)}}"
                                                                        data-keterangan="{{$v->keterangan}}"
                                                                        class="btn-info btn-penyetuju"> Belum Diputuskan @elseif($v->status==2) <button class="btn-danger"> Cuti Ditolak @else <button class="btn-success">Cuti Diterima @endif</button></td>
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




        <div class="modal fade modal-tambah-alternatif" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Data Permohonan Cuti</h4>
              </div>
              <div class="modal-body">


<form action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="modal_nama" type="text" required="required" class="form-control col-md-7 col-xs-12" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="modal_jabatan" type="text" required="required" class="form-control col-md-7 col-xs-12" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Mulai Cuti
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="modal_dari" type="text" required="required" class="form-control col-md-7 col-xs-12" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Selesai Cuti
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="modal_sampai" type="text" required="required" class="form-control col-md-7 col-xs-12" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lama Cuti
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="modal_lama" type="text" required="required" class="form-control col-md-7 col-xs-12" disabled>
                    </div>
                  </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="modal_keterangan" type="text" name="keterangan" required="required" class="form-control col-md-7 col-xs-12" disabled>
                      </div>
                    </div>
</form>
                    <form action="" method="post" data-parsley-validate class="form-horizontal form-label-left edit_form">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keputusan
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input name="keputusan" value="3" type="hidden">
                          <button type="submit" class="btn btn-success">Cuti Diterima</button>

                      </div>
                    </div>
                    </form>
                    <form action="" method="post" data-parsley-validate class="form-horizontal form-label-left edit_form">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input name="keputusan" value="2" type="hidden">
                          <button type="submit" class="btn btn-danger">Cuti Ditolak</button>

                      </div>
                    </div>
                    </form>




            </div>
          </div>
        </div>
      </div>


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            By Admin Andreas <a href="{{asset('https://colorlib.com')}}">SMA President</a>
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

    <script src="{{asset('/template/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/template/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('/template/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/template/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{asset('/template/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{asset('/template/js/custom.min.js')}}"></script>
    <script>

    $('.myDatepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });


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

      $(document).on('click','button.btn-penyetuju', function()
      {
      var nama                = $(this).attr('data-nama');
      var jabatan             = $(this).attr('data-jabatan');
          var dari            = $(this).attr('data-dari');
      var sampai              = $(this).attr('data-sampai');
      var lama                = $(this).attr('data-lama');
      var keterangan          = $(this).attr('data-keterangan');



      var action = '/hrd/'+$(this).attr('data-id');

      $('#modal_nama').val(nama);
      $('#modal_jabatan').val(jabatan);
      $('#modal_dari').val(dari);
      $('#modal_sampai').val(sampai);
      $('#modal_lama').val(lama+" hari");
      $('#modal_keterangan').val(keterangan);
      $(".edit_form").attr("action",action);



      });


    </script>

  </body>
</html>
@endsection
