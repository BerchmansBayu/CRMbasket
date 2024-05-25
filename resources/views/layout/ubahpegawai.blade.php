@include('layout.head')
@include('layout.sidebar')
@include('layout.navbar')   
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pegawai</h1>
 
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pegawai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <form action="/updatedata2/{{$pegawai->id_pegawai}}" method="post">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pengguna</label>
    <select name="id_pengguna" id="">
    @foreach ($pengguna as $d)
    <option value="{{$d->id_pengguna}}">{{$d->nama_pengguna}}</option>
    @endforeach
   </select>
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Jenis Kelamin</label>
    <select name="jenis_kelamin_pegawai" id="">
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" name="alamat_pegawai" value="{{$pegawai->alamat_pegawai}}" class="form-control" id="exampleInputPassword1" placeholder="Harga Barang" value="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No HP</label>
    <input type="text" name="no_Hp_pegawai" value="{{$pegawai->no_Hp_pegawai}}" class="form-control" id="exampleInputPassword1" placeholder="Stok Barang" value="">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>