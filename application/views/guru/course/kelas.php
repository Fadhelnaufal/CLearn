<div class="container">
    <div class="row mt-4">
        <?php if (!empty($courseList)) :?>
        <div class="col-md-6">
            <div class="d-grid gap-2 d-md-flex ">
                <a href="<?=base_url()?>guru/buatkelas" class="btn btn-warning " type="button">Buat Kelas</a>
            </div>
            <p class="fw-bold text-dark small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i> KELAS SAYA</p>
            <?php foreach ($courseList as $row ):?>
            <div class="col-md-12 mt-2">
                <a href="<?=base_url()?>guru/course/<?=$row->CourseID?>">
                    <div class="card course-link ">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-3 text-center course-logo my-auto">
                                    <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                                </div>
                                <div class="col-md-9 course-info">
                                    <p class=" text-dark fw-bold mb-0"><?=$row->CourseName?></p>
                                    <p class=" text-primary fw-bold mb-0 small"><?=$row->ClassName?> -
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
            <img src="<?=base_url()?>assets/clearn/course_obj.svg" class="w-90 " alt="">
        </div>
        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Anda belum membuat kelas</p>
                <a href="<?=base_url()?>guru/buatkelas" class="btn btn-warning ml-3 mt-3">Buat Kelas</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>