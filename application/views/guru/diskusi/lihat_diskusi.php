<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url() ?>DiscussionGuru" class="text-primary fw-bold">Diskusi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Diskusi <?= $CourseName ?></li>
            </ol>
        </nav>
    </div>
    <div class="row mx-0">
        <div class="card">
            <div class="card-body p-0 py-2">
                <a href="<?= base_url() ?>DiscussionGuru/all/<?= $course_id ?>" class="btn btn-disabled mb-0 course-menu shadow-none  <?php if ($title == "Semua Topik") {
                                                                                                                                            echo "active-menu";
                                                                                                                                        } ?>">Semua</a>
                <a href="<?= base_url() ?>DiscussionGuru/topik/Pengumuman/<?= $course_id ?>" class="btn btn-disabled mb-0 course-menu shadow-none  <?php if ($title == "Pengumuman") {
                                                                                                                                                        echo "active-menu";
                                                                                                                                                    } ?>">Pengumuman</a>
                <a href="<?= base_url() ?>DiscussionGuru/topik/Tugas/<?= $course_id ?>" class="btn btn-disabled mb-0 course-menu shadow-none  <?php if ($title == "Tugas") {
                                                                                                                                                    echo "active-menu";
                                                                                                                                                } ?>">Tugas</a>
                <a href="<?= base_url() ?>DiscussionGuru/topik/Pertanyaan/<?= $course_id ?>" class="btn btn-disabled mb-0 course-menu shadow-none  <?php if ($title == "Pertanyaan") {
                                                                                                                                                        echo "active-menu";
                                                                                                                                                    } ?>">Pertanyaan</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card-forum mt-3 p-0 bg-white">
                <form action="<?= base_url() ?>DiscussionGuru/adddatadiskusi" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <textarea name="content" id="add_question" class=" form-control" required></textarea>
                    </div>
                    <div class="form-group row btn-diskusi px-3" style="display:none">
                        <div class="w-50">

                            <select name="kategori" class="form-control border-0 bg-warning fw-bold text-center" style="width:auto" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pengumuman">Pengumuman</option>
                                <option value="Tugas">Tugas</option>
                                <option value="Pertanyaan">Pertanyaan</option>
                            </select>
                        </div>

                        <div class="w-50">
                            <input type="hidden" name="courseid" value="<?= $course_id ?>">
                            <input type="submit" class="btn bg-lightyellow float-end text-white" value="Kirim">
                        </div>
                    </div>
                </form>
            </div>
            <?php if (!empty($diskusi)) : ?>
                <?php foreach ($diskusi as $row) : ?>
                    <a href="<?= base_url() ?>DiscussionGuru/detail_discussion/<?= $row->ForumQID ?>/<?= $course_id ?>" class="text-dark">
                        <div class="card card-forum mt-3 ">
                            <div class="row">
                                <div class="w-10 ava-space pe-0">
                                    <img src="<?= base_url() ?>media/avatar/<?= $row->UserAvatar ?>" alt="image" class="w-100 my-auto">
                                </div>
                                <div class="w-90 name-space ">
                                 
                                    <div class="fw-bolder text-dark"><?= $row->UserName ?>  
                                    <?php if($row->UserRole=="guru"):?>  
                                    <span class="badge bg-danger p-1">Guru</span> 
                                    <?php endif;?>
                                </div>
                                    <div class="text-secondary small">
                                        <span class="me-3"><?= date("d M Y, H:i", strtotime($row->time_thread)); ?></span>
                                        <span class="badge bg-warning"><?= $row->category ?></span>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-3 fs-5 fw-bold">
                                <?= $row->ForumQTitle ?>
                            </div>
                            <div class="text-dark isi-diskusi">
                                <?= $row->ForumQContent ?>
                            </div>
                            <!-- <hr> -->
                            <div class="text-secondary isi-diskusi">
                                <i class="fas fa-comment small"></i> <?= $this->M_Discussion->countComments($row->ForumQID) ?> Komentar
                            </div>
                            <!-- <div class="ques-icon-info3293 tex"> <a href="#" class="text-white"><i class=" text-white fa fa-clock-o" aria-hidden="true"> 4 min
                                    ago</i></a> <a href="#" class="text-white"><i class="text-white fa fa-question-circle-o" aria-hidden="true"> Question</i></a>
                            <a href="#" class="text-white">
                                <i class="fa fa-commen text" aria-hidden="true"> 333335 answer</i>
                            </a>

                        </div> -->
                        </div>
                    </a>
                <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <div class="card card-body bg-lightyellow mt-3">
                <div class="row">
                    <span class="fw-bold text-dark small mt-2 w-60"> <i class="fas fa-dot-circle text-warning me-1"></i>SISWA TERAKTIF</span>
                    <span class="fw-bold text-dark small mt-2 w-40 text-end"> <i class="fas fa-star text-warning"></i>
                        SKOR</sp>
                </div>
                <div class="mt-4 ">
                    <?php foreach ($leaderboard as $lb) : ?>
                        <div class="row bg-lightyellow py-3 border-end border-success border-3">
                            <div class="lb-forum w-20 my-auto">
                                <img src="<?= base_url() ?>media/avatar/<?= $lb->UserAvatar ?>" alt="image" class="w-35px my-auto">
                            </div>
                            <div class="nama-lb-forum w-60 my-auto">
                                <div class=" my-auto small"><?= $lb->UserName ?></div>
                            </div>
                            <div class="skor-forum w-20 my-auto">
                                <div class="fw-bolder small"><?= $lb->Score ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mt-2">
        <div class="card-body">
            <p>Belum ada diskusi</p>

        </div>
    </div>
<?php endif; ?>
</div>