<?php include 'session_login.php';


// memsukan file session login, header,navbar dan db.php
include 'header.php';
include 'navbar.php';
include 'sanitasi.php';
include 'db.php';


$query_otoritas_pelanggan = $db->query("SELECT pelanggan_tambah, pelanggan_hapus,pelanggan_edit FROM otoritas_master_data WHERE id_otoritas = '$_SESSION[otoritas_id]'");
$data_otoritas_pelanggan = mysqli_fetch_array($query_otoritas_pelanggan);


 ?>




<div class="container"> <!-- start of container -->
<h3><b>DATA MARKETPLACE</b></h3> <hr>
<!-- Trigger the modal with a button -->

<?php 

    if ($data_otoritas_pelanggan['pelanggan_tambah'] > 0){

    	echo '<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> MARKETPLACE</button>';

    }

 ?>

<br>
<br>


<!-- Modal tambah data -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Marketplace</h4>
      </div>
    <div class="modal-body">
<form role="form">
		<div class="form-group">
					
					<label> Kode Marketplace </label><br>
					<input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" autocomplete="off" required="" >
					

					<label> Nama Marketplace </label><br>
					<input type="text" name="nama" id="nama_pelanggan" class="form-control" autocomplete="off" required="" >

					<input type="hidden" name="tgl_lahir" id="tgl_lahir" class="form-control" autocomplete="off" required="" >

					<label> Nomor Telp </label><br>
					<input type="text" name="nomor" id="nomor" class="form-control" autocomplete="off" required="" >
					

					<label> E Mail </label><br>
					<input type="text" name="email" id="email" class="form-control" autocomplete="off" required="" >
					

					<label> Wilayah </label><br>
					<input type="text" name="wilayah" id="wilayah" class="form-control" autocomplete="off" required="" >

					<label> Flafon </label><br>
					<input type="text" name="flafon" id="flafon" class="form-control" autocomplete="off" placeholder="Flafon (Jumlah Maximal Piutang)" required="" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" >

						<label> Flafon Usia Piutang</label><br>
					<input type="text" name="flafon_usia" id="flafon_usia" class="form-control" autocomplete="off" placeholder="Flafon Usia Piutang" required=""   >

					<label> Level Harga </label><br>
					<select type="text" name="level_harga" id="level_harga" class="form-control" required="" >

					<option value="">--SILAKAN PILIH--</option>
					<option>Level 1</option>
					<option>Level 2</option>
					<option>Level 3</option>


					</select>
					
					<br>
					<button type="submit" id="submit_tambah" class="btn btn-success">Submit</button>

		</div>
</form>

				
					<div class="alert alert-success" style="display:none">
					<strong>Berhasil!</strong> Data berhasil Di Tambah
					</div>

 	</div><!-- end of modal body -->

					<div class ="modal-footer">
					<button type ="button"  class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
	</div>
	</div>

</div><!-- end of modal buat data  -->


<!-- modal import-->
<div id="my_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">



    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import Data Excell</h4>
      </div>

      <div class="modal-body">
   
   
   <form enctype="multipart/form-data" action="proses_import_pelanggan.php?" method="post" >
    <div class="form-group">
        <label> Import Data Excell</label>
        <input type="file" id="file_import" name="import_excell" required=""> 
        <br>
        <br>

        <!-- membuat tombol submit -->
        
         
    </div>
   <button type="submit" name="submit" value="submit" class="btn btn-info">Import</button>
   </form>
   
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data berhasil Di Hapus
  </div>
 

     </div>

    <div class="modal-footer">

    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    </div>
    </div>

  </div>
</div>

<!--end modal import-->



  <!-- Modal Hapus data -->
<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">



    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Data Marketplace</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Nama Marketplace :</label>
     <input type="text" id="data_pelanggan" class="form-control" readonly=""> 
     <input type="hidden" id="id_hapus" class="form-control" > 
    </div>
   
   </form>
   
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data berhasil Di Hapus
  </div>
 

     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_jadi_hapus"> <span class='glyphicon glyphicon-ok-sign'> </span>Ya</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"> <span class='glyphicon glyphicon-remove-sign'> </span>Batal</button>
      </div>
    </div>

  </div>
</div><!-- end of modal hapus data  -->


