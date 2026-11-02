<div class="container-fluid py-4">
    <div class="row">
        <?php if (!empty($courseList)) :?>
        <div class="col-md-6">
            <p class="fw-bold text-dark small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i> RUANG DISKUSI</p>
            <?php foreach ($courseList as $row):?>
            <div class="mt-2">
                <a href="<?=base_url()?>discussion/all/<?=$row->CourseID?>">
                    <div class="card course-link">
                        <div class="card-body ">
                            <div class="row">
                                <div class="w-20 text-center my-auto">
                                    <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                                </div>
                                <div class="w-80 course-info">
                                    <p class=" text-dark fw-bold mb-0">Diskusi <?=$row->CourseName?></p>
                                    <p class=" text-secondary fw-bold mb-0 small"><?=$row->ClassName?> -
                                        <?=$row->SchoolName?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach;?>

        </div>
        <div class="col-md-6 d-none d-sm-block">
            <img src="<?=base_url()?>assets/clearn/discus_obj.svg" class="w-100" style="margin-top:1rem" alt="">
        </div>
        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p class="text-dark">Kamu belum mendaftar kelas apapun</p>
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-warning ml-3 mt-3">Temukan Kelas</a>
            </div>
        </div>
        <?php endif;?>



    </div>

</div>
</main>