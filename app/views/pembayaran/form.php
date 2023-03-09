<div class="container-fluid">
    <h5><?= $data['title']?></h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= isset($data['data']) ? BASE_URL . '/pembayaran/update/' . $data['data']['id'] : BASE_URL . '/pembayaran/store'?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($data['data']) ? $data['data']['id'] : ''?>">
                        <div class="form-group">
                            <label for="tahun">Tahun Ajaran</label>
                            <input type="text" class="form-control" id="tahun" name="tahun_ajaran" value="<?= isset($data['data']) ? $data['data']['tahun_ajaran'] : ''?>">
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" value="<?= isset($data['data']) ? $data['data']['nominal'] : ''?>" name="nominal">
                        </div>
                        <div class="d-flex mt-4">
                            <button class="btn btn-success mr-2" type="submit">Simpan</button>
                            <a href="<?=BASE_URL?>/pembayaran" class="btn btn-danger text-white ">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>