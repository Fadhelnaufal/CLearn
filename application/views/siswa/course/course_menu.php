<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$course->CourseName?></li>
            </ol>
        </nav>
    </div>
    <div class="row mx-0">
        <div class="card">
            <div class="card-body p-0 py-2">
                <a href="<?=base_url()?>lesson/course/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Kelas"){echo "active-menu";}?>">Misi</a>
                <a href="<?=base_url()?>siswa/leaderboard/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Leaderboard"){echo "active-menu";}?>">Leaderboard</a>
                <a href="<?=base_url()?>siswa/aktivitas/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Aktivitas"){echo "active-menu";}?>">Aktivitas</a>
                <a href="<?=base_url()?>siswa/sertifikat/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Sertifikat"){echo "active-menu";}?>">Sertifikat</a>
                <a href="<?=base_url()?>siswa/teman/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Teman"){echo "active-menu";}?>">Teman</a>
                <a href="<?=base_url()?>siswa/informasi/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Informasi"){echo "active-menu";}?>">Informasi</a>
               
            </div>
        </div>
    </div>