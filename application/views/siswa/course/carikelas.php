<div class="container-fluid py-4">
    <div class="row">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Temukan Kelas</li>
            </ol>
        </nav>
        <?php if (empty($course)):?>
        <div class="card">
            <div class="card-body">
                Kamu sudah mengambil semua kelas
            </div>
        </div>
        <?php else:?>
        <?php foreach ($course as $row) : ?>
        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center course-logo my-auto">
                            <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                        </div>
                        <div class="col-md-9 course-info">
                            <p class=" text-dark fw-bold mb-0"><?=$row->CourseName?></p>
                            <p class=" text-secondary fw-bold mb-0 small"><?=$row->ClassName?> -
                                <?=$row->SchoolName?></p>
                            <a href="<?= base_url() ?>siswa/join/<?= $row->id ?>"
                                class="btn bg-yellow text-dark btn-sm mt-2">Bergabung ke Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif;?>
    </div>

</div>
</main>