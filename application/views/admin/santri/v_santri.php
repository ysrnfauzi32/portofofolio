<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/sb-admin-2.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/datatables/jquery.dataTables.js'?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
    <script type="text/javascript" ></script>
</head>
<body>
<div class="container">
    <!-- Page Heading -->
        <div class="row">
            <h1 class="page-header">Data 
                <small>Santri</small>
                <div class="pull-right"><a href="#form" class="btn btn-sm btn-success" data-toggle="modal" onclick="submit('tambah')"><span class="fa fa-plus"></span><?php echo $tombol ?></a>
                    <a href="<?php echo base_url().'index.php/santri/export_excel' ?>" class="btn btn-sm btn-primary"><?php echo $export ?></a></div>
            </h1>
        </div>
    <div class="card-body">
        <div id="reload">
        <table class="table table-striped" id="mydata" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody id="target">
                 
            </tbody>
            </table>
            <div class="modal fade" id="form" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1>Tambah Santri</h1>
                        </div>
                        <center><font color="red"><p id="pesan"></p></font></center>
                        <table class="table">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-9">
                                    <input name="nama_santri" placeholder="Nama Lengkap" class="form-control" type="text"><input type="hidden" name="id_santri" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kelas</label>
                                <div class="col-md-9">
                                    <select name="kelas" class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-9">
                                    <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <tr>
                                <td>
                                    <button type="button" id="btn-tambah" class="btn btn-primary" onclick="tambahdata()">Tambah Data</button>
                                    <button type="button" id="btn-ubah" class="btn btn-primary" onclick="ubahdata()">Ubah Data</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-danger" >Tutup</button>
                                </td>
                            </tr>
                        </table>
                         
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
  

 
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\jquery\jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\bootstrap\js\bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\datatables\jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\datatables\dataTables.bootstrap4.min.js'?>"></script>
<script type="text/javascript">

    ambilData();
      
        function ambilData(){
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>index.php/santri/ambildata',
                dataType : 'json',
                success : function(data){
                    console.log(data)
                    var baris = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        baris += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama_santri+'</td>'+
                                '<td>'+data[i].kelas+'</td>'+
                                '<td>'+data[i].jenis_kelamin+'</td>'+
                                '<td>'+data[i].alamat+'</td>'+
                                '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id_santri+')">Ubah</a><a href="#form" class="btn btn-danger" onclick="hapusdata('+data[i].id_santri+')">Hapus</a></td'+
                                '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }


        function tambahdata(){
            var nama_santri=$("[name='nama_santri']").val();
            var kelas=$("[name='kelas']").val();
            var jenis_kelamin=$("[name='jenis_kelamin']").val();
            var alamat=$("[name='alamat']").val();

            $.ajax({
                type : 'POST',
                data : 'nama_santri='+nama_santri+'&kelas='+kelas+'&jenis_kelamin='+jenis_kelamin+'&alamat='+alamat,
                url : '<?php echo base_url().'index.php/santri/tambahdata' ?>',
                dataType : 'json',
                success: function(hasil){
                    $("#pesan").html(hasil.pesan);

                    if(hasil.pesan==''){
                        $("#form").modal('hide').trigger('click');
                        ambilData();
                        reload_table();

                        $("[name='nama_santri']").val('');
                        $("[name='kelas']").val('');
                        $("[name='jenis_kelamin']").val('');
                        $("[name='alamat']").val('');
                    }

                }
            });
        }

        function submit(x){
            if (x=='tambah'){
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
            }else{
                $('#btn-tambah').hide();
                $('#btn-ubah').show();

                $.ajax({
                    type : "POST",
                    data : 'id_santri='+x,
                    url : '<?php echo base_url().'index.php/santri/ambilId' ?>',
                    dataType : 'json',
                    success: function(hasil){
                        $('[name="id_santri"]').val(hasil[0].id_santri);
                        $('[name="nama_santri"]').val(hasil[0].nama_santri);
                        $('[name="kelas"]').val(hasil[0].kelas);
                        $('[name="jenis_kelamin"]').val(hasil[0].jenis_kelamin);
                        $('[name="alamat"]').val(hasil[0].alamat);  
                    } 
                });
            }
        }

        function ubahdata(){
            var id_santri=$("[name='id_santri']").val();
            var nama_santri=$("[name='nama_santri']").val();
            var kelas=$("[name='kelas']").val();
            var jenis_kelamin=$("[name='jenis_kelamin']").val();
            var alamat=$("[name='alamat']").val();

            $.ajax({
                type: 'POST',
                data : 'id_santri='+id_santri+'&nama_santri='+nama_santri+'&kelas='+kelas+'&jenis_kelamin='+jenis_kelamin+'&alamat='+alamat,
                url : '<?php echo base_url().'index.php/santri/ubahdata' ?>',
                dataType : 'json',
                success: function(hasil){
                    $("#pesan").html(hasil.pesan);

                    if(hasil.pesan==''){
                        $("#form").modal('hide').trigger('click');
                        ambilData();
                    }
                }
            })
        }

        function hapusdata(id_santri){
            var tanya = confirm('Apakah anda yakin akan menghapus data?');

            if(tanya){
                $.ajax({
                    type: 'POST',
                    data: 'id_santri='+id_santri,
                    url: '<?php echo base_url().'index.php/santri/hapusdata' ?>',
                    success: function(){
                        ambilData();
                    }
                })
            }
        }
</script> 
</body>
</html>