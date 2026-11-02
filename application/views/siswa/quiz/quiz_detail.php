<div class="row mx-4 mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="<?=base_url()?>lesson/course/<?=$CourseID?>"
                    class="text-primary fw-bold"><?= $CourseName?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$quiz->QuizTitle?>
            </li>
        </ol>
    </nav>
    <div class="card bg-lightyellow">
        <div class="card-body">
            <div class="row" id="start" style="display:flex">
                <div class="bg-white rounded text-dark fw-bold  p-2 small" style="margin-top:0rem"> <i
                        class="fas fa-star "></i> Reward hingga <?=$jmlsoal*50?> XP</div>
                <div class="col-md-6">
                    <img src="<?=base_url()?>assets/clearn/landing_obj2.svg" alt="" class="w-100" srcset="">
                </div>
                <div class="col-md-6 my-auto">
                    <p class="h3 text-dark text-uppercase"><?=$quiz->QuizTitle?></p>
                    <p class="text-dark h6">Jumlah Soal <?=$jmlsoal?></p>
                    <a href="#" class="btn btn-warning btn-lg mt-3" onclick="hideshow('start','Q1')">Mulai Quiz</a>
                </div>
            </div>
            <form action="<?= base_url('quiz/QuizResult/'.$quiz->QuizID.'/'.$CourseID) ?>" method="post" id="quizForm">
                <?php $x=1; foreach ($question as $row) : ?>
                <div class="row " id="Q<?=$x?>" style="display:none">
                    <div class="col-md-6 text-dark text-center my-auto h5">

                        <p class="fw-bold"><?= $row->Question ?></p>
                        <?php if ($row->question_img!=null):?>
                        <a href="<?=base_url()?>media/soal/<?=$row->question_img?>" target="_blank">
                            <img src="<?=base_url()?>media/soal/<?=$row->question_img?>" class="rounded ms-3 w-80 mt-2"
                                alt="">
                                 <p class="ps-3">Klik gambar untuk memperbesar</p>
                        </a>
                        <?php endif;?>
                    </div>
                    <div class="col-md-6 mt-3">
                        <!-- optA -->
                        <label for="optA<?=$row->QuestionID?>" class="d-block"
                            onclick="hideshow('Q<?=$x?>','Q<?=$x+1?>')">
                            <span class="btn btn-quiz py-3 w-100"><?= $row->OptionA ?></span>
                        </label>
                        <input type="radio" class="d-none" name="pertanyaan<?= $row->QuestionID ?>"
                            id="optA<?=$row->QuestionID?>" value="A">
                        <!-- optB -->
                        <label for="optB<?=$row->QuestionID?>" class="d-block"
                            onclick="hideshow('Q<?=$x?>','Q<?=$x+1?>')">
                            <span class="btn btn-quiz py-3 w-100"><?= $row->OptionB ?></span>
                        </label>
                        <input type="radio" class="d-none" name="pertanyaan<?= $row->QuestionID ?>"
                            id="optB<?=$row->QuestionID?>" value="B">
                        <!-- OptC -->
                        <label for="optC<?=$row->QuestionID?>" class="d-block"
                            onclick="hideshow('Q<?=$x?>','Q<?=$x+1?>')">
                            <span class="btn btn-quiz py-3 w-100"><?= $row->OptionC ?></span>
                        </label>
                        <input type="radio" class="d-none" name="pertanyaan<?= $row->QuestionID ?>"
                            id="optC<?=$row->QuestionID?>" value="C">
                        <!-- OptD -->
                        <label for="optD<?=$row->QuestionID?>" class="d-block"
                            onclick="hideshow('Q<?=$x?>','Q<?=$x+1?>')">
                            <span class="btn btn-quiz py-3 w-100"><?= $row->OptionD ?></span>
                        </label>
                        <input type="radio" class="d-none" name="pertanyaan<?= $row->QuestionID ?>"
                            id="optD<?=$row->QuestionID?>" value="D">
                        <!-- OptE -->
                        <label for="optE<?=$row->QuestionID?>" class="d-block"
                            onclick="hideshow('Q<?=$x?>','Q<?=$x+1?>')">
                            <span class="btn btn-quiz py-3 w-100"><?= $row->OptionE ?></span>
                        </label>
                        <input type="radio" class="d-none" name="pertanyaan<?= $row->QuestionID ?>"
                            id="optE<?=$row->QuestionID?>" value="E">
                    </div>

                </div>
                <?php $x++; endforeach;?>
                <div class="row" id="end" style="display:none">
                 
                    <div class="col-md-8 my-auto">
                        <p class="h3 text-white text-uppercase">Yeay! Kamu sudah menyelesaikan quiz</p>
                        <input type="hidden" name="count" value="<?=$jmlsoal?>">
                        <input type="submit" class="btn btn-primary btn-lg mt-3 text-wrap" value="Simpan dan Lihat Hasilnya">
                    </div>
                       <div class="col-md-4 mb-3">
                        <img src="<?=base_url()?>assets/img/vector/Online test-amico (1).svg" alt="" class="w-100"
                            srcset="">
                    </div>
                </div>
                <!-- <input type="submit" value="Selesei" class="btn btn-block btn-primary" id="send" display:none> -->
            </form>

        </div>
    </div>
</div>
</div>
</main>
<script>
function hideshow(hid, sho) {
    var myEle = document.getElementById(sho);
    if (myEle) {
        document.getElementById(hid).style.display = "none";
        myEle.style.display = "flex"
    } else {
        document.getElementById(hid).style.display = "none";
        document.getElementById("end").style.display = "flex";
    }
}
</script>