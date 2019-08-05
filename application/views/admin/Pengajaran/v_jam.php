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
                <small><?php echo $title ?></small>
                <div class="pull-right"><a href="#form" class="btn btn-sm btn-success" data-toggle="modal" onclick="submit('tambah')"><span class="fa fa-plus"></span><?php echo $tombol ?></a></div>
            </h1>
        </div>
    <div class="card-body">
        <div id="reload">
        <table class="table table-striped" id="mydata" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jam Mulai</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody id="target">
                 
            </tbody>
            </table>
            <div class="modal fade" id="form" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1>Tambah Jam Pengajaran</h1>
                        </div>
                        <center><font color="red"><p id="pesan"></p></font></center>
                        <table class="table">
                            <div class="form-group">
                                <label class="control-label col-md-3">Jam Pengajaran</label>
                                <div class="col-md-9">
                                    <input name="jam" class="form-control" maxlength="11" placeholder="Format: hh:mm-hh:mm (contoh : 07:00-08:30)" type="text"><input type="hidden" name="id_jam" value="">
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
                url   : '<?php echo base_url()?>index.php/pengajaran/jam/ambildata',
                dataType : 'json',
                success : function(data){
                    console.log(data)
                    var baris = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        baris += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].jam+'</td>'+
                                '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id_jam+')">Ubah</a><a href="#form" class="btn btn-danger" onclick="hapusdata('+data[i].id_jam+')">Hapus</a></td'+
                                '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }

        function tambahdata(){
            var jam=$("[name='jam']").val();
    
            $.ajax({
                type : 'POST',
                data : 'jam='+jam,
                url : '<?php echo base_url()?>index.php/pengajaran/jam/tambahdata',
                dataType : 'json',
                success: function(hasil){
                    $("#pesan").html(hasil.pesan);

                    if(hasil.pesan==''){
                        $("#form").modal('hide').trigger('click');
                        ambilData();
                        reload_table();

                        $("[name='jam']").val('');
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
                    data : 'id_jam='+x,
                    url : '<?php echo base_url().'index.php/pengajaran/jam/ambilId' ?>',
                    dataType : 'json',
                    success: function(hasil){
                        $('[name="id_jam"]').val(hasil[0].id_jam);
                        $('[name="jam"]').val(hasil[0].jam);
                    } 
                });
            }
        }

        function ubahdata(){
            var id_jam=$("[name='id_jam']").val();
            var jam=$("[name='jam']").val();
            
            $.ajax({
                type: 'POST',
                data : 'id_jam='+id_jam+'&jam='+jam,
                url : '<?php echo base_url().'index.php/pengajaran/jam/ubahdata' ?>',
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

        function hapusdata(id_jam){
            var tanya = confirm('Apakah anda yakin akan menghapus data?');

            if(tanya){
                $.ajax({
                    type: 'POST',
                    data: 'id_jam='+id_jam,
                    url: '<?php echo base_url().'index.php/pengajaran/jam/hapusdata' ?>',
                    success: function(){
                        ambilData();
                    }
                })
            }
        }
</script> 
</body>
</html>