<div class="container-fluid">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>DiscussionGuru" class="text-primary fw-bold">Diskusi</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>DiscussionGuru/all/<?= $CourseID ?>" class="text-primary fw-bold">Diskusi
                        <?= $CourseName ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $thread->UserName ?>
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-forum text-dark">
                <div class="row mb-3">
                    <div class="w-90 row">
                        <div class="pe-0 w-auto">
                            <img src="<?= base_url() ?>media/avatar/<?= $thread->UserAvatar ?>" alt="image"
                                class="my-auto" style="width:45px">
                        </div>
                        <div class="w-80 name-space ">
                            <div class="fw-bolder text-dark"><?= $thread->UserName ?>
                                <?php if ($thread->UserRole=="guru"):?>
                                <span class="badge bg-danger p-1">Guru</span>
                                <?php endif;?>
                            </div>
                            <div class="text-secondary small">
                                <span class="me-3"><?= date("d M Y, H:i", strtotime($thread->time_thread)); ?></span>
                                <span class="badge bg-warning"><?= $thread->category ?></span>
                            </div>

                        </div>
                    </div>
                    <div class="w-10 text-end">
                        <?php if ($thread->UserID == $this->session->userdata('id_user')) : ?>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-dark fw-bold small" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opsi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"
                                        href="<?= base_url() ?>DiscussionGuru/editdiskusi/<?= $thread->ForumQID ?>/<?= $CourseID ?>">Edit</a>
                                </li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#deleteThread">Hapus</a></li>
                            </ul>
                            <!-- Modal Keluar-->
                            <div class="modal fade" id="deleteThread" tabindex="-1" aria-labelledby="quitLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-danger">
                                        <div class="modal-body text-center">
                                            <p class="text-white fw-bold mb-4">Yakin ingin menghapus?
                                            </p>
                                            <a href="<?= base_url() ?>DiscussionGuru/delete/<?= $thread->ForumQID ?>/<?= $thread->CourseID ?>"
                                                class="btn btn-danger btn-sm me-5">Hapus</a>
                                            <button type="button" class="btn btn-dark btn-sm "
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <p class="text-dark"><?= $thread->ForumQContent ?></p>
                <div class="mt-5">
                    <form action="<?= base_url('DiscussionGuru/addComments/' . $thread->ForumQID) ?>" method="post">
                        <div class="form-group row">
                            <textarea name="content" id="add_answer" class=" form-control" required></textarea>
                        </div>
                        <input type="hidden" name="CourseeID" value="<?= $CourseID ?>">
                        <button type="submit" class="btn btn-block bg-warning btn-diskusi"
                            style="display:none">Tambahkan
                            Komentar</button>
                    </form>
                </div>
            </div>
            <?php if (!empty($comments)) : ?>
            <div class="col-md-12">
                <p class="fw-bold text-dark small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i>
                    <?= $countComments ?> Komentar
                </p>
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($comments as $row) : ?>
                        <div class="row ">
                            <div class="pe-0 w-auto">
                                <img src="<?= base_url() ?>media/avatar/<?= $row->UserAvatar ?>" alt="image"
                                    class="my-auto" style="width:45px">
                            </div>
                            <div class="w-80">
                                <p class="card-title text-dark fw-bold mb-0"><?= $row->UserName ?>
                                    <?php if ($row->UserRole=="guru"):?>
                                    <span class="badge bg-danger p-1">Guru</span>
                                    
                                </p>
                                <div>
                                    <?php endif;?><span
                                        class="me-3 fw-light text-secondary small"><?= date("d M Y, H:i", strtotime($row->time_answer));  ?></span>
                                </div>
                                <div class="card-text text-dark small fs-15 mb-4"><?= $row->ForumAContent ?>
                                    <?php if ($row->UserID == $this->session->userdata('id_user')) : ?>
                                    <div>
                                        <a href="<?= base_url() ?>DiscussionGuru/editkomentar/<?= $row->ForumAID ?>/<?= $thread->ForumQID ?>/<?= $thread->CourseID ?>"
                                            class="text-primary">Edit</a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteComment<?= $row->ForumAID ?>"
                                            class="text-primary ms-3">Hapus</a>
                                    </div>
                                    <!-- Modal Keluar-->
                                    <div class="modal fade" id="deleteComment<?= $row->ForumAID ?>" tabindex="-1"
                                        aria-labelledby="quitLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modal-danger">
                                                <div class="modal-body text-center">
                                                    <p class="text-white fw-bold mb-4">Kamu yakin ingin menghapus
                                                        komentar ini?
                                                    </p>
                                                    <a href="<?= base_url() ?>DiscussionGuru/deletecomment/<?= $thread->CourseID ?>/<?= $row->ForumQID ?>/<?= $row->ForumAID ?>"
                                                        class="btn btn-danger btn-sm me-5">Hapus</a>
                                                    <button type="button" class="btn btn-dark btn-sm "
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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
                        <div class="row bg-lightyellow py-3 border-end border-warning border-3">
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
</div>