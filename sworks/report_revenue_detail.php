<!DOCTYPE html>
<html>
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
include "configuration/config_alltotal.php";
etc();encryption();session();connect();head();body();timing();
pagination();
?>

<?php
if (!login_check()) {
?>
<meta http-equiv="refresh" content="0; url=logout" />
<?php
exit(0);
}
?>
<div class="wrapper">
<?php
theader();
menu();
?>

<?php
$decimal ="0";
$a_decimal =",";
$thousand =".";
?>
            <div class="content-wrapper">
                <section class="content-header">
</section>
                <section class="content">
                  <div class="row">
                    <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-aqua">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px">Rp </sup><?php echo number_format($data12, $decimal, $a_decimal, $thousand).',-'; ?></h3>
                                               <p>Total Semua</p>
                                           </div>
                                           <div class="icon">
                                             <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                                   <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-yellow">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px">Rp </sup><?php echo number_format($data22, $decimal, $a_decimal, $thousand).',-'; ?></h3>
                                               <p>Total Tahun Ini</p>
                                           </div>
                                           <div class="icon">
                                              <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-green">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px">Rp </sup><?php echo number_format($data32, $decimal, $a_decimal, $thousand).',-'; ?></h3>
                                               <p>Total Bulan Ini</p>
                                           </div>
                                           <div class="icon">
                                               <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                                   <!-- ./col -->
                                   <div class="col-lg-3 col-xs-6">
                                       <!-- small box -->
                                       <div class="small-box bg-red">
                                           <div class="inner">
                                               <h3><sup style="font-size: 20px">Rp </sup><?php echo number_format($data42, $decimal, $a_decimal, $thousand).',-'; ?></h3>
                                               <p>Total Hari Ini</p>
                                           </div>
                                           <div class="icon">
                                               <i class="ion ion-stats-bars"></i>
                                           </div>

                                       </div>
                                   </div>
                  </div>
                    <div class="row">
					  <div class="col-lg-12">

              <!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "report_revenue"; // halaman
$dataapa = "Revenue"; // data
$tabeldatabase = "bayar"; // tabel database
$chmod = $chmenu9; // Hak akses Menu
$forward = mysql_real_escape_string($tabeldatabase); // tabel database
$forwardpage = mysql_real_escape_string($halaman); // halaman
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$mulai = $_POST['tgl_mulai'];
$sampai = $_POST['tgl_akhir'];
$jenis = $_POST['jenis'];

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>

<!-- SETTING STOP -->
<?php
$sx="SELECT nama from data";
$hx=mysqli_query($conn,$sx);
$rx=mysqli_fetch_assoc($hx);
$titlex=$rx['nama'];
?>
<textarea id="printing-css" style="display:none;">.no-print{display:none}.table,.table tr td,.table tr th{border:2px solid #333;border-collapse:collapse;padding:3px;}thead{background:#eee;}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<div id="editor"></div>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript">
function printDiv(elementId) {
var a = document.getElementById('printing-css').value;
        var b = document.getElementById('tabel1').innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + 'h3,h4{margin:0px}</style>' + '<center><h3>LAPORAN PENJUALAN PER PERIODE</h3><br><h3>APOTEK <span style="text-transform: uppercase";><?= $titlex ?></span></h3><br><?php if($mulai!=null && $sampai != ""){ ?> <h4><?= tanggal_indo($mulai) ?> s.d. <?= tanggal_indo($sampai) ?></h4> <?php } ?></center>' + b + '<br><br><br><div style="text-align:left;margin-left:550px;">Jember, <?= tanggal_indo(date("yy-m-d")) ?><br><br><br><span style="text-align:center"><?= $_SESSION["nama"] ?></span></div>';
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>


<!-- BREADCRUMB -->


<!-- BOX HAPUS BERHASIL -->

         <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);
</script>


       <!-- BOX INFORMASI -->
    <?php
if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
} else {
?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php
}
?>

