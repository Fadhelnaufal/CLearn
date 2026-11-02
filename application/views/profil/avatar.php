<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 mx-auto mt-5">
            <div class="card bg-lightyellow">
                <div class="card-body p-3">
                    <div class="text-center">
                        <img src="<?=base_url()?>media/avatar/<?=$profil->UserAvatar?>" class="profil-ava" alt="">
                        <div class="mt-2 text-dark fw-bold fs-4">
                            <?=$this->session->userdata('nama'); ?>
                        </div>
                    </div>
                    <div class="col-md-8 mt-5 mx-auto">
                        <div class="fw-bold text-purple text-center">
                            Pilih Avatar
                        </div>
                        <div class="row mt-3">
                            <?php for ($i=1; $i <= 10; $i++):  ?>
                            <div class="m-1 choose-ava">
                               <a href="<?=base_url()?>profil/updateAvatar/ava<?=$i?>.png"> <img src="<?=base_url()?>media/avatar/ava<?=$i?>.png" class="w-100" alt=""></a>
                            </div>
                            <?php endfor;?>
                        </div>
                    </div>
                    <!-- <div class="col-md-8 mx-auto mt-5">
                        <div class="fw-bold text-white">
                            Atau upload foto
                            <p class="small">(.jpg/.png)</p>
                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <input type="file" name="avatar" id="" required class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Simpan" class="btn btn-warning">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</main>