
CREATE DATABASE belajarwithib;

CREATE TABLE jurusan(

 id_jurusan int(11) NOT NULL AUTO_INCREMENT,
 nama_jurusan varchar(100) NOT NULL,
 jumlah_siswa varchar(255) NOT NULL,
 PRIMARY KEY(id_jurusan)
);


INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `jumlah_siswa`) VALUES
(NULL, 'RPL', '38'),
(NULL, 'TKJ', '50'),
(NULL, 'AKUNTANSI', '40'),
(NULL, 'Manajemen Perkantoran', '44');
