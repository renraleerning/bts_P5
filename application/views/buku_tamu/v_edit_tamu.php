<?php
	$this->load->view('include/v_header');
	$this->load->view('include/v_sidebar');
?>
<style>
.drop-box{  
	border: 7px solid rgb(34, 45, 50);  
	cursor: pointer;
	margin: 5px auto 30px auto;
	position: relative;
	text-align: center;
	width: 300px;
	background-color: rgb(34, 45, 50);
	z-index: 1;
}
.drop-box p{
	width: 90%;
	display: block;
	color: #fff;
	margin: 3.3rem auto;
}

.drop-box:before {
	content: " ";
	position: absolute;
	z-index: 2;
	top: 1px;
	left: 1px;
	right: 1px;
	bottom: 1px;
	border: 2px dashed rgba(243, 237, 237, 0.32); 
}
#upl{
	display: none;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Data Tamu
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url()?>data_buku_tamu">Daftar Tamu</a></li>
			<li class="active">Edit Data Tamu</li>
		</ol>
	</section>
	<?php
        $tamu=$data_tamu->row_array();
    ?>
	<!-- Main content -->
	<section class="content">
		<form action="<?php echo base_url().'data_buku_tamu/update_tamu'?>" method="post" enctype="multipart/form-data">
		     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" style="display: none">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 ">
						<div class="box box-success">
				            <div class="box-body">
				            	<input type="hidden" name="xkode" value="<?php echo $tamu['id'];?>">
								<div class="box-header with-border">
					            	<span class="box-title"><i class="fa fa-check-square"></i> Identitas Tamu</span>
					            </div>
								<div class="form-group">
									<label for="xnama">Nama Tamu:</label>
									<input type="text" class="form-control" id="xnama" name="xnama" value="<?php echo $tamu['nama'];?>" placeholder="Masukkan Nama" required>
								</div>
				            	<div class="form-group">
				            		<label for="xalamat">Alamat:</label>
				            		<textarea class="form-control" id="xalamat" name="xalamat" placeholder="alamat" required><?php echo $tamu['alamat'];?></textarea>
				            	</div>
				            	<div class="form-group">
				            		<label for="xjenkel">Jenis Kelamin:</label>
				            		<select class="form-control" id="xjenkel" name="xjenkel">
				            			<?php 
				            				$gender = $tamu['jenkel']; 
				            			?>
				            			<option value="" <?php if($gender == "") echo "selected";?> ></option>
				            			<option value="L" <?php if($gender == "L") echo "selected";?> >Laki-laki</option>
				            			<option value="P" <?php if($gender == "P") echo "selected";?> >Perempuan</option>
				            		</select>
				            	</div>
				            	<div class="form-group">
				            		<label for="xnohp">No Whatsapp:</label>
				            		<input type="text" class="form-control" id="xnohp" name="xnohp" value="<?php echo $tamu['no_hp'];?>"placeholder="No WA" required>
				            	</div>
				            	<div class="box-header with-border">
				            		<span class="box-title"><i class="fa fa fa-arrow-circle-right"></i> Tujuan</span>
				            	</div>
				            	<div class="form-group">
				            		<label for="xtujuan">Bagian:</label>
				            		<select class="form-control" id="xtujuan" name="xtujuan"  required>
				            		</select>
				            	</div>
				            	<!-- <div class="form-group">
				            		<label for="xnamatujuan">Nama Pegawai Yang Dituju:</label>
				            		<select class="form-control" id="xnamatujuan" name="xnamatujuan" required></select>
				            	</div> -->
				            	<input type="hidden" name="xnamatujuan" value="-">
				            	<div class="form-group">
				            		<label for="xkeperluan">Keperluan Bertamu:</label>
				            		<textarea class="form-control" id="xkeperluan" name="xkeperluan"  placeholder="Mengajukan Kontra memori Banding" required><?php echo $tamu['keperluan'];?></textarea>
				            	</div>
				            </div>
				            <!-- /.box-body -->
				        </div>
					</div>
					<div class="col-md-6 ">
						<div class="info-box">
							<span class="info-box-icon"><i class="fa fa-refresh"></i></span>
							<div class="info-box-content text-center" style="padding:20px;margin: 0 auto">
								<button type="submit" class="btn btn-lg btn-success" >
									<span class="fa fa-save"></span>
									Update
								</button>
								<a href="<?php echo base_url('data_buku_tamu')?>" type="button" class="btn btn-lg btn-default"> Batal</a>
							</div>
						</div>
						<div class="box box-success">
						    	<div class="box-header with-border">
						    		<i class="fa fa-credit-card"></i>
						    		<h3  class="box-title">Kartu Visitor</h3><br>
						    		<small>Focuskan kursor pada input dan scan kartu rfid</small>
						    	</div>
						    	<div class="box-body">
						    		<div id="xrfid0">
						    			<div class="form-group">
						    				<label class="control-label" for="item_xrfid">ID Kartu Visitor:</label>
						    				<input type="number" class="form-control" name="item_xrfid[]" placeholder="focuskan kursor pada input dan scan kartu nfc" >
						    			</div>
						    		</div>
						    		<div id="xrfid1"></div>
						    		<div class="form-group">
						    			<div class="col-xs-12">
						    				<div class="text-right">
						    					<a href="javascript:_remove_more_rfid(0);" class="btn btn-xs btn-danger">
						    						<b><i class="fa fa-minus-square"></i> Hapus</b>
						    					</a>
						    					&nbsp;
						    					<a href="javascript:_add_more_rfid(0);" class="btn btn-primary btn-xs">
						    						<b><i class="fa fa-plus-square"></i> Tambah</b>
						    					</a>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						    	<!-- /.box-body -->
						</div> <!-- /.box -->
				        <div class="box box-success">
				        	<div class="box-header with-border">
				        		<i class="fa fa-file"></i>
				        		<h3 class="box-title">Lampiran File</h3>
				        		<br>
				            	<small>Sertakan file jika tamu membawa softcopy file</small>
				        	</div>
				        	<div class="box-body">
				            	<ul class="products-list product-list-in-box">
					        	<?php 
					            	$result_lamp=$lampiran->result();
					            	$no_lamp = 0;
					            	foreach ($result_lamp as $row) {
					            ?>
				            		<div id="filelamp<?php echo $no_lamp?>" >
				            			<li class="item">
				            				<div class="product-img text-right">
				            					<?php 
				            					$filenya = base_url()."assets/file_lampiran/".$row->file;
				            					?>

				            					<i class='fa fa-file-pdf-o' aria-hidden='true'style="font-size:3em"></i> 
				            				</div>
				            				<div class="product-info">
				            					<a href="javascript:void(0)" class="product-title">#<?php echo $row->id;?>
				            						<span class="label label-warning pull-right" onclick="hapus_lamp(event,<?php echo $row->id;?>, <?php echo $no_lamp;?>)"><i class="fa fa-times"></i> Hapus</span>
				            					</a>
				            					<span class="product-description">
				            						<a href="<?php echo base_url()?>assets/file_lampiran/<?php echo $row->file?>"  target="_blank">
				            							<?php echo $row->file?>
				            						</a>
				            					</span>
				            				</div>
				            			</li>
					        		</div>
						        <?php 
						        	$no_lamp++;
						        	}
						        ?>
					        	</ul>
					            <div id="xfile0" >
					            	<div class="form-group">
					            		<input type="file" name="item_xnamalampiran[]" class="btn btn-default col-sm-12 " onChange="checkExtension(this.value)">
					             	</div>
					             </div>
					        	<div id="xfile1"></div>
					        	<div class="form-group">
					             	<label class="control-label">&nbsp;</label>
					             	<hr />
					             	<div class="col-xs-12">
						             	<div class="text-right">
							             	<a href="javascript:_remove_more(0);" class="btn btn-xs btn-danger">
							             		<b><i class="fa fa-minus-square"></i> Hapus</b>
							             	</a>
							             	&nbsp;
						             		<a href="javascript:_add_more(0);" class="btn btn-primary btn-xs">
						             			<b><i class="fa fa-plus-square"></i> Tambah</b>
						             		</a>
						             	</div>
					             	</div>
					             </div>
				            </div>
				            <!-- /.box-body -->
				        </div>
				        <!-- /.box -->
				        <div class="box box-success">
							<div class="box-header with-border">
								<i class="fa fa-camera"></i>
				            	<h3 class="box-title">Foto Tamu</h3>
				            </div>
				            <div class="box-body">
				            	<div class="form-group">
				            		<?php
				            			if(!empty($tamu['photo'])){
				            				$foto = base_url()."assets/images/foto_tamu/".$tamu['photo'];
				            				$data_foto =  base64_encode(file_get_contents($foto));
				            				$src = 'data:image/jpeg;base64,'.$data_foto;
				            				
				            				$isidropbox = '<img src="'.$src.'" style="width:100%">';
				            				$atributHapus = "";
				            			}else{
				            				$isidropbox ='<p><i class="fa fa-camera" aria-hidden="true"></i><br>Ambil Foto Tamu </p>';
				            				$atributHapus = "hidden";
				            				$src = "";
				            			}
				            				
				            		?>
				            		<div class="column-small-12 padd0 align-center">
				            			<div id="ambil_foto_tamu" class="drop-box" onclick="ambil_foto()">
				            				<?php echo $isidropbox;?>
				            			</div>
				            			<div class="text-center" id="hapus_foto_temporer" <?php echo $atributHapus;?>>
				            				<i class="fa fa-times btn btn-danger" onclick="hapus_foto_temporer_tamu()" aria-hidden="true" > Hapus Foto Tamu</i> 
				            			</div>
				            		</div>

				            		<input type="hidden" class="form-control" id="xnama_file_foto" value="<?php echo $src;?>" name="xnama_file_foto"  /> 
				            	</div>
				            </div>
				        </div>
				        <!-- /.box -->
					</div>
					<!-- /.col-6 -->
		    	</div>
		    </div>
		    <div class="col-md-4">
				
				
		        
		    </div>
		    <!-- /.col -->
		</form>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="modal-foto" class="modal fade" style="z-index: 99999 !important;" >
	<div class="modal-dialog" style="width:670px">
		<div class="modal-content">
			<div class="modal-body">
				<div id="webcam"></div>
				<div id="nama_file_foto"></div>
				<select id="webcamdevice" class="form-control"></select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning pull-left" id="foto_ulang" onclick="foto_ulang()">Reset Cam</button>
				<button type="button" class="btn btn-success" id="ambil_foto">ambil foto</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalHapusFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Foto</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_hapus_foto" value="<?php echo $tamu['id'];?>"/>
				<input type="hidden" id="foto" value="<?php echo $tamu['photo'];?>" >
				<p>Apakah Anda yakin akan mengganti Foto dari <br><b><?php echo $tamu['nama'];?></b> ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-flat" id="hapus_foto">Ya Hapus</button>
			</div>
		</div>
	</div>
