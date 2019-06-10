<script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
<script language="JavaScript">
	function selectAll(source) {
	checkboxes = document.getElementsByName('nama[]');
	for(var i in checkboxes)
		checkboxes[i].checked = source.checked;
	}
</script>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Data
	<small>Pansus (Panitia Khusus)</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<?= $this->session->flashdata('gagal') ?>
<?= $this->session->flashdata('sukses') ?>
<div class="m-heading-1 border-green m-bordered">
	<h3>Catatan</h3>
		<p>Silahkan hapus data sekiranya sudah banyak (usahakan yang ada di tabel adalah data Pansus yang masih aktif), rekapan tetap ada di Laporan data Pansus.</p>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<a class="btn blue btn-outline" href="<?php echo site_url('Master/tambah_pansus')?>">Tambah Data</a>
			</div>
			<div class="portlet-body">
				<table class="table table-bordered table-striped" id="tbl">
					<thead>
					<tr>
						<th style="text-align: center" width="5%">#</th>
						<th style="text-align: center">Nama Pansus</th>
						<th style="text-align: center">Tanggal Pembentukan</th>
						<th style="text-align: center">Anggota</th>
						<th style="text-align: center">Status</th>
						<th width="7%">Aksi</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						foreach($data_pansus as $content)
						{
							foreach ($content as $key => $value ) {
							$$key=$value;
						}
						$hasil = '';
						?>
							<tr class="gradeX">
								<td style="text-align: center"><?= $no++."."; ?></td>
								<td style="text-align: center;"><?php echo $nama_pansus; ?></td>
								<td style="text-align: center;"><?php echo date('d-m-Y', strtotime($awal_periode)); ?></td>
								<td style="text-align: center;"><?php echo $jumlah_anggota.' Orang.'; ?></td>
								<td style="text-align: center;"><?php
									$tanggal_berakhir  = strtotime($akhir_periode);
									$tanggal_awal  = strtotime($awal_periode);
									$sekarang    = time(); // Waktu sekarang
									$diff   = $sekarang - $tanggal_berakhir;
									$diff2   = $sekarang - $tanggal_awal;
									$hasil = floor($diff / (60 * 60 * 24)); // dalam hitungan hari
									$hasil2 = floor($diff2 / (60 * 60 * 24)); // dalam hitungan hari
									if($hasil2>0){
										if($hasil>0){
											echo '<span class="label label-sm label-info"> Sudah selesai </span>';
										}
										else{
											echo '<span class="label label-sm label-warning"> Masih Berjalan </span>';
										}
									}
									else{
										echo '<span class="label label-sm label-success"> Coming Soon </span>';
									}
								?></td>
								<td>
									<div class="btn-group">
										<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="<?php echo site_url('Master/jabatan_pansus/'.$kode_pansus)?>">
													<i class="icon-eye"></i> Detail Data </a>
											</li>
											<li>
												<a class="view_data" data-toggle="modal" data-target="#ubah" id='<?= $id."_".$kode_pansus; ?>'>
													<i class="icon-wrench"></i> Ubah Data </a>
											</li>
											<li class="divider"> </li>
											<li>
												<a href="<?php echo site_url('Master/hapus_pansus/'.$kode_pansus)?>" onclick="return confirm('Anda yakin?')">
													<i class="icon-trash"></i> Hapus Data </a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<script>
					$(function () {
						$("#tbl").DataTable({
						"paging": true,
						"lengthChange": true,
						"searching": true,
						"ordering": true,
						"info": true,
						"autoWidth": true
						});
					});
				</script>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Ubah Data Pansus</h4>

      </div>

      <div class="modal-body">

       

        <div class="box box-primary">

       
          <form class="form-horizontal" method="post" action="<?php echo base_url()."Master/ubah_pansus"; ?>">
                <div class="box-body" id="data_detail"> 
                
                                            
            

          </form>

        </div>

      </div>

      

    </div>

  </div>

</div>

    <script>
    // ini menyiapkan dokumen agar siap grak :)
    $(document).ready(function(){
        // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
        $('.view_data').click(function(){
            // membuat variabel id, nilainya dari attribut id pada button
            // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
            var id = $(this).attr("id");
            var kata = id.split("_");
            // memulai ajax
            $.ajax({
                url: '<?php echo base_url(); ?>Master/ajax_pansus', // set url -> ini file yang menyimpan query tampil detail data gambar
                method: 'post',     // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                data: {id:kata[0],kode_pansus:kata[1]},      
                success:function(data){     // kode dibawah ini jalan kalau sukses
                    $('#data_detail').html(data);   // mengisi konten dari -> <div class="modal-body" id="data_gambar">
                    $('#ubah').modal("show");    // menampilkan dialog modal nya
                }
            });
        });
    });
	</script>