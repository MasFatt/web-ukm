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
  
    $query = "select tb_datapelajaran.*,tb_datasekolah.npsn,tb_datasekolah.namasekolah from tb_datapelajaran
	inner join tb_datasekolah on tb_datapelajaran.npsn =tb_datasekolah.npsn ";

      
   
    ?>

<img src="../assets/images/logo2.png" align=left height="120" width="90">
    <img src="../assets/images/logo3.png" align=right height="120" width="90">

    <h2 style="text-align:center; margin-top: 20px;"> PEMERINTAHAN KOTA BANJARMASIN </h2>
    <h2 style="text-align:center; margin-top: 20px;"> DINAS PENDIDIKAN </h2>

    <h3 style="text-align:center; margin-top: 20px;">Alamat : Jl. Kapten Piere Tendean No.29, RT.40, Gadang, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70231</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA AJARAN</h3>
   
    <hr>
    <table class="table" align=center width="670" border="1" style="margin-top: 10px; text-align:center;">
        <tr>
            <th width="50">No</th>
           
           
             <th width="200">Mata Pelajaran</th>
             <th width="150">kurikulum</th>
            <th width="200">nama sekolah</th>
            <th width="150">Nama Guru</th>
            
            <th width="100">tgl awal</th>
            <th width="100">tgl akhir</th>
           

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              
                
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
               
               
						
                echo "<td>" . $data['mapel'] . "</td>";
                
                echo "<td>" . $data['kurikulum'] . "</td>";
                echo "<td>" . $data['namasekolah'] . "</td>";
        
                
                echo "<td>" . $data['nama'] . "</td>";
              
                echo "<td>" . $data['tgl_mulai'] . "</td>";
                echo "<td>" . $data['tgl_selesai'] . "</td>";
              
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