<?php
if ($chmod >= 1 || $_SESSION['jabatan'] == 'admin') {
?>

<?php
if($tahun == null || $tahun == "" ){
        $sqla="SELECT no, COUNT( * ) AS totaldata FROM $forward where nota IN (SELECT nota FROM transaksimasuk)";
      }else{
        $sqla="SELECT no, COUNT( * ) AS totaldata FROM $forward where nota IN (SELECT nota FROM transaksimasuk) and tglbayar LIKE '$tahun-$bulan-%'";
      }
		$hasila=mysqli_query($conn,$sqla);
		$rowa=mysqli_fetch_assoc($hasila);
		$totaldata=$rowa['totaldata'];

?>


          <div class="box" id="tabel1">

            <div class="box-header">
            <h3 class="box-title no-print">Data <?php echo $dataapa ?>  <span class="no-print label label-default" id="no-print"><?php echo $totaldata; ?></span>
					</h3>
<div id="title-print"></div>
			  <form method="post">
			  <br/>
                    <div class="col-lg-12 col-md-12 col-sm-12 no-print" id="no-print">
  <div class="col-lg-3 col-md-3 col-sm-3"> Periode
                  <input placeholder="Tanggal Mulai" type="text" value="<?= $mulai  ?>" class="form-control dates" name="tgl_mulai">

</div>

  <div class="col-lg-3 col-md-3 col-sm-3"><br>
                  <input placeholder="Tanggal Sampai" type="text" value="<?= $sampai  ?>" class="form-control dates" name="tgl_akhir" onchange="this.form.submit()">

</div>
<div class="col-lg-3 col-md-3 col-sm-3"><br>
                <select class="form-control select2" style="width: 100%;" name="jenis" onchange="this.form.submit()" required>
                  <option>Jenis Barang</option>
      <option <?= ($jenis=='Obat') ? 'selected' : '' ?> value='Obat'>Obat</option>
      <option <?= ($jenis=='Kosmetik') ? 'selected' : '' ?> value='Kosmetik'>Kosmetik</option>
        
                </select>

</div>

  <div class="col-lg-3 col-md-3 col-sm-3">
  <?php
    if($jenis!=null&$jenis!="")
    {
        $sqlb="select sum(hargaakhir) as total from transaksimasuk join bayar on bayar.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where  tglbayar BETWEEN  '$mulai' and '$sampai' and jenis_barang='$jenis' order by transaksimasuk.no desc";
    }
    else{
        $sqlb="SELECT SUM(total) AS total FROM $forward WHERE nota IN (SELECT nota FROM transaksimasuk) AND tglbayar BETWEEN  '$mulai' and '$sampai'";
    }
$hasila=mysqli_query($conn,$sqlb);
$rowa=mysqli_fetch_assoc($hasila);
$totalrevenue=$rowa['total'];


if($bulan == '1'){
  $namabulan = 'Januari';
}else if($bulan == '2'){
  $namabulan = 'Februari';
}else if($bulan == '3'){
  $namabulan = 'Maret';
}else if($bulan == '4'){
  $namabulan = 'April';
}else if($bulan == '5'){
  $namabulan = 'Mei';
}else if($bulan == '6'){
  $namabulan = 'Juni';
}else if($bulan == '7'){
  $namabulan = 'Juli';
}else if($bulan == '8'){
  $namabulan = 'Agustus';
}else if($bulan == '9'){
  $namabulan = 'September';
}else if($bulan == '10'){
  $namabulan = 'Oktober';
}else if($bulan == '11'){
  $namabulan = 'November';
}else if($bulan == '12'){
  $namabulan = 'Desember';
}
   ?>

<?php if($mulai != null || $mulai != ""){ ?>

                      <div class="well well-sm">
                    <?php echo 'Revenue pada bulan <b>'.$namabulan.'</b> '.$tahun.' sejumlah <b>Rp '.number_format($totalrevenue, $decimal, $a_decimal, $thousand).',-</b>'; ?>
                </div>
                  <?php }else{} ?>
</div>
                </div>

				  </form>


            </div>

                                <!-- /.box-header -->
                                  <!-- /.Paginasi -->
                                  <?php
     error_reporting(E_ALL ^ E_DEPRECATED);
     if(isset($_POST['jenis']) && $jenis!=null && $jenis!="" && $jenis!="Jenis Barang"){
     $sql    = "select * from transaksimasuk join $forward on $forward.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where jenis_barang='$jenis' order by transaksimasuk.no desc";
     }else{
     $sql    = "select * from transaksimasuk join $forward on $forward.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode order by transaksimasuk.no desc";    
     }
     $result = mysqli_query($conn, $sql);
     $rpp    = 15;
     $reload = "$halaman"."?pagination=true";
     $page   = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

     if ($page <= 0)
         $page = 1;
     $tcount  = mysqli_num_rows($result);
     $tpages  = ($tcount) ? ceil($tcount / $rpp) : 1;
     $count   = 0;
     $i       = ($page - 1) * $rpp;
     $no_urut = ($page - 1) * $rpp;
 ?>
                             <div class="box-body table-responsive">
                                     <table class="table table-hover ">
                                         <thead>
                                             <tr>
                                               <th>No</th>
                                               <th>No Nota</th>
                                               <th>Tanggal</th>
                                               <th>Nama Barang</th>
                                               <th>Jenis</th>
                                               <th>Total Pembayaran</th>
                                               <th>Uang Bayar</th>
                                               <th>Uang Kembali</th>
                                               <th>Cc</th>
                         <?php	if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                                                 
                         <?php }else{} ?>
                                             </tr>
                                         </thead>
                                           <?php
     error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
     $bulan = $_POST['bulan'];
     $tahun = $_POST['tahun'];

     if ($mulai != null && $mulai != "") {

         if ($_SERVER["REQUEST_METHOD"] == "POST") {

               if(isset($_POST['tgl_akhir'])){
         if(isset($_POST['jenis']) && $jenis!=null && $jenis!="" && $jenis!="Jenis Barang")
         {
             
             $query1= "select * from transaksimasuk join $forward on $forward.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where jenis_barang='$jenis' and  tglbayar BETWEEN  '$mulai' and '$sampai' order by transaksimasuk.no limit $rpp";
             
         }else{
             $query1= "select * from transaksimasuk join $forward on $forward.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where tglbayar BETWEEN  '$mulai' and '$sampai' order by transaksimasuk.no limit $rpp";
         }
         $hasil = mysqli_query($conn,$query1);
         $no = 1;
         while ($fill = mysqli_fetch_assoc($hasil)){
           ?>
                      <tbody>
 <tr>
   <td><?php echo ++$no_urut;?></td>
   <td><?php  echo mysql_real_escape_string($fill['nota']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['tglbayar']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['nama']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['jenis_barang']); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['total'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['bayar'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['kembali'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['kasir']); ?></td>
   
   <?php	if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
     
  <?php } else {}?>

    </tr><?php
           ;
         }

         ?>
                   </tbody></table>
  <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>
      <?php
       }

     }

   } else {
     while(($count<$rpp) && ($i<$tcount)) {
       mysqli_data_seek($result,$i);
       $fill = mysqli_fetch_array($result);
       ?>
                       <tbody>
 <tr>
   <td><?php echo ++$no_urut;?></td>
   <td><?php  echo mysql_real_escape_string($fill['nota']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['tglbayar']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['nama']); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['jenis_barang']); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['total'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['bayar'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string(number_format($fill['kembali'], $decimal, $a_decimal, $thousand).',-'); ?></td>
   <td><?php  echo mysql_real_escape_string($fill['kasir']); ?></td>
   
   <?php	if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
     
  <?php } else {}?>

     </tr>
       <?php
       $i++;
       $count++;
     }

     ?>
                   </tbody></table>
           <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>
   <?php } ?>

                                </div>
                                 <!-- /.box-body -->

                             </div>

               <?php } else {} ?>

              <div align="right"  style="padding-right:15px"  class="no-print" id="no-print" >
             <div align="left" class="no-print" id="no-print"> <a target="_blank" href="./print_detail?jenis=<?= $jenis ?>&mulai=<?= $mulai ?>&sampai=<?= $sampai ?>" class="btn btn-default btn-flat" name="cetak" value="cetak"><span class="glyphicon glyphicon-print"></span></a><?php echo " "; ?>
               <a onclick="window.location.href='configuration/config_export?forward=revenue&search=&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>'" class="btn btn-default btn-flat" name="cetak" value="export excel"><span class="glyphicon glyphicon-save-file"></span></a></div> <br/>
             </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                    </div>
                    <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
           <?php footer();?>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <script>
