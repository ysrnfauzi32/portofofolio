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
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody id="target">
                 
            </tbody>
            </table>

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
                url   : '<?php echo base_url()?>index.php/pengajaran/file/ambildata',
                dataType : 'json',
                success : function(data){
                    console.log(data)
                    var baris = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        baris += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama_file+'</td>'+
                                '<td>'+data[i].deskripsi+'</td>'+
                                '<td>'+data[i].file+'</td>'+
                                '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id_file+')">Ubah</a><a href="#form" class="btn btn-danger" onclick="hapusdata('+data[i].id_file+')">Hapus</a></td'+
                                '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }