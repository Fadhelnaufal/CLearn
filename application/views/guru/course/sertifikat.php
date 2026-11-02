<div class="row">
<div class="col-md-4 mt-4">
    <p class="fw-bold text-dark small my-3"> <i class="fas fa-dot-circle text-warning me-1"></i> SERTIFIKAT</p>
    <div class="card mt-3">
        <div class="card-body">
            <form action="<?=base_url()?>guru/sertifikat/<?=$course->CourseID?>" method="post" enctype='multipart/form-data'>
            <div class="form-group row">
                <label class=" text-dark">Unggah Sertifikat</label>
                <div class="col-md-12">
                    <input type="file" name="Sertifikat" class="form-control  text-light mt-2" accept="image/*">

                    <input type="submit" class="btn btn-primary float-right mt-4 pl-5 pr-5" value="Simpan">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8 mt-4">
    <p class="fw-bold text-dark small my-3"> <i class="fas fa-dot-circle text-warning me-1"></i> </p>
    <div class="card mt-3">
        <div class="card-body">
            <div class="form-group row">
                <label class=" text-dark">Tampilan</label>
                <div class="col-md-12">
                    <img src="<?=base_url()?>assets/sertifikat/<?=$course->Sertifikat?>" alt="" srcset="" class="d-block"
                            style="width:100px">
                </div>
            </div>
        </div>
    </div>
</div>
</div>