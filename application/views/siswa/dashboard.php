<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-7">
            <p class="mr-3 fw-bold">Selamat Datang</p>
            <h3 class="mr-3 text-dark mb-3"><?=$user->UserName?></h3>
            <div class="card bg-yellow">
                <div class="card-body row">
                    <div class="col-md-7">
                        
                        <p class="text-dark fw-bolder fs-2 text-uppercase"><?=$user->desc?></p>
                        <hr>
                        <div class="row text-dark small">
                            <div class="col-md-3 w-50">
                                Level <p class="fw-bold fs-4"><?=$user->LevelID?></p>
                                <!-- Kelas <p class="fw-bold fs-4"><?=$countCourse?></p> -->
                            </div>
                            <div class="col-md-3 w-50">
                                EXP Point<p class="fw-bold fs-4"> <?=$total_xp?> </p>
                            </div>
                            <div class="col-md-3 w-50">
                                Mission <p class="fw-bold fs-4"><?=$completed_mission?>/<?=$total_mission?></p>
                            </div>
                            <div class="col-md-3 w-50">
                                Kelas Diikuti <p class="fw-bold fs-4"><?=$countCourse?>/<?=$countCourse?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-dark small">
                            <p>Lencana</p>
                            <!-- start badges -->
                            <div class="">
                                <?php if($user->LevelID==0):?>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Raih 500XP untuk mendapatkan lencana Beginner'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Raih 1000XP untuk mendapatkan lencana Intermediate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Raih 2000XP untuk mendapatkan lencana Enhanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Raih 4000XP untuk mendapatkan lencana Advanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Raih 8000XP untuk mendapatkan lencana Ultimate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5gs.png' alt='' class='w-100'></button>
                                </span>
                                <?php elseif($user->LevelID==1):?>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Raih 1000XP untuk mendapatkan lencana Intermediate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Raih 2000XP untuk mendapatkan lencana Enhanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Raih 4000XP untuk mendapatkan lencana Advanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Raih 8000XP untuk mendapatkan lencana Ultimate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5gs.png' alt='' class='w-100'></button>
                                </span>
                                <?php elseif($user->LevelID==2):?>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Raih 2000XP untuk mendapatkan lencana Enhanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Raih 4000XP untuk mendapatkan lencana Advanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Raih 8000XP untuk mendapatkan lencana Ultimate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5gs.png' alt='' class='w-100'></button>
                                </span>
                                <?php elseif($user->LevelID==3):?>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Raih 4000XP untuk mendapatkan lencana Advanced'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4gs.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Raih 8000XP untuk mendapatkan lencana Ultimate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5gs.png' alt='' class='w-100'></button>
                                </span>
                                <?php elseif($user->LevelID==4):?>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 4000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Raih 8000XP untuk mendapatkan lencana Ultimate'>
                                    <button class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5gs.png' alt='' class='w-100'></button>
                                </span>
                                <?php elseif($user->LevelID==5):?>
                                <span class='d-inline-block w-15 example-popover' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Beginner'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge1.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Intermediate'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge2.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Enhanced'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge3.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Advanced'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 4000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge4.png' alt='' class='w-100'></button>
                                </span>
                                <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover'
                                    data-bs-placement="top" data-bs-trigger='hover focus' title='Lencana Ultimate'
                                    data-bs-content='Penghargaan karena kamu telah mencapai 8000XP'> <button
                                        class='btn m-0 p-0' type='button' disabled> <img
                                            src='<?=base_url()?>assets/badge/badge5.png' alt='' class='w-100'></button>
                                </span>
                                <?php endif;?>
                            </div>
                            <!-- end badges -->
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="<?=base_url()?>assets/character/char<?=$user->LevelID?>.png" class="character" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <!-- Track Record Kegiatan -->
                
            </div>
        </div>     
    </div>
    <div class="row mt-4">
        <h6 class="text-dark font-weight-bolder mb-2 pt-2">Continue Class</h6>
        <?php if (!empty($courseList)) :?>

        <?php foreach ($courseList as $row):?>
        <div class="col-md-3 mt-2">
            <a href="<?=base_url()?>lesson/course/<?=$row->CourseID?>">
                <div class="card course-link">
                    <div class="card-body align-items-center">
                        
                        <img src="<?=base_url()?>assets/clearn/icon_course.svg" class="w-100 " alt="icon course">
                            
                                <p class=" text-dark fw-bold mb-0"><?=$row->CourseName?></p>
                                <p class=" text-secondary fw-bold mb-0 small"><?=$row->ClassName?> -
                                        <?=$row->SchoolName?></p>
                            
                        
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach;?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <!-- <a href="<?=base_url()?>siswa/kelas" class="btn btn-warning me-md-2" type="button">Lihat Semua Kelas</a> -->
        </div>

        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Kamu belum mendaftar kelas apapun</p>
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-warning ml-3 mt-3">Temukan Kelas</a>
            </div>
        </div>
        <?php endif;?>

    </div>

</div>
</main>