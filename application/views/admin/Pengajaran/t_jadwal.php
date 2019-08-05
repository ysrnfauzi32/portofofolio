<h2>Tambah Jadwal Perkuliahan</h2>
<hr>
<div class="col-sm-8">
	<form class="form-horizontal" method="post">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Hari</label>
		<div class="col-sm-6">
		  <select class="form-control" name="hari">
			<option>--Hari--</option>
			<?php
				$datahari=array(
					'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu'
				);
				
				foreach($datahari as $hari){
			?>
			<option value="<?php echo $hari;?>"><?php echo $hari;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('hari');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Jam</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control" name="jam" id="inputPassword3" placeholder="Format: 00:00-00:00" value="<?php echo set_value('jam');?>">
		  <i><?php echo form_error('jam');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Materi</label>
		<div class="col-sm-5">
		  <select class="form-control" name="materi">
			<option>--Materi--</option>
			<?php foreach($datamateri as $materi){?>
			<option value="<?php echo $materi->materi;?>"><?php echo $materi->materi;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('materi');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Ruangan</label>
		<div class="col-sm-5">
		  <select class="form-control" name="ruangan">
			<option>--Ruangan--</option>
			<?php foreach($dataruangan as $ruangan){?>
			<option value="<?php echo $ruangan->ruangan;?>"><?php echo $ruangan->ruangan;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('ruangan');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-3 control-label">Pengajar</label>
		<div class="col-sm-5">
		  <select class="form-control" name="pengajar">
			<option>--Penganjar--</option>
			<?php foreach($datapengajar as $pengajar){?>
			<option value="<?php echo $pengajar->pengajar;?>"><?php echo $pengajar->nama_pengajar;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('pengajar');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
		  <button type="submit" class="btn btn-default">Simpan</button>
		</div>
	  </div>
	</form>
</div>