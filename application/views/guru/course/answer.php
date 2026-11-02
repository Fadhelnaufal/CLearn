<div class="container fluid py-4">
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
                <li class="breadcrumb-item" aria-current="page"><a
                        href="<?=base_url()?>guru/resultquiz/<?=$course->CourseID?>/<?=$hasil->QuizID?>"
                        class="text-primary fw-bold"><?=$quiz->QuizTitle?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?=$hasil->UserName?>
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
   
    <div class="row mx-0">
         <p class="fw-bold text-dark small mt-4 text-uppercase"> <i class="fas fa-dot-circle text-warning me-1"></i> identitas</p>
        <div class="card bg-lightgreen card-body mt-3">
            <table class="d-block text-dark">
                 <tr>
                    <td>Quiz</td>
                    <td>:</td>
                    <td><?=$quiz->QuizTitle?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?=$hasil->UserName?></td>
                </tr>
                 <tr>
                    <td>Nilai</td>
                    <td>:</td>
                    <td><?=$hasil->result?></td>
                </tr>
                 <tr>
                    <td class="pe-5">Reward</td>
                    <td class="pe-2">:</td>
                    <td><?=$hasil->addXP?>XP</td>
                </tr>
                 <tr>
                    <td>Selesai</td>
                    <td>:</td>
                    <td><?= date("d M Y (H:i", strtotime($hasil->time_taken));  ?> WIB)</td>
                </tr>
            </table>
        </div>
        <p class="fw-bold text-dark small mt-4 text-uppcercase"> <i class="fas fa-dot-circle text-warning me-1"></i> HASIL
        QUIZ <?=$quiz->QuizTitle?></p>
        <div class="card card-body mt-3">
            <?php $x=1; foreach($feedback as $row):?>
            <?php $t=$row->TrueOption; $a=$row->answer;?>
            <p class="text-dark mb-1 fs-6 fw-bold "><?=$x?>. <?=$row->Question?>
            </p>
            <?php if ($row->question_img!=null):?>
            <a href="<?=base_url()?>media/soal/<?=$row->question_img?>" target="_blank">
                <img src="<?=base_url()?>media/soal/<?=$row->question_img?>" style="height:200px" class="rounded ms-3"
                    alt="">
            </a>
            <?php endif;?>
            <div class="mb-4 ms-3">
                <p
                    class=" <?php if($t==$a && $a=='A'){echo 'text-success fw-bold ';}elseif($t!==$a && $a=='A'){echo 'text-danger';}elseif($t=='A'){echo 'text-success fw-bold ';}else{echo ' text-dark';}?>">
                    A. <?=$row->OptionA?>
                    <?php if($t=='A'):?>
                    <i class="fas fa-check text-success fw-bold"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='A'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='B'){echo 'text-success fw-bold ';}elseif($t!==$a && $a=='B'){echo 'text-danger';}elseif($t=='B'){echo 'text-success fw-bold ';}else{echo ' text-dark';}?>">
                    B. <?=$row->OptionB?>
                    <?php if($t=='B'):?>
                    <i class="fas fa-check text-success fw-bold"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='B'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='C'){echo 'text-success fw-bold ';}elseif($t!==$a && $a=='C'){echo 'text-danger';}elseif($t=='C'){echo 'text-success fw-bold ';}else{echo ' text-dark';}?>">
                    C. <?=$row->OptionC?>
                    <?php if($t=='C'):?>
                    <i class="fas fa-check text-success fw-bold"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='C'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='D'){echo 'text-success fw-bold ';}elseif($t!==$a && $a=='D'){echo 'text-danger';}elseif($t=='D'){echo 'text-success fw-bold ';}else{echo ' text-dark';}?>">
                    D. <?=$row->OptionD?>
                    <?php if($t=='D'):?>
                    <i class="fas fa-check text-success fw-bold"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='D'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='E'){echo 'text-success fw-bold ';}elseif($t!==$a && $a=='E'){echo 'text-danger';}elseif($t=='E'){echo 'text-success fw-bold ';}else{echo ' text-dark';}?>">
                    E. <?=$row->OptionE?>
                    <?php if($t=='E'):?>
                    <i class="fas fa-check text-success fw-bold"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='E'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
            </div>


            <?php $x++; endforeach;?>

        </div>
    </div>
</div>
</div>
</main>