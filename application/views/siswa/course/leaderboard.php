<div class="row mt-4 mx-0">
    <div class="col-md-6 d-none d-sm-block">
        <img src="<?=base_url()?>assets/clearn/rank_obj.svg" alt="">
    </div>
    <div class="col-md-6 card card-body ">
        <div class="row">
            <span class="fw-bold text-dark small mt-3 w-60"> <i class="fas fa-dot-circle text-warning me-1"
                    aria-hidden="true"></i>LEADERBOARD</span>
            <span class="fw-bold text-dark small mt-2 w-40 text-end"> <i class="fas fa-star text-warning"
                    aria-hidden="true"></i>
                SKOR
            </span>
        </div>
        <div class="mt-4 ">
            <?php foreach($leaderboard as $row):?>
            <div class="row bg-white rounded-pill py-3 border-start border-warning border-5">
                <div class="lb-forum w-20 my-auto">
                    <img src="<?=base_url()?>/media/avatar/<?=$row->UserAvatar?>" alt="image" class="w-35px my-auto">
                </div>
                <div class="nama-lb-forum w-60 my-auto">
                    <div class=" my-auto small fw-bold text-dark"><?=$row->UserName?></div>
                </div>
                <div class="skor-forum w-20 my-auto">
                    <div class="text-dark fw-bolder small"><?=$row->courseXP?></div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
    
</div>
</div>
</main>