$.widget.bridge('uibutton', $.ui.button);
</script>
      <script src="dist/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="dist/plugins/morris/morris.min.js"></script>
      <script src="dist/plugins/sparkline/jquery.sparkline.min.js"></script>
      <script src="dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="dist/plugins/knob/jquery.knob.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
      <script src="dist/plugins/daterangepicker/daterangepicker.js"></script>
      <script src="dist/plugins/datepicker/bootstrap-datepicker.js"></script>
      <script src="dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <script src="dist/plugins/fastclick/fastclick.js"></script>
      <script src="dist/js/app.min.js"></script>
      <script src="dist/js/demo.js"></script>
  <script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="dist/plugins/fastclick/fastclick.js"></script>
  <script src="dist/plugins/select2/select2.full.min.js"></script>
  <script src="dist/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="dist/plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
  //Initialize Select2 Elements
  $(".select2").select2();

  //Datemask dd/mm/yyyy
  $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
  //Datemask2 mm/dd/yyyy
  $("#datemask2").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
  //Money Euro
  $("[data-mask]").inputmask();

  //Date range picker
  $('#reservation').daterangepicker();
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
  //Date range as a button
  $('#daterange-btn').daterangepicker(
      {
        ranges: {
          'Hari Ini': [moment(), moment()],
          'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Akhir 7 Hari': [moment().subtract(6, 'days'), moment()],
          'Akhir 30 Hari': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
          'Akhir Bulan': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
  );

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });

 $('.datepicker').datepicker({
  dateFormat: 'yyyy-mm-dd'
});


  $(".dates").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });

 //Date picker 2
 $('#datepicker2').datepicker('update', new Date());

  $('#datepicker2').datepicker({
    autoclose: true
  });

 $('.datepicker2').datepicker({
  dateFormat: 'yyyy-mm-dd'
});


  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
  });
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  //Colorpicker
  $(".my-colorpicker1").colorpicker();
  //color picker with addon
  $(".my-colorpicker2").colorpicker();

  //Timepicker
  $(".timepicker").timepicker({
    showInputs: false
  });
});
</script>
</body>
</html>
