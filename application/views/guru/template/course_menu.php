<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <?php if($course_menu=="Kelas"):?>
                <li class="breadcrumb-item active" aria-current="page"><?=$course->CourseName?> -
                    <?=$course->ClassName?></li>
                <?php else:?>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?=base_url()?>guru/course/<?=$course->CourseID?>"  class="text-primary fw-bold">
                        <?=$course->CourseName?> - <?=$course->ClassName?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?=$course_menu?>
                </li>
                <?php endif;?>
            </ol>
        </nav>
    </div>
    <div class="row mx-0">
        <div class="card">
            <div class="card-body p-0 py-2">
                <a href="<?=base_url()?>guru/course/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Kelas"){echo "active-menu";}?>">Kelas</a>
                <a href="<?=base_url()?>guru/aktivitas/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Aktivitas"){echo "active-menu";}?>">Aktivitas</a>
                <a href="<?=base_url()?>guru/rekap/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Rekap Nilai"){echo "active-menu";}?>">Rekap
                    Nilai</a>
                <a href="<?=base_url()?>guru/siswa/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Daftar Siswa"){echo "active-menu";}?>">Daftar
                    Siswa</a>
                <a href="<?=base_url()?>guru/pengaturan/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Pengaturan"){echo "active-menu";}?>">Pengaturan</a>
            </div>
        </div>
    </div>