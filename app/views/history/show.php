<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Custom fonts for this template-->
     <link href="<?=BASE_URL?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=BASE_URL?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>History Transaksi</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal bayar</th>
                                    <th>Bulan bayar</th>
                                    <th>Tahun bayar</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1;
                                foreach( $data['data'] as $transaksi) :?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= date('Y F d H:i:s', strtotime($transaksi['tanggal_bayar']))?></td>
                                    <td><?php if($transaksi['bulan_bayar'] == 1 ){?>
                                            Januari
                                        <?php } else if($transaksi['bulan_bayar'] == 2 ) {?>
                                            Februari
                                        <?php }  else if($transaksi['bulan_bayar'] == 3 ) {?>
                                            Maret
                                        <?php } else if($transaksi['bulan_bayar'] == 4 ) {?>
                                            April
                                        <?php } else if($transaksi['bulan_bayar'] == 5 ) {?>
                                            Mei
                                        <?php } else if($transaksi['bulan_bayar'] == 6 ) {?>
                                            Juni
                                        <?php } else if($transaksi['bulan_bayar'] == 7 ) {?>
                                            Juli
                                        <?php } else if($transaksi['bulan_bayar'] == 8 ) {?>
                                            Agustus
                                        <?php } else if($transaksi['bulan_bayar'] == 9 ) {?>
                                            September
                                        <?php } else if($transaksi['bulan_bayar'] == 10 ) {?>
                                            Oktober
                                        <?php } else if($transaksi['bulan_bayar'] == 11 ) {?>
                                            November
                                        <?php } else if($transaksi['bulan_bayar'] == 12 ) {?>
                                            Desember
                                        <?php }?>
                                    </td>
                                    <td><?= $transaksi['nominal']?> - <?= $transaksi['tahun_bayar']?></td>
                                    <td><?= $transaksi['nisn']?></td>
                                    <td><?= $transaksi['nis']?></td>
                                    <td><?= $transaksi['nama']?></td>
                                    <td><?= $transaksi['alamat']?></td>
                                    <td><?= $transaksi['telepon']?></td>
                                    <td><?= $transaksi['nama_petugas']?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
<script>
    window.print()
</script>
</body>
</html>
