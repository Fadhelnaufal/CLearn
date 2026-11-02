<div class="row mx-0 mt-4">

    <div class="card bg-lightyellow">
        <div class="card-body row p-2">
             <div class="col-md-6 d-none d-sm-block">
                <img src="<?=base_url()?>assets/clearn/info_obj.svg" alt="" srcset="" class="w-80 mt-4">
                <a href="https://storyset.com/education" class="d-none">Education illustrations by Storyset</a>
            </div>
            <div class="col-md-6" >
                <form action="<?=base_url()?>guru/editkelas/<?=$course->CourseID?>" method="post"
                    enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="CourseName" class="form-label text-purple">Nama Mata Pelajaran</label>
                        <input type="text" name="CourseName" class="form-control  text-dark"
                            placeholder="Masukkan Nama Mata Pelajaran" required value="<?=$course->CourseName?>">
                    </div>
                    <div class="mb-3">
                        <label for="SchoolName" class="form-label text-purple">Nama Sekolah</label>
                        <input type="text" name="SchoolName" class="form-control  text-dark"
                            placeholder="Masukkan Nama Sekolah" required value="<?=$course->SchoolName?>">
                    </div>
                    <div class="mb-3">
                        <label for="ClassName" class="form-label text-purple">Kelas</label>
                        <input type="text" name="ClassName" class="form-control  text-dark"
                            placeholder="Masukkan Nama Kelas (contoh: XII RPL D)" required
                            value="<?=$course->ClassName?>">
                    </div>
                    <div class="mb-3">
                        <label for="CourseLogo" class="form-label text-purple">Logo Kelas (.jpg/.png)</label>
                        <img src="<?=base_url()?>media/logo/<?=$course->CourseLogo?>" alt="" srcset="" class="d-block"
                            style="width:100px">
                        <input type="file" name="CourseLogo" class="form-control  text-light mt-2" accept="image/*">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning">Edit Kelas</button>
                        <a class="btn btn-danger position-absolute end-2" data-bs-toggle="modal"
                            data-bs-target="#hapusKelas">Hapus Kelas</a>
                        <!-- Modal hapus-->
                        <div class="modal fade" id="hapusKelas" tabindex="-1" aria-labelledby="hapusKelasLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content modal-danger">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-2 my-auto text-right">
                                                <i class="fas fa-exclamation-triangle fs-1 text-danger"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="text-danger fw-bold">Anda yakin ingin menghapus kelas?</p>
                                                <p class="text-white small mb-3">Tindakan ini akan menghapus semua data kelas
                                                    termasuk siswa, nilai, dan materi. Siswa tidak dapat mengakses kelas ini
                                                    lagi.</p>

                                                <a href="<?=base_url()?>guru/hapuskelas/<?=$course->CourseID?>"
                                                    type="button" class="btn btn-danger btn-sm">Hapus Kelas</a>
                                                <button type="button"
                                                    class="btn btn-dark btn-sm position-absolute end-3"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
           


        </div>
    </div>



</div>
</div>
</main>