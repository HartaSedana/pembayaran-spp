<div class="container-fluid">
    <form action="<?= isset($data['data']) ? BASE_URL .'/siswa/update/'.$data['data']['id'] : BASE_URL .'/siswa/store'?>"  method="POST">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5><?= $data['title']?></h5>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_pengguna" value="<?= isset($data['data']) ? $data['data']['id_pengguna'] : ''?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nisn"><span class="text-danger">*</span> NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" required value="<?= isset($data['data'])  ? $data['data']['nisn'] : ''?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nis"><span class="text-danger">*</span> NIS</label>
                                <input type="text" id="nis" name="nis" class="form-control" placeholder="Masukkan NIS" required value="<?= isset($data['data'])  ? $data['data']['nis'] : ''?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama"><span class="text-danger">*</span> Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required value="<?= isset($data['data'])  ? $data['data']['nama'] : ''?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat"><span class="text-danger">*</span> Alamat</label>
                        <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Masukkan Alamat" required value=""><?= isset($data['data'])  ? $data['data']['alamat'] : ''?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tlp"><span class="text-danger">*</span> Telepon</label>
                                <input type="tlp" name="telepon" id="tlp" class="form-control" placeholder="Masukkan Nomer Telepon" required value="<?= isset($data['data'])  ? $data['data']['telepon'] : ''?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kelas"><span class="text-danger">*</span> Kelas</label>
                                <select name="id_kelas" id="kelas" class="form-control" required>
                                    <?php foreach($data['kelas'] as $kelas) :?>
                                <option value="<?= $kelas['id']?>" <?= isset($data['data']) && $data['data']['id_kelas'] == $kelas['id'] ? 'selected' : '' ?> ><?= $kelas['nama']?> - <?= $kelas['kompetensi_keahlian']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pembayaran"><span class="text-danger">*</span> Pembayaran</label>
                        <select name="id_pembayaran" id="pembayaran" class="form-control" required>
                            <?php foreach($data['pembayaran'] as $pembayaran) : ?>
                            <option value="<?= $pembayaran['id']?>" <?= isset($data['data']) && $data['data']['id_pembayaran'] == $kelas['id'] ? 'selected' : ''?>><?= $pembayaran['nominal']?> - <?= $pembayaran['tahun_ajaran']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="d-flex mt-4">
                        <button type="submit" class="btn btn-success text-white">Simpan</button>
                        <a href="<?= BASE_URL?>/siswa" class="btn btn-danger text-white ml-2">Batal</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Tambah Akun Pengguna</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="password"><?= isset($data['data']) ? '' : '<span class="text-danger">*</span>'?> Password</label>
                        <input type="text" name="password" id="password" placeholder="Masukkan Password" <?= isset($data['data']) ? '': 'required'?> class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>