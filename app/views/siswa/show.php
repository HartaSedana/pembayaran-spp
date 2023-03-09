<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5><?= $data['title']?></h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderles">
                        <tr>
                            <td style="width: 500px;">NISN</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['nisn'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">NIS</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['nis'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">Nama</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['nama'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">Kelas</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['kelas_nama'] : '-'?> - <?= isset($data['data']) ? $data['data']['kompetensi_keahlian'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">Alamat</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['alamat'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">Telepon</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['telepon'] : '-'?></td>
                        </tr>
                        <tr>
                            <td style="width: 500px;">Tahun Ajaran</td>
                            <td style="width: 1px;">:</td>
                            <td><?= isset($data['data']) ? $data['data']['tahun_ajaran'] : '-'?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>