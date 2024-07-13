<section class="content-header">
  <h1>
    Pengaturan
    <small>CAT</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Pengaturan</li>
  </ol>
</section>
<section class="content">
     <!-- SELECT2 EXAMPLE -->
  <div class="row">
    <div class="col-md-4">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Pendidikan</h3>
          <div class="box-tools pull-right">
            <button type="button" onclick="tambah_param()" class="btn btn-box-tool">
              <i class="fa fa-plus"></i>
            </button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table">
            <?php 
              foreach($pendidikan as $pend){
                echo '<tr>
                  <td>'.$pend->ket.'<div class="pull-right"><a class="btn" onclick="delete_param('.$pend->id.')"><i class="fa fa-trash"></i></a></div></td>
                </tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Bidang/tipe soal</h3>
          <div class="box-tools pull-right">
            <button type="button" onclick="tambah_param()" class="btn btn-box-tool">
              <i class="fa fa-plus"></i>
            </button>     
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table">
            <?php 
              foreach($bidang as $pend){
                echo '<tr>
                  <td>'.$pend->ket.'<div class="pull-right"><a class="btn" onclick="delete_param('.$pend->id.')"><i class="fa fa-trash"></i></a></div></td>
                </tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Kategori soal/peserta</h3>
          <div class="box-tools pull-right">
            <button type="button" onclick="tambah_param()" class="btn btn-box-tool">
              <i class="fa fa-plus"></i>
            </button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table">
            <?php 
              foreach($kategori as $pend){
                echo '<tr>
                  <td>'.$pend->ket.'<div class="pull-right"><a class="btn" onclick="delete_param('.$pend->id.')"><i class="fa fa-trash"></i></a></div></td>
                </tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
 
 </section>
 
 <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="#" id="formparam" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Parameter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" name="param" required="">
              <option value="">Pilih</option>
              <option value="bidang_soal">BIDANG SOAL</option>
              <option value="kategori">KATEGORI</option>
              <option value="PENDIDIKAN">PENDIDIKAN</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="ket" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

 <script>
  function tambah_param(){
    $("#exampleModalCenter").modal('toggle');
  }

  $("#formparam").on("submit",function(){
    if(confirm("Anda yakin?")){
      $.ajax({
        url : '<?php echo base_url()?>admin/simpan_param',
        type : 'post',
        data : $(this).serialize(),
        success:function(){
          $("#exampleModalCenter").modal('hide');
          $("#exampleModalCenter").on('hidden.bs.modal',function(){
            eksekusi_controller('admin/pengaturan');
          });
        }
      })
    }

    return false;
  })

  function delete_param(id){
    if(confirm("Hapus?")){
      $.ajax({
        url : '<?php echo base_url()?>admin/hapus_param/'+id,
        type : 'get',
        success:function(){
          eksekusi_controller('admin/pengaturan');
        }
      })
    }
  }
</script>