<!-- Modal edit data -->
<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data MarketPlace</h4>
      </div>
      <div class="modal-body">
  <form role="form">
					<div class="form-group">
					<label> Kode MarketPlace </label><br>
					<input type="text" name="kode_edit" id="edit_kode" class="form-control" autocomplete="off" required="" >
						
					<label> Nama MarketPlace </label><br>
					<input type="text" name="nama_edit" id="edit_nama" class="form-control" autocomplete="off" required="" >

					<input type="hidden" name="tgl_lahir" id="edit_tgl_lahir" class="form-control" autocomplete="off" required="" >

					<label> Nomor Telp </label><br>
					<input type="text" name="nomor" id="edit_nomor" class="form-control" autocomplete="off" required="" >					

					<label> E Mail </label><br>
					<input type="text" name="email" id="edit_email" class="form-control" autocomplete="off" required="" >
					

					<label> Wilayah </label><br>
					<input type="text" name="wilayah" id="edit_wilayah" class="form-control" autocomplete="off" required="" >

					<label> Flafon </label><br>
					<input type="text" name="edit_flafon" id="edit_flafon" class="form-control" autocomplete="off" placeholder="Flafon (Jumlah Maximal Piutang)" required="" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" >

					<label> Flafon Usia Piutang</label><br>
					<input type="text" name="edit_flafon_usia" id="edit_flafon_usia" class="form-control" autocomplete="off" placeholder="Flafon Usia Piutang" required="" >

					<label> Level Harga </label><br>
					<select type="text" name="edit_level_harga" id="edit_level_harga" class="form-control" required="" >

					<option value="">--SILAKAN PILIH--</option>
					<option>Level 1</option>
					<option>Level 2</option>
					<option>Level 3</option>


					</select>
					

    			    <input type="hidden" class="form-control" id="id_edit">
    
   </div>
   
   
   					<button type="submit" id="submit_edit" class="btn btn-success">Submit</button>
   					</div>
  </form>
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data Berhasil Di Edit
  </div>
 

    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!-- end of modal edit data  -->


<style>

tr:nth-child(even){background-color: #f2f2f2}


</style>


<div class="table-responsive"><!-- membuat agar ada garis pada tabel, disetiap kolom -->
<span id="table_baru">
<table id="table_pelanggan" class="table table-bordered table-sm">
		<thead>
			
			<th style='background-color: #4CAF50; color: white'> Kode Marketplace </th>
			<th style='background-color: #4CAF50; color: white'> Nama Marketplace </th>
			<th style='background-color: #4CAF50; color: white'> Flafon </th>
			<th style='background-color: #4CAF50; color: white'> Flafon Usia Piutang</th>
			<th style='background-color: #4CAF50; color: white'> Level Harga </th>
			<th style='background-color: #4CAF50; color: white'> Nomor Telp </th>
			<th style='background-color: #4CAF50; color: white'> E-mail </th>
			<th style='background-color: #4CAF50; color: white'> Wilayah</th>

<?php 




    if ($data_otoritas_pelanggan['pelanggan_hapus'] > 0){

			echo "<th style='background-color: #4CAF50; color: white'> Hapus </th>";

		}
?>


<?php 


    if ($data_otoritas_pelanggan['pelanggan_edit']  > 0){
    	echo "<th style='background-color: #4CAF50; color: white'> Edit </th>";
    }

 ?>
			
			
		</thead>
		
		
	</table>
	</span>

</div>
</div> <!--end of container-->


<!-- DATATABLE AJAX -->
    <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
        var dataTable = $('#table_pelanggan').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"tabel-pelanggan.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#table_pelanggan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          },
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
              $(nRow).attr('class','tr-id-'+aData[10]+'');
            },
        });
      });
    </script>
<!-- / DATATABLE AJAX -->

<script type="text/javascript">

               $(document).ready(function(){
               $("#kode_pelanggan").blur(function(){
               var kode_pelanggan = $("#kode_pelanggan").val();

              $.post('cek_kode_pelanggan.php',{kode_pelanggan:$(this).val()}, function(data){
                
                if(data == 1){

                    alert ("Kode Pelanggan Sudah Ada");
                    $("#kode_pelanggan").val('');
                    $("#kode_pelanggan").focus();
                }
                else {
                    
                }
              });
                
               });
               });

