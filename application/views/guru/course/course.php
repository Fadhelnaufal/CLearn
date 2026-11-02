<div class="row mt-4">
    <p class="fw-bold text-dark small"> <i class="fas fa-dot-circle text-warning me-1"></i> KOMPETENSI DASAR</p>
    <div class="col-md-9 mt-3">
        <?php
        if (!empty($competencies)) {
            foreach ($competencies as $row) : ?>
        <div class="card bg-lightyellow mb-4">
            <div class="card-body">
                <span class="fw-bold text-purple fs-5"><?= $row['CompetenciesName'] ?></span>

                <hr>

                <ol class="mt-0 ps-3">
                    <?php if (!empty($lesson[$row['CompetenciesID']])) { foreach ($lesson[$row['CompetenciesID']] as $row2) :?>
                    <a class="text-white"
                        href="<?= base_url('guru/detail_lesson/'  . $row2['LessonID'].'/'.$CourseID) ?>">
                        <li class="text-dark py-1 li-hover">
                            <div class="row">
                                <div class="w-90">Materi: <?= $row2['LessonTitle'] ?></div>
                                <div class="w-10"><i class="fas fa-angle-double-right"></i></div>
                            </div>
                        </li>
                    </a>
                    <?php endforeach;} ?>
                    <?php if (!empty($quiz[$row['CompetenciesID']])) {foreach ($quiz[$row['CompetenciesID']] as $row3) :?>

                    <a class="text-white" href="<?= base_url('guru/list_question/' . $CourseID . '/' . $row3['QuizID']) ?>">
                        <li class="text-dark py-1 li-hover">
                            <div class="row">
                                <div class="w-90">Quiz: <?= $row3['QuizTitle'] ?></div>
                                <div class="w-10"><i class="fas fa-angle-double-right"></i></div>
                            </div>
                        </li>
                    </a>
                    <?php  endforeach;} ?>
                </ol>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                    <a href="<?= base_url('guru/Lesson/' . $CourseID . '/' . $row['CompetenciesID']) ?>"
                        class="btn btn-warning btn-sm px-3 small ">+Tambah Materi</a>
                    <a href="<?= base_url('guru/create_quiz/' . $CourseID . '/' . $row['CompetenciesID']) ?>"
                        class="btn btn-warning btn-sm px-3 small ">+Tambah Quiz</a>
                    <a data-bs-toggle="modal" data-bs-target="#editKD<?= $row['CompetenciesID'] ?>" type="button"
                        class="btn btn-warning btn-sm px-3 small"> <i class="fas fa-edit"></i> Edit KD</a>
                </div>
                 <div class="modal fade" id="editKD<?= $row['CompetenciesID'] ?>" tabindex="-1" aria-labelledby="editKD"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah KD</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id='formEdit'
                                    action="<?= base_url('guru/editKD/' . $course->CourseID.'/'.$row['CompetenciesID']) ?>"
                                    method="post">
                                    <div class="form-group">
                                        <h6 class="text-dark">Kompetensi Dasar</h6>
                                        <input type="text" name="nama-kd" placeholder=""
                                            value="<?= $row['CompetenciesName'] ?>" class="form-control text-dark">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Edit Nama KD">
                                        <a class="btn btn-danger float-end"
                                            href="<?= base_url('guru/deleteKD/' . $course->CourseID . '/' . $row['CompetenciesID']) ?>">Hapus
                                            KD</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <?php endforeach;} else { ?>
        <div class="card  mb-4">
            <div class="card-body p-0">
                <div class="accordion text-dark " id="accordionFlushExample">
                    <div class="accordion-item text-dark">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Tidak Ada Kompetensi Dasar Tersedia
                            </button>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h6 class="text-dark text-center">Jumlah KD</h6>
                <h2 class="text-center text-dark">
                    <?php
                    if (empty($countKD->value))
                        echo '0';
                    else
                        echo $countKD->value;
                    ?>
                </h2>
                <button data-bs-toggle="modal" data-bs-target="#addKD" class="btn btn-warning text-center btn-sm"
                    type="button">+Tambah
                    KD</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="addKD" tabindex="-1" aria-labelledby="addKD" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat KD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guru/addKD/' . $course->CourseID) ?>" method="post">
                    <div class="form-group">
                        <h6 class="text-dark">Masukkan Nama Kompetensi Dasar</h6>
                        <input type="text" name="nama-kd" class="form-control text-dark">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Buat KD">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>