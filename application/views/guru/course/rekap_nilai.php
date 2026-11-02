<div class="row mt-4">
    <p class="fw-bold text-dark small"> <i class="fas fa-dot-circle text-warning me-1"></i> REKAP NILAI</p>
    <div class="col-md-12 mt-3">
        <?php
        if (!empty($competencies)) {
            foreach ($competencies as $row) : ?>
        <div class="card bg-lightyellow mb-4">
            <div class="card-body">
                <span class="fw-bold text-purple fs-5"><?= $row['CompetenciesName'] ?></span>
                <hr>
                <ol class="mt-0 ps-3">
                    <?php if (!empty($lesson[$row['CompetenciesID']])) { foreach ($lesson[$row['CompetenciesID']] as $row2) :?>
                    <a class="text-dark"
                        href="<?= base_url('guru/result/'  . $row2['LessonID'].'/'.$CourseID) ?>">
                        <li class="text-dark py-1 li-hover">
                            <div class="row">
                                <div class="w-90">Materi: <?= $row2['LessonTitle'] ?></div>
                                <div class="w-10"><i class="fas fa-angle-double-right"></i></div>
                            </div>
                        </li>
                    </a>
                    <?php endforeach;} ?>
                    <?php if (!empty($quiz[$row['CompetenciesID']])) {foreach ($quiz[$row['CompetenciesID']] as $row3) :?>
                    <a class="text-dark"
                        href="<?= base_url('guru/resultquiz/' . $CourseID . '/' . $row3['QuizID']) ?>">
                        <li class="text-dark py-1 li-hover">
                            <div class="row">
                                <div class="w-90">Quiz: <?= $row3['QuizTitle'] ?></div>
                                <div class="w-10"><i class="fas fa-angle-double-right"></i></div>
                            </div>
                        </li>
                    </a>
                    <?php  endforeach;} ?>
                </ol>
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


</div>
</div>