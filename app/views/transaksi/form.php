<div class="container-fluid">
    <form action="<?= isset($data['data']) ? BASE_URL .'/transaksi/update/'. $data['data']['id'] : BASE_URL .'/transaksi/store'?>"  method="POST">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5><?= $data['title']?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama"><span class="text-danger">*</span> Nama Siswa</label>
                        <select name="id_siswa" id="nama" class="form-control">
                            <option>Pilih Siswa</option>
                            <?php foreach($data['siswa'] as $siswa) {?>
                            <option value="<?= $siswa['id']?>" <?= isset($data['data']) && $siswa['id'] == $data['data']['id_siswa'] ? 'selected' : ''?>><?= $siswa['nis']?> - <?= $siswa['nama']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal"><span class="text-danger">*</span> Tanggal</label>
                                <input type="datetime-local" id="tanggal" name="tanggal_bayar" class="form-control" value="<?= isset($data['data']) ? $data['data']['tanggal_bayar'] : ''?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="bulan"><span class="text-danger">*</span> Bulan</label>
                            <select name="bulan_bayar" id="bulan" class="form form-control">
                                <option>Select Bulan</option>
                                <option value="1" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 1 ?  'selected' : ''?>>Januari</option>
                                <option value="2" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 2 ?  'selected' : ''?>>Februari</option>
                                <option value="3" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 3 ?  'selected' : ''?>>Maret</option>
                                <option value="4" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 4 ?  'selected' : ''?>>April</option>
                                <option value="5" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 5 ?  'selected' : ''?>>Mei</option>
                                <option value="6" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 6 ?  'selected' : ''?>>Juni</option>
                                <option value="7" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 7 ?  'selected' : ''?>>Juli</option>
                                <option value="8" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 8 ?  'selected' : ''?>>Agustus</option>
                                <option value="9" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 9 ?  'selected' : ''?>>September</option>
                                <option value="10 <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 10 ?  'selected' : ''?>">Oktober</option>
                                <option value="11" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 11 ?  'selected' : ''?>>November</option>
                                <option value="12" <?=  isset($data['data']) && $data['data']['bulan_bayar'] == 12 ?  'selected' : ''?>>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="i"><span class="text-danger">*</span> Pembayaran</label>
                        <select name="id_pembayaran" id="pembayaran" class="form-control" required>
                            <?php foreach($data['pembayaran'] as $pembayaran) :?>
                            <option value="<?= $pembayaran['id']?>" <?= isset($data['data']) && $data['data']['id_pembayaran'] == $pembayaran['id'] ? 'selected' : '' ?> > <?= $pembayaran['nominal']?> - <?= $pembayaran['tahun_ajaran']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="d-flex mt-4">
                        <button type="submit" class="btn btn-success text-white">Simpan</button>
                        <a href="<?= BASE_URL?>/transaksi" class="btn btn-danger text-white ml-2">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>