<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <div class="card bg-lightyellow">
                <div class="card-body p-3">
                    <div class="text-center">
                        <img src="<?=base_url()?>media/avatar/<?=$profil->UserAvatar?>" class="profil-ava" alt="">
                        <div class="mt-2 text-dark fw-bold fs-4">
                            <?=$this->session->userdata('nama'); ?>
                        </div>
                    </div>
                    <div class="fw-bold bg-danger text-dark small px-1"><?php echo validation_errors(); ?></div>
                    <form role="form" class="mt-5" method="POST" action="<?= base_url('profil/password') ?>">
                      <label class="text-purple">Password Lama</label>
                        <div class="mb-3">
                            <input type="password" name="old" class="form-control text-dark" placeholder="Masukkan password lama"
                                aria-label="Buat Password" aria-describedby="password-addon" required
                                autocomplete="off">
                        </div>
                        <label class="text-purple">Buat Password Baru</label>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control text-dark" placeholder="Buat password baru"
                                aria-label="Buat Password" aria-describedby="password-addon" required
                                autocomplete="off">
                        </div>
                        <label class="text-purple">Konfirmasi Password Baru</label>
                        <div class="mb-3">
                            <input type="password" name='passconf' class="form-control text-dark"
                                placeholder="Konfirmasi password baru" aria-describedby="password-addon" required
                                autocomplete="off">
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