</script>



        <script type="text/javascript">
                             
				$(document).ready(function(){

					//fungsi untuk menambahkan data
					 $("#submit_tambah").click(function(){

					 			var flafon = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah($("#flafon").val()))));
					 			if(flafon == '')
					 			{
					 				flafon = 0;
					 			}
								var kode_pelanggan = $("#kode_pelanggan").val();
								var nama_pelanggan = $("#nama_pelanggan").val();
								var level_harga = $("#level_harga").val();
								var no_telp = $("#nomor").val();
								var e_mail = $("#email").val();
								var tgl_lahir = $("#tgl_lahir").val();
								var wilayah = $("#wilayah").val();
								var flafon_usia = $("#flafon_usia").val();
																
								if (kode_pelanggan == "") {

									alert("Kode Marketplace Harus Diisi");
								}

								else if (nama_pelanggan == "") {

									alert("Nama Marketplace Harus Diisi");
								}

								else if (wilayah == "") {

									alert("Wilayah Harus Diisi");
								}

								else if (level_harga == "") {

									alert("Level Harga Harus Dipilih");
								}
								else {

									$.post('prosespelanggan.php', {flafon:flafon,kode_pelanggan:kode_pelanggan,nama_pelanggan:nama_pelanggan,level_harga:level_harga,no_telp:no_telp,e_mail:e_mail,tgl_lahir:tgl_lahir,wilayah:wilayah,flafon_usia:flafon_usia}, function(data){
											
											if (data != "") {
											$("#kode_pelanggan").val('');
											$("#nama_pelanggan").val('');
											$("#level_harga").val('');
											$("#tgl_lahir").val('');
											$("#nomor").val('');
											$("#email").val('');
											$("#wilayah").val('');
											
											
											
											$(".alert").show('fast');
												var table_pelanggan = $('#table_pelanggan').DataTable();
      											table_pelanggan.draw();											
											setTimeout(tutupalert, 2000);
											$(".modal").modal("hide");
											}
									
									
									});

								}
	
								
					});
								
					// end fungsi tambah 

					//fungsi hapus data 
								  $(document).on('click', '.btn-hapus', function (e) {
								var nama_pelanggan = $(this).attr("data-pelanggan");
								var id = $(this).attr("data-id");
								$("#data_pelanggan").val(nama_pelanggan);
								$("#id_hapus").val(id);
								$("#modal_hapus").modal('show');
								
								
								});
								
								
								$("#btn_jadi_hapus").click(function(){
								
								var id = $("#id_hapus").val();
								
								$.post("hapus_pelanggan.php",{id:id},function(data){
								if (data == "sukses") {
								$("#table_baru").load('tabel-pelanggan.php');
								$("#modal_hapus").modal('hide');
								
								}
								
								
								});
								
								});
					// end fungsi hapus data

				    //fungsi edit data 
							  $(document).on('click', '.btn-edit', function (e) {
								
								$("#modal_edit").modal('show');
								var nama = $(this).attr("data-pelanggan");
								var kode = $(this).attr("data-kode");
								var tanggal   = $(this).attr("data-tanggal");
								var nomor = $(this).attr("data-nomor");
								var email   = $(this).attr("data-email");
								var wilayah = $(this).attr("data-wilayah");
								var flafon = $(this).attr("data-flafon");
								var flafon_usia = $(this).attr("data-flafon-usia");
								var level_harga = $(this).attr("data-level-harga");
								var id   = $(this).attr("data-id");

								$("#edit_nama").val(nama);
								$("#edit_kode").val(kode);
								$("#edit_flafon").val(tandaPemisahTitik(flafon));
								$("#edit_flafon_usia").val(flafon_usia);
								$("#edit_tgl_lahir").val(tanggal);
								$("#edit_nomor").val(nomor);
								$("#edit_email").val(email);
								$("#edit_wilayah").val(wilayah);
								$("#edit_level_harga").val(level_harga);
								$("#id_edit").val(id);
								
								
								});
								
								$("#submit_edit").click(function(){
								var nama = $("#edit_nama").val();

					var flafon = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah($("#edit_flafon").val()))));
 					if(flafon == '')
			 			{
			 				flafon = 0;
			 			}
								var kode = $("#edit_kode").val();
								var nomor = $("#edit_nomor").val();
								var tanggal = $("#edit_tgl_lahir").val();
								var email = $("#edit_email").val();
								var wilayah = $("#edit_wilayah").val();
								var level_harga = $("#edit_level_harga").val();
								var id   = $("#id_edit").val();
								var flafon_usia = $("#edit_flafon_usia").val();

								if (nama == ""){
									alert("Nama Marketplace Harus Diisi");
								}
								else if (kode == ""){
									alert("Kode Marketplace Harus Diisi");
								}
								else if (nomor == ""){
									alert("Nomor Telpon Harus Diisi");
								}
								else if (tanggal == ""){
									alert("Tanggal Harus Diisi");
								}
								else if (wilayah == ""){
									alert("Wilayah Harus Diisi");
								}

								else if (level_harga == "") {

									alert("Level Harga Harus Dipilih");
								}
								else {
								$.post("update_pelanggan.php",{flafon:flafon,nama_pelanggan:nama,kode_pelanggan:kode,no_telp:nomor,tgl_lahir:tanggal,e_mail:email,wilayah:wilayah,level_harga:level_harga,id:id,flafon_usia:flafon_usia},function(data){

								

								var table_pelanggan = $('#table_pelanggan').DataTable();
      							table_pelanggan.draw();	

								$("#modal_edit").modal('hide');
								
								
								
								});
								

								}


								});
								
								
								
					 //end function edit data
								
								$('form').submit(function(){
								
								return false;
								});
								
								});
								
								
								
								
								function tutupalert() {
								$(".alert").hide("fast")
								}

			

        </script>


<?php 
//memasukkan file footer.php
include 'footer.php'; 
?>
