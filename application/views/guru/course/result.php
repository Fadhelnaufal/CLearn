<div class="container-fluid py-4">
    <div class="row mx-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                        href="<?=base_url()?>guru/course/<?=$course->CourseID?>"
                        class="text-primary fw-bold"><?=$course->CourseName?></a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                        href="<?=base_url()?>guru/rekap/<?=$course->CourseID?>" class="text-primary fw-bold">Rekap
                        Nilai</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                     <?=$lesson['LessonTitle']?>
                </li>
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
    <p class="fw-bold text-dark small mt-4 text-uppercase"> <i class="fas fa-dot-circle text-warning me-1"></i>SISWA YANG TELAH
        MEMBACA <?=$lesson['LessonTitle']?></p>
    <div class="row mx-0 ">
        <?php if(!empty($siswa)):?>
        <div class="card mt-3 ">
            <div class="card-body overflow-auto">
                <table class="table table-hover mt-3" id="daftar_siswa">
                    <thead>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>Nama</th>
                        <th>Selesai</th>
                        <th>Reward</th>
                    </thead>
                    <tbody>
                        <?php $x=1; foreach($siswa as $row):?>
                        <tr>
                            <td><?=$x?></td>

                            <td><img src="<?=base_url()?>media/avatar/<?=$row->UserAvatar?>" class="small-ava" alt="">
                            </td>
                            <td><?=$row->UserName?></td>
                            <td><?= date("d M Y (H:i", strtotime($row->datetime));  ?> WIB)</td>
                            <td> <i class="fas fa-star text-warning"></i> 200 XP</td>
                        </tr>
                        <?php $x++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else:?>
        <div class="card mt-3 bg-lightgreen card-body">
            Belum ada yang membaca 
        </div>
        <?php endif;?>
    </div>

</div>

</div>
</main>