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
                    <h2>Data Karyawan</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <button type="button"  class="btn btn-md btn-warning" data-toggle="modal" data-target=".modal-tambah-alternatif">Tambah Karyawan</button>
<br/><br/>
                    <table id="" class="datatable-fixed-header table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th nowrap align="center">No</th>
                          <th nowrap>Nama</th>
                          <th nowrap>Email</th>
                          <th nowrap>Alamat</th>
                          <th nowrap>Telpon</th>
                          <th nowrap>Status Karyawan</th>
                          <th nowrap>Jenis Kelamin</th>
                          <th nowrap>Tanggal Lahir</th>
                          <th nowrap>Jabatan</th>
                          <th nowrap>User Level</th>
                          <th nowrap>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $iter=1;@endphp
                          @foreach ($data_user as $k => $v)
                            <tr>
                              <td nowrap>
                                @if($v->id<10) PEG-000{{$v->id}}
                                @elseif($v->id<100) PEG-00{{$v->id}}
                                @elseif($v->id<1000) PEG-0{{$v->id}}
                                @else PEG-{{$v->id}}
                                @endif

                              </td>

                              <td nowrap>{{$v->nama}}</td>
                              <td nowrap>{{$v->email}}</td>
                              <td nowrap>{{$v->alamat}}</td>
                              <td nowrap>{{$v->telpon}}</td>
                              <td nowrap>{{$v->status_karyawan->nama}}</td>
                              <td nowrap>{{$v->jns_klmin}}</td>
                              <td nowrap>{{ bulan_indo($v->tanggal_lahir) }}</td>
                              <td nowrap>{{$v->jabatan->nama}}</td>
                              <td nowrap>{{$v->user_level->nama}}</td>
                              <td nowrap align="center">
                                  <button
                                    data-id="{{$v->id}}"
                                    data-nama="{{$v->nama}}"
                                    data-email="{{$v->email}}"
                                    data-alamat="{{$v->alamat}}"
                                    data-telpon="{{$v->telpon}}"
                                    data-status-karyawan-id="{{$v->status_karyawan_id}}"
                                    data-jns-klmin="{{$v->jns_klmin}}"
                                    data-tanggal-lahir="{{$v->tanggal_lahir}}"
                                    data-jabatan-id="{{$v->jabatan_id}}"
                                    data-user-level-id="{{$v->user_level_id}}"



                                    type="button"  class="btn btn-xs btn-warning btn_edit" data-toggle="modal" data-target=".modal-edit-alternatif">Edit</button>
                                  <button data-id="{{$v->id}}" data-nama="{{$v->nama}}" class="btn btn-xs btn-danger btn_hapus" type="button" data-toggle="modal" data-target=".modal-hapus-alternatif">Hapus</button>
                              </td>
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


        <div class="modal fade modal-edit-alternatif" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Data Karyawan</h4>
              </div>
              <div class="modal-body">
                <form id="edit_form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Karyawan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  id="edit_nama" type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Karyawan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  id="edit_email" type="text" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  id="edit_alamat" type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  id="edit_telpon" type="text" name="telpon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Karyawan <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="status_karyawan_id" id="edit_status_karyawan" class="form-control col-md-7 col-xs-12">
                            <option value="">----Pilih Karyawan---</option>
                            @foreach ($data_status_karyawan as $k => $v)
                              <option value="{{$v->id}}">{{$v->nama}}</option>
                            @endforeach
                          </select >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jns_klmin" id="edit_jenis_kelamin" class="form-control col-md-7 col-xs-12">
                            <option value="">----Pilih Jenis Kelamin---</option>
                            <option value="PRIA">PRIA</option>
                            <option value="WANITA">WANITA</option>
                          </select >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12 input-group date myDatepicker'>
                            <input name="tanggal_lahir" type='text' class="form-control col-md-7 col-xs-12" id="edit_tanggal_lahir"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jabatan_id" id="edit_jabatan_id" class="form-control col-md-7 col-xs-12">
                          <option value="">----Pilih Jabatan---</option>
                          @foreach ($data_jabatan as $k => $v)
                            <option value="{{$v->id}}">{{$v->nama}}</option>
                          @endforeach
                        </select >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Level<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="user_level_id" id="edit_user_level_id" class="form-control col-md-7 col-xs-12">
                          <option value="">----Pilih User Level---</option>
                          @foreach ($data_user_level as $k => $v)
                            <option value="{{$v->id}}">{{$v->nama}}</option>
                          @endforeach
                        </select >
                      </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade modal-tambah-alternatif" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Karyawan</h4>
              </div>
              <div class="modal-body">
                <form action="/admin/data_karyawan" method="post" data-parsley-validate class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Karyawan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input   type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Karyawan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input   type="text" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input   type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="telpon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Karyawan <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="status_karyawan_id"  class="form-control col-md-7 col-xs-12">
                            <option value="">----Pilih Karyawan---</option>
                            @foreach ($data_status_karyawan as $k => $v)
                              <option value="{{$v->id}}">{{$v->nama}}</option>
                            @endforeach
                          </select >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jns_klmin"  class="form-control col-md-7 col-xs-12">
                            <option value="">----Pilih Jenis Kelamin---</option>
                            <option value="PRIA">PRIA</option>
                            <option value="WANITA">WANITA</option>
                          </select >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12 input-group date myDatepicker'>
                            <input name="tanggal_lahir" type='text' class="form-control col-md-7 col-xs-12" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jabatan_id" class="form-control col-md-7 col-xs-12">
                          <option value="">----Pilih Jabatan---</option>
                          @foreach ($data_jabatan as $k => $v)
                            <option value="{{$v->id}}">{{$v->nama}}</option>
                          @endforeach
                        </select >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Level<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="user_level_id"  class="form-control col-md-7 col-xs-12">
                          <option value="">----Pilih User Level---</option>
                          @foreach ($data_user_level as $k => $v)
                            <option value="{{$v->id}}">{{$v->nama}}</option>
                          @endforeach
                        </select >
                      </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade modal-hapus-alternatif" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Hapus Alternatif</h4>
              </div>
              <div class="modal-body">
                <form id="hapus_form" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <div id='modal_hapus_pesan'></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
              </div>
              {{-- <div class="ln_solid"></div> --}}

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

      $(document).on('click','button.btn_edit', function()
      {
      var nama               = $(this).attr('data-nama');
      var email              = $(this).attr('data-email');
      var alamat             = $(this).attr('data-alamat');
      var telpon             = $(this).attr('data-telpon');
      var status_karyawan    = $(this).attr('data-status-karyawan-id');
      var jns_klmin          = $(this).attr('data-jns-klmin');
      var tanggal_lahir      = $(this).attr('data-tanggal-lahir');
      var jabatan_id         = $(this).attr('data-jabatan-id');
      var user_level_id      = $(this).attr('data-user-level-id');
      var action = '/admin/data_karyawan/'+$(this).attr('data-id');

      $('#edit_nama').val(nama);
      $('#edit_email').val(email);
      $('#edit_alamat').val(alamat);
      $('#edit_telpon').val(telpon);
      $('#edit_status_karyawan').val(status_karyawan);
      $('#edit_jenis_kelamin').val(jns_klmin);
      $('#edit_tanggal_lahir').val(tanggal_lahir);
      $('#edit_jabatan_id').val(jabatan_id);
      $('#edit_user_level_id').val(user_level_id);




      $("#edit_form").attr("action",action);



      });

      $(document).on('click','button.btn_hapus', function()
      {
      var nama = $(this).attr('data-nama');
      var action = '/admin/data_karyawan/'+$(this).attr('data-id');
      isi_modal = "Apakah Anda Yakin Menghapus "+nama;
      $("#modal_hapus_pesan").html(isi_modal);
      $("#hapus_form").attr("action",action);
      });
    </script>

  </body>
</html>
@endsection
