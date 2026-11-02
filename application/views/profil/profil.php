<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <div class="card bg-lightyellow">
                <div class="card-body p-3">
                    <div class="text-center">
                        <img src="<?=base_url()?>media/avatar/<?=$profil->UserAvatar?>" class="profil-ava" alt="">
                        <div>
                            <a href="<?=base_url()?>profil/avatar" class="text-purple small fw-bold">Ubah Avatar</a>
                        </div>
                        <div class="mt-2 text-dark fw-bold fs-4">
                            <?=$this->session->userdata('nama'); ?>
                        </div>
                    </div>
                    <div class="fw-bold bg-danger text-dark small px-1"><?php echo validation_errors(); ?></div>
                    <form role="form" method="POST" action="<?= base_url('profil/') ?>" class="mt-5">
                        <label class="text-purple">Nama Lengkap</label>
                        <div class="mb-3">
                            <input type="text" name="nama" class="form-control text-dark" placeholder="Masukkan Nama"
                                aria-describedby="username-addon" required value="<?=$profil->UserName?>">
                        </div>
                        <label class="text-purple">Alamat Email</label>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control text-dark" aria-label="username"
                                aria-describedby="username-addon" required value="<?=$profil->UserEmail?>">
                        </div>
                        <label class="text-purple">Nomor Telepon</label>
                        <div class="mb-3">
                            <input type="tel" name="telp" class="form-control text-dark" placeholder="Masukkan Nomor Telp"
                                aria-label="username" aria-describedby="username-addon" required
                                value="<?=$profil->UserContactNo?>">
                        </div>
                        <label class="text-purple">Password</label>
                        <div class="mb-3">
                            <input type="password" class="form-control text-dark" required value="**********" disabled>
                            <a href="<?=base_url()?>profil/password" class="text-purple small fw-bold">Ubah Password</a>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-warning w-100 mt-4 mb-0" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</main>