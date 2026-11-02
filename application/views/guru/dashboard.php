<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7">
            <p class="mr-3 fw-bold">Selamat Datang</p>
            <h3 class="mr-3 text-dark mb-3"><?=$this->session->userdata('nama');?></h3>
            <div class="card bg-lightyellow">
                <div class="card-body row">
                    <div class="col-md-7 px-5">
                        <hr>
                        <div class="row text-dark small">
                            <div class="col-md-3 w-50 fw-bold text-purple py-2">
                                Kelas <p class="fw-bold fs-3 text-dark"> <?=$countCourse?></p>
                            </div>
                            <div class="col-md-3 w-50 fw-bold text-purple py-2">
                                Siswa <p class="fw-bold fs-3 text-dark"> <?=$countSiswa?></p>
                            </div>
                            <div class="col-md-3 w-50 fw-bold text-purple py-2">
                                Materi <p class="fw-bold fs-3 text-dark"><?=$countTeacherLesson?></p>
                            </div>
                            <div class="col-md-3 w-50 fw-bold text-purple py-2">
                                Quiz <p class="fw-bold fs-3 text-dark"><?=$countTeacherQuiz?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="<?=base_url()?>assets/clearn/auth_obj.svg" class="character" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-lightyellow"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-purple font-weight-bolder mb-4 pt-2">Course</h5>
                                
                                <a class="text-dark text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>guru/kelas">
                                    Mulai Kelas
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-lightyellow"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-purple font-weight-bolder mb-4 pt-2">Discussion</h5>

                                <a class="text-dark text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>DiscussionGuru">
                                    Jelajahi Forum
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-lightyellow"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-purple font-weight-bolder mb-4 pt-2">Live Coding</h5>
                                
                                <a class="text-dark text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>guru/livecode">
                                    Mulai Coding
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-lightyellow"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-purple font-weight-bolder mb-4 pt-2">Edu Game</h5>

                                <a class="text-dark text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>guru/gameedu">
                                    Mulai Permainan
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row mt-4">
        <h6 class="text-dark font-weight-bolder mb-2 pt-2">Kelas Terbaru</h6>
        <?php if (!empty($courseList)) :?>
        <?php foreach ($courseList as $row ):?>
      
        <div class="col-md-3 mt-2">
            <a href="<?=base_url()?>guru/course/<?=$row->CourseID?>">
                <div class="card course-link">
                    <div class="card-body align-items-center">
                    <img src="<?=base_url()?>assets/clearn/icon_course.svg" class="w-100 " alt="icon course">
                        <div class="row">
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-5">
            <a href="<?=base_url()?>guru/kelas" class="btn btn-warning me-md-2" type="button">Lihat Semua Kelas</a>
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
</main>