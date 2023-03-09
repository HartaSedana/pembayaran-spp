<div class="container-fluid">
<!---- Page heading --->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data['title']?></h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash();?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card shadow mt-2">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto">
                    <h5>List <?= $data['title']?></h5>
                </div>
                <?php if($_SESSION['user']['role'] == 'admin') {?>
                <div>
                    <a href="<?= BASE_URL?>/historyTransaksi/viewHistory" class="btn btn-primary">Generate Laporan</a>
                </div>
                <?php }?>
            </div>
        </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count ($data['data']) > 0) { ?>
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
                        </tr>
                        <?php endforeach?>
                        <?php } else {?>
                            <tr colspan="9" class="text-damger">Data not Found</tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            columnDefs : [
                {targets : 0, width : "5%" }
            ]
        });
    } );
</script>

