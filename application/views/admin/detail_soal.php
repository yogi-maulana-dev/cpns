<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Detail soal</h4>
</div>
<div class="modal-body">
	<p>
		<?php echo nl2br($soal[0]->pertanyaan);?>
		<?php if($soal[0]->gambar_soal!=""){ ?>
		<div id="gambar_soal">
			<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_soal')"><i class="fa fa-trash"></i></a><br>
			
			<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_soal;?>" class="img img-responsive img-thumbnail">
		</div>
		<?php } ?>
	</p>
	<ol type="A">
		<li>
			<?php echo nl2br($soal[0]->opt_a);?>
			<?php if($soal[0]->gambar_a!=""){ ?>
			<div id="gambar_a">
				<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_a')"><i class="fa fa-trash"></i></a>
				
				<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_a;?>" class="img img-responsive img-thumbnail">
			</div>
			<?php } ?>
		</li>
		<li>
			<?php echo nl2br($soal[0]->opt_b);?>
			<?php if($soal[0]->gambar_b!=""){ ?>
			<div id="gambar_b">
				<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_b')"><i class="fa fa-trash"></i></a>
				
				<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_b;?>" class="img img-responsive img-thumbnail">
			</div>
			<?php } ?>
		</li>
		<li>
			<?php echo nl2br($soal[0]->opt_c);?>
			<?php if($soal[0]->gambar_c!=""){ ?>
			<div id="gambar_c">
				<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_c')"><i class="fa fa-trash"></i></a>
				
				<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_c;?>" class="img img-responsive img-thumbnail">
			</div>
			<?php } ?>
		</li>
		<li>
			<?php echo nl2br($soal[0]->opt_d);?>
			<?php if($soal[0]->gambar_d!=""){ ?>
			<div id="gambar_d">
				<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_d')"><i class="fa fa-trash"></i></a>
				
				<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_d;?>" class="img img-responsive img-thumbnail">
			</div>
			<?php } ?>
		</li>
		<li>
			<?php echo nl2br($soal[0]->opt_e);?>
			<?php if($soal[0]->gambar_e!=""){ ?>
			<div id="gambar_e">
				<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gambar_e')"><i class="fa fa-trash"></i></a>
				
				<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gambar_e;?>" class="img img-responsive img-thumbnail">
			</div>
			<?php } ?>
		</li>
	</ol>
	<div>
		<label>Pembahasan:</label><br>
		<?php echo nl2br($soal[0]->pembahasan);?>
		<?php if($soal[0]->gbr_pembahasan!=""){ ?>
		<div id="gambar_e">
			<a href="#" onclick="hapus_opt('<?php echo $soal[0]->id;?>','gbr_pembahasan')"><i class="fa fa-trash"></i></a>
			
			<img src="<?php echo base_url().'assets/uploads/'.$soal[0]->gbr_pembahasan;?>" class="img img-responsive">
		</div>
		<?php } ?>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<script type="text/javascript">
	function hapus_opt(id,column){
    if(confirm("Hapus "+column+"?")){
      $.ajax({
        url : '<?php echo base_url()."admin/hapus_gbr_soal?id="?>'+id+'&column='+column,
        type : 'get',
        success:function(){
        	$("#"+column).hide();
        },
        error:function(x){
          console.log(x);
        }
      })
    }
  }
</script>