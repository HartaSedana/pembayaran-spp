<div class="container-fluid">
    <h5><?= $data['title']?></h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= isset($data['data']) ? BASE_URL . '/kelas/update/' . $data['data']['id'] : BASE_URL . '/kelas/store'?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($data['data']) ? $data['data']['id'] : ''?>">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama" value="<?= isset($data['data']) ? $data['data']['nama'] : ''?>">
                        </div>
                        <div class="form-group">
                            <label for="kompetensi">Kompetensi Keahlian</label>
                            <input type="text" class="form-control" id="komptensi" value="<?= isset($data['data']) ? $data['data']['kompetensi_keahlian'] : ''?>" name="kompetensi_keahlian">
                        </div>
                        <div class="d-flex mt-4">
                            <button class="btn btn-success mr-2" type="submit">Simpan</button>
                            <a href="<?=BASE_URL?>/kelas" class="btn btn-danger text-white ">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>