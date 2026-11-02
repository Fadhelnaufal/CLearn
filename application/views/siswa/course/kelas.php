<div class="container-fluid py-4">
    <div class="row">
        <?php if (!empty($courseList)) :?>
        <div class="col-md-6">
            <div class="d-grid gap-2 d-md-flex ">
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-warning me-md-2" type="button">Tambah Kelas <span class="text-bold">+</span> </a>
            </div>
            <p class="fw-bold text-dark small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i> KELAS SAYA</p>
            <?php foreach ($courseList as $row):?>
            <div class="mt-2">
                <a href="<?=base_url()?>lesson/course/<?=$row->CourseID?>">
                    <div class="card course-link">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-3 text-center course-logo my-auto">
                                    <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                                </div>
                                <div class="col-md-9 course-info">
                                    <p class=" text-dark fw-bold mb-0"><?=$row->CourseName?></p>
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
        <div class="col-md-6 d-sm-block">
            <img src="<?=base_url()?>assets/clearn/course_obj.svg" class="w-100" alt="gambar course">
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
    
    <!-- Leaderboard umum
    <div class="row mt-4 mx-0">
        <div class="col-md-6 d-sm-block">
            <img src="<?=base_url()?>assets/img/vector/leaderboard.svg" alt="">
        </div>
        <div class="col-md-6 card card-body ">
            <div class="row">
                <span class="fw-bold text-dark small mt-3 w-60"> <i class="fas fa-dot-circle text-warning me-1"
                        aria-hidden="true"></i>LEADERBOARD</span>
                <span class="fw-bold text-dark small mt-2 w-40 text-end"> <i class="fas fa-star text-warning"
                        aria-hidden="true"></i>
                    SKOR
                </span>
            </div>
            <div class="mt-4 ">
                <?php foreach($allleaderboard as $row):?>
                <div class="row bg-lightgreen rounded-pill py-3 border-start border-warning border-5">
                    <div class="lb-forum w-20 my-auto">
                        <img src="<?=base_url()?>/media/avatar/<?=$row->UserAvatar?>" alt="image" class="w-35px my-auto">
                    </div>
                    <div class="nama-lb-forum w-60 my-auto">
                        <div class=" my-auto small fw-bold text-dark"><?=$row->UserName?></div>
                    </div>
                    <div class="skor-forum w-20 my-auto">
                        <div class="text-dark fw-bolder small"><?=$row->xp?></div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div> -->
</div>
</main>