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
    <div class="card shadow mt-2">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto">
                    <h5>List <?= $data['title']?></h5>
                </div>
                <div>
                    <a href="<?=BASE_URL?>/kelas/create" class="btn btn-success text-white">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no= 1;
                        foreach( $data['data'] as $kelas) :?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $kelas['nama']?></td>
                            <td><?= $kelas['kompetensi_keahlian']?></td>
                            <td>
                                <a href="<?= BASE_URL?>/kelas/edit/<?= $kelas['id']?>" class="btn btn-warning text-white">Edit</a>
                                <a href="<?= BASE_URL?>/kelas/hapus/<?= $kelas['id']?>" class="btn btn-danger text-white">hapus</a>
                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            columnDefs : [
                {targets : 3, width : "15%" }
            ]
        });
    } );
</script>

