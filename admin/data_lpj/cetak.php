<?php ob_start(); ?>

<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
        }

        .table td {

            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "koneksi.php";
  
   
    $query = "select tb_data_honor.*, tb_datapelajaran.id_pegawai, tb_datapelajaran.mapel from  tb_data_honor
    inner join tb_datapelajaran on  tb_data_honor.idhonor = tb_datapelajaran.id_pegawai";

     
  
    ?>

<img src="../assets/images/logo2.png" align=left height="120" width="90">
    <img src="../assets/images/logo3.png" align=right height="120" width="90">

    <h2 style="text-align:center; margin-top: 20px;"> PEMERINTAHAN KOTA BANJARMASIN </h2>
    <h2 style="text-align:center; margin-top: 20px;"> DINAS PENDIDIKAN </h2>

    <h3 style="text-align:center; margin-top: 20px;">Alamat : Jl. Kapten Piere Tendean No.29, RT.40, Gadang, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70231</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA GURU HONOR</h3>

    <hr />
    <br />
    
    <table class="table" align=center width="700" border="1" style="margin-top: 15px; text-align:center;">
        <tr>
            <th width="50">No</th>
            <th width="50">ID</th>
            <th width="145">NUPTK</th>
			<th width="150">Nama</th>
			<th width="100">Tempat Lahir</th>
			<th width="100">Tanggal Lahir</th>
			<th width="100">agama</th>
			<th width="100">Kecamatan</th>
		    <th width="100">no_hp</th>
            <th width="100">Jenis PTK</th>
		    <th width="100">Mata Pelajaran</th>
            <th width="150">Nama Sekolah</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              
                
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['idhonor'] . "</td>";				
                echo "<td>" . $data['nuptk'] . "</td>";
                
                echo "<td>" . $data['nama'] . "</td>";
            
                
                echo "<td>" . $data['tempat_lahir'] . "</td>";
                echo "<td>" . $data['tgl_lahir'] . "</td>";
                echo "<td>" . $data['agama'] . "</td>";
                echo "<td>" . $data['kecamatan'] . "</td>";
                echo "<td>" . $data['no_hp'] . "</td>";
                echo "<td>" . $data['jenisptk'] . "</td>";
                echo "<td>" . $data['mapel'] . "</td>";
                echo "<td>" . $data['nama_sekolah'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>

    <br />
	<br />
	<br />
	<table align="right" width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Banjarmasin, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Kepala Dinas Pendidikan<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Nuryadi, S.Pd.,MA</u><br> NIP. 19670413198804 1 004</td>
        </tr>
    </table>
    <script>
		window.print();
	</script>
</body>

</html>
<?php

?>