</div>

<?php
	$this->load->view('include/v_footer');
?>
<script src="<?php echo base_url();?>assets/webcamjs/webcam.js"></script>
<script type="text/javascript">
	loadpegawai();
    function loadpegawai(){
		$.ajax({
			url: '<?php echo base_url()?>data_buku_tamu/loadpegawai',
			type: 'get',
			success: function(response){
				$('#xnamatujuan').html(response);
				$('#xnamatujuan').val(<?php echo $tamu['id'];?>);

			}
		});
	}
	loadbagian();
	function loadbagian(){
		$.ajax({
			url: '<?php echo base_url()?>data_buku_tamu/loadbagian',
			type: 'get',
			success: function(response){
				$('#xtujuan').html(response);
				$('#xtujuan').val("<?php echo $tamu['tujuan'];?>");

			}
		});
	}
	function hapus_lamp(e, id, lamp_id){
		e = e || window.event;
		e.preventDefault();
		$.ajax({
			type : "POST",
			url:"<?php echo base_url()?>data_buku_tamu/hapus_lampiran",
			data:{id:id,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
			datatype : "json",
			cache:false,
			success:function(msg) {
				location.reload();
				document.getElementById("filelamp"+lamp_id).innerHTML="";
				lamp_id --;	
			}
		});
	}
	function hapus_foto_temporer_tamu(){
		<?php 
			if(!empty($tamu['photo'])) {
		?>
			$("#ModalHapusFoto").modal('show');
		<?php	
			}else{
		?>
			$("#modal-foto").modal('show');
		
		<?php		
			}
		?>
	}
	
	//AMBIL FOTO 
	function ambil_foto(){
		<?php 
			if(!empty($tamu['photo'])) {
		?>
			$("#ModalHapusFoto").modal('show');
		<?php	
			}else{
		?>
			$("#modal-foto").modal('show');
		
		<?php		
			}
		?>
	}

	$('#ModalHapusFoto').on('shown.bs.modal', function () {
		
		$("#hapus_foto").on('click', function (e) {
			e.preventDefault();
			var isitext = "<p><i class=\"fa fa-camera\" aria-hidden=\"true\"></i><br>Ambil Foto Tamu </p>";
			$("#ambil_foto_tamu").html(isitext);
			$('#xnama_file_foto').val("");
			
			$("#ModalHapusFoto").modal('hide');
			id = $("#id_hapus_foto").val();
			foto = $("#foto").val();
			if(id != "") {
		        $.ajax({
    				type : "POST",
    				url:"<?php echo base_url()?>data_buku_tamu/hapus_foto",
    				data:{id:id,foto:foto,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
    				dataType: "json",
    				cache:false,
    				success:function(msg) {
    					if(msg.pesan == "success"){
    					    location.reload();
    					}else{
    						$.toast({
    							heading: 'Error',
    							text: "Foto tidak dapat dihapus.",
    							showHideTransition: 'slide',
    							icon: 'error',
    							hideAfter: false,
    							position: 'bottom-right',
    							bgColor: '#FF4859'
    						});
    						$("#modal-foto").modal('show');
    					} 
    						
    				}
    			});
	    
			}else{
			    $("#modal-foto").modal('show');
			}
		
		});
	});
	//Foto Ulang 
	function foto_ulang(){
		Webcam.reset();
		$("#ambil_foto").show();
		$('#webcam' ).val("");
		Webcam.set('constraints', {
			width: 640,//width: 320,//width: 640,
			height: 480,//height: 250,//height: 480,
			image_format: 'jpeg',
			jpeg_quality: 100,
			fps: 50,
			'constraints': {
				width: 640,
				height: 480,
				facingMode:'environment' 
			}
		});
		Webcam.attach( '#webcam' );
	} 

	var cameras = new Array();
	navigator.mediaDevices.enumerateDevices().then(function(devices) {
		var i = 0;
		devices.forEach(function(device) {
			if(device.kind=== "videoinput"){
				cameras[i]= device.deviceId;
				$("#webcamdevice").append("<option value='"+ i +"'> Kamera "+ i +"</option>");
				i
			}
		});
	});
	$('#modal-foto').on('shown.bs.modal', function (e) {
		Webcam.set({
			width: 640,//width: 320,//width: 640,
			height: 480,//height: 250,//height: 480,
			image_format: 'jpeg',
			jpeg_quality: 100,
			video: true,
			'constraints': {
				width: 640,
				height: 480,
				facingMode:'environment' 
			}
	
		});
		Webcam.attach( '#webcam' );
	
		$("#webcamdevice").change(function (){
			if ($("#webcamdevice").val() == 0 ) {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'environment' 
					}
				}); 

				Webcam.attach( '#webcam' );

			} else if($("#webcamdevice").val() == 1 ) {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'users' 
					}
				}); 
				Webcam.attach( '#webcam' );
			} else {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 640,
					height: 480,//height: 250,//height: 480,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'environment' 
					}
				}); 
				Webcam.attach( '#webcam' );
			}
		});
		$("#ambil_foto").click(function () { 
			$("#foto_ulang").show();
			Webcam.snap( function(data_uri) {
				image = "";
				image = data_uri;
				
				$('#webcam').html('<img src="'+data_uri+'" />');
				$('#ambil_foto_tamu').html('<img src="'+image+'" style="width:100%" />');
				$('#xnama_file_foto').val(image);
				$('#hapus_foto_temporer').show();
			});
	
		});
		
		
		$('#modal-foto').on('hidden.bs.modal', function () {
			Webcam.reset();
		});
	});
	

	//cek extension
	var exts = "jpg|jpeg|gif|png|bmp|tiff|pdf|doc|rtf|docx|xls|xlsx"; 
	function checkExtension(value) {
		if(value=="")return true;
		var re = new RegExp("^.+\.("+exts+")$","i");
		if(!re.test(value)) {
			alert("Extesi file Tidak di ijinkan: \n" + value + "\n\nHanya File dengan extensi berikut yang diperbolehkan: "+exts.replace(/\|/g,',')+" \n\n");
			return false;
		}
		return true;
	}
	
	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Silahkan browse/pilih minimal 1 file dokumen');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
	//TOMBOL tambah file 
	var next_id=0;
	var max_number =10;
	
	function _add_more() {    
		if (next_id>=max_number) {
			alert("File lampiran telah mencapai batas maximum dari "+max_number+" files!");
			return;
		}
		
		next_id=next_id+1;
		var next_div=next_id+1;
		var txt = "<div class=\"form-group\">";
		txt += "<input type=\"file\" name=\"item_xnamalampiran[]\" class=\"btn btn-default col-sm-12\" onChange=\"checkExtension(this.value)\"></div>";
		txt += '<div id=\"xfile'+next_div+'\"></div>';            
		document.getElementById("xfile" + next_id ).innerHTML = txt;
	}
	
	function _remove_more() {
		document.getElementById("xfile" + next_id ).innerHTML="";
		
		next_id --;
	}
	
	//TOMBOL tambah file 
	var next_id_rfid=0;
	var max_number_rfid =50;
	
	function _add_more_rfid() {
		if (next_id_rfid>=max_number) {
			alert("File lampiran telah mencapai batas maximum dari "+max_number_rfid+" files!");
			return;
		}
		
		next_id_rfid=next_id_rfid+1;
		var next_div_rfid=next_id_rfid+1;

		            			
		var txt = "<div class=\"form-group\">";
		txt += "<label class=\"control-label\" for=\"item_xrfid\">ID Kartu Visitor:</label>";
		txt += "<input type=\"number\" class=\"form-control\" name=\"item_xrfid[]\" placeholder=\"Focuskan kursor pada Kotak input dan scan kartu RFID\" required></div>";
		txt += '<div id=\"xrfid'+next_div_rfid+'\"></div>';            
		document.getElementById("xrfid" + next_id_rfid ).innerHTML = txt;
	}
	
	function _remove_more_rfid() {
		document.getElementById("xrfid" + next_id_rfid ).innerHTML="";		
		next_id_rfid --;
	}
	


    </script>



 </body>
 </html>