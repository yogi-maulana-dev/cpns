<style type="text/css">
	#lati{
		width: 500px;
	padding: 5px;
	margin: 2px;
	}
</style>
<script src="<?php echo base_url()?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<?php
echo $map['js'];
echo $map['html'];
?>
<br>
<div>
	<input type="text" id="lati" name="latlng" width="500">
	<button onclick="add()">Ambil Koordinat</button>
</div>
<script>
	function add()
	{
		window.opener.refreshFromPopup($("#lati").val());
		window.close();
	}
</script>