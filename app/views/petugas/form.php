<div class="container-fluid">
    <h5><?= $data['title']?></h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= isset($data['data']) ? BASE_URL . '/petugas/update/' . $data['data']['id'] : BASE_URL . '/petugas/store'?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($data['data']) ? $data['data']['id'] : ''?>">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama" value="<?= isset($data['data']) ? $data['data']['nama'] : ''?>" required>
                        </div>
                        <?php if(!isset($data['data'])) {?> 
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password"  name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        <?php }?>
                        <div class="d-flex mt-4">
                            <button class="btn btn-success mr-2" type="submit">Simpan</button>
                            <a href="<?=BASE_URL?>/petugas" class="btn btn-danger text-white ">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>