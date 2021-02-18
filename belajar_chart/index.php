<?php

// Koneksi Ke Database
$koneksi = mysqli_connect("localhost","root","","belajarwithib");

//Inisialisasi nilai variabel awal
$nama_jur= "";
$total=null;

//Query SQL
$sql="SELECT nama_jurusan FROM jurusan GROUP BY id_jurusan";
$hasil=mysqli_query($koneksi,$sql);

while ($data = mysqli_fetch_array($hasil)) {
    //Mengambil nilai nama_jurusan dari database
    $jur=$data['nama_jurusan'];
    $nama_jur .= "'$jur'". ", ";

}

//Query SQL
$sql1="SELECT jumlah_siswa FROM jurusan GROUP BY id_jurusan";
$hasil1=mysqli_query($koneksi,$sql1);

while ($data = mysqli_fetch_array($hasil1)) {
    //Mengambil nilai jumlah_siswa dari database
    $jumlah=$data['jumlah_siswa'];
    $total .= "'$jumlah'". ", ";

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Belajar Membuat Chart</title>
</head>
<body>
    <div style="width: 800px; height: 800px">
        <canvas id="myChart"></canvas>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_jur; ?>],
            datasets: [{
                label: '# Jumlah Siswa',
                data: [<?php echo $total; ?>],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</html>
