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
 
   
    $query = "select tb_anggota.id_pegawai,
    inner join tb_datapelajaran on  tb_pegawai.idpegawai = tb_datapelajaran.id_pegawai";
   
  
  
    ?>

<img src="../assets/images/logo2.png" align=left height="120" width="90">
    <img src="../assets/images/logo3.png" align=right height="120" width="90">

    <h2 style="text-align:center; margin-top: 20px;"> DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI </h2>
    <h2 style="text-align:center; margin-top: 20px;"> GERAKAN PRAMUKAGUGUS DEPAN 02.375 – 02.376 </h2>
    <h2 style="text-align:center; margin-top: 20px;"> UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN </h2>

    <h3 style="text-align:center; margin-top: 20px;">Sekretariat : Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA ANGGOTA PRAMUKA UNISKA</h3>  
  
    <hr>
    <table class="table" align=center width="670" border="1" style="margin-top: 10px; text-align:center;">
        <tr>
            <th width="30">No</th>
            <th width="80">ID</th>
            <th width="80">NAR</th>
			<th width="50">Nama</th>
            
            <th width="50">TTL</th>
           
            <th width="100">Alamat</th>
            <th width="50">NPM</th>
            <th width="50">Fakultas</th>
            <th width="50">Jurusan</th>
			<th width="50">NO Tlpn</th>
			<th width="70">Status</th>
			<th width="50">Keterangan</th>
			<th width="100">Foto</th>
		   

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              
                
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
				echo "<td>" . $data['id_anggota'] . "</td>";				
                echo "<td>" . $data['nar'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
              
                echo "<td>" . $data['ttl'] . "</td>";
              
                echo "<td>" . $data['alamat'] . "</td>";
                echo "<td>" . $data['npm'] . "</td>";
                echo "<td>" . $data['fakultas'] . "</td>";
                echo "<td>" . $data['jurusan'] . "</td>";
                echo "<td>" . $data['no_telp'] . "</td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "<td>" . $data['keterangan'] . "</td>";
                echo "<td>" . $data['foto'] . "</td>";
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
            <td align="center">Ketua Dewan Racana<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Muhammad Jayadi</u><br> NAR </td>
        </tr>
    </table>
    <script>
		window.print();
	</script>
</body>

</html>
<?php

?>