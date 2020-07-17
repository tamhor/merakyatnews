<?php
session_start();
if(!(isset($_SESSION['username']))){
	
	// remove all session varibles
	session_unset();
	// destroy the session
	session_destroy();
	header("Location: login");
}
    include "configuration/config_etc.php";
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
    include 'configuration/config_connect.php';
    include "configuration/config_chmod.php";
    $mulai = $_GET['mulai'];
    $sampai = $_GET['sampai'];
    $jenis = $_GET['jenis'];
    $decimal ="0";
    $a_decimal =",";
    $thousand =".";
    $sx="SELECT nama from data";
    $hx=mysqli_query($conn,$sx);
    $rx=mysqli_fetch_assoc($hx);
    $titlex=strtoupper($rx['nama']);
    if($jenis!=null && $jenis!="" && $jenis!="Jenis Barang"){
        if($mulai!=null&&$mulai!=""){
            $sql = "select * from transaksimasuk join bayar on bayar.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where jenis_barang='$jenis' and  tglbayar BETWEEN  '$mulai' and '$sampai' order by transaksimasuk.no";
        }else{
            $sql = "select * from transaksimasuk join bayar on bayar.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where jenis_barang='$jenis' order by transaksimasuk.no desc";
        }
    }else{
        if($mulai!=null&&$mulai!=""){
            $sql = "select * from transaksimasuk join bayar on bayar.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode where tglbayar BETWEEN  '$mulai' and '$sampai' order by transaksimasuk.no desc";
        }else{
            $sql = "select * from transaksimasuk join bayar on bayar.nota=transaksimasuk.nota join (select jenis_barang,kode from barang) jb on transaksimasuk.kode=jb.kode order by transaksimasuk.no desc";    
        }
    }
    $result = mysqli_query($conn, $sql);
	require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$content = '<html><head><style>.table{width:50%;margin-left:0px}.table,.table tr td,.table tr th{border:2px solid #333;border-collapse:collapse;padding:3px;}thead{background:#eee;}</style></head><body>
<div style="text-align:center;margin-top:40px;margin-bottom:50px;">
<h3 style="margin:5px;">LAPORAN PENJUALAN PER PERIODE</h3>
<h3 style="margin:5px;">APOTEK '.$titlex.'</h3>';
if($mulai!=null&&$mulai!=""){
$content.='<h4 style="margin:5px;">'.tanggal_indo($mulai).' s.d. '.tanggal_indo($sampai).'</h4>';
}
$content.='</div>
<table class="table table-hover">
     <thead backcolor="#333333">
         <tr>
           <th>Tanggal</th>
           <th>No Nota</th>
           <th style="width:50%;">Nama</th>
           <th>Jenis</th>
           <th>Jumlah</th>
           <th>Harga</th>
           <th>Total</th>
        </tr>
    </thead>
    <tbody>';
        $total=0;
        while ($fill = mysqli_fetch_assoc($result)){
        $total+=$fill['hargaakhir'];
        $content.='<tr>
           <td>'.mysql_real_escape_string($fill["tglbayar"]).'</td>
           <td>'.mysql_real_escape_string($fill["nota"]).'</td>
           <td style="width:50%;">'.mysql_real_escape_string($fill["nama"]).'</td>
           <td>'.mysql_real_escape_string($fill["jenis_barang"]).'</td>
           <td style="text-align:center;">'.mysql_real_escape_string($fill["jumlah"]).'</td>
           <td style="width:40%;">'.mysql_real_escape_string(number_format($fill["harga"], $decimal, $a_decimal, $thousand).",-").'</td>
           <td style="width:40%;">'.mysql_real_escape_string(number_format($fill["hargaakhir"], $decimal, $a_decimal, $thousand).",-").'</td>
        </tr>';
        }
    $content.='<tr><td colspan="6" style="text-align:center;;"><b>Total</b></td><td>'.mysql_real_escape_string(number_format($total, $decimal, $a_decimal, $thousand).",-").'</td></tr></tbody>
</table>
    <div style="margin-left:520px;margin-top:45px;">
        Jember, '.tanggal_indo(date("yy-m-d")).'
        <p style="margin-top:55px;">
        '.$_SESSION["nama"].'</p>
    </div></body></html>
	';
	$html2pdf->writeHTML($content);
    $html2pdf->output();
    // echo "<script>window.close();</script>";
?>