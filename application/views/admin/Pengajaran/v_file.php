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
        <div class="col-sm-4 col-md-offset-4">
        <h4>Upload File</h4>
            <form class="form-horizontal" id="submit">
                <div class="form-group">
                    <input type="text" name="nama_file" class="form-control" placeholder="Judul">
                </div>
                <div class="form-group">
                    <textarea type="text" name="nama_file" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                </div>
            </form> 
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\jquery\jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\bootstrap\js\bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\datatables\jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets\vendor\datatables\dataTables.bootstrap4.min.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>index.php/pengajaran/file/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Berhasil.");
                   }
                 });
            });
        

    });
    
</script>
</body>
</html>