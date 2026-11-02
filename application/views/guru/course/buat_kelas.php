<div class="container-fluid py-4">
    <div class="row ms-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="" class="text-primary">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Kelas</li>
            </ol>
        </nav>

        <div class="col-md-6">
            <div class="card bg-lightgreen ">
                <div class="card-body rounded">
                    <form action="<?=base_url()?>guru/addkelas" method="post" enctype='multipart/form-data'>
                        <div class="mb-3">
                            <label for="CourseName" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" name="CourseName" class="form-control  text-dark"
                                placeholder="Masukkan Nama Mata Pelajaran" required>
                        </div>
                        <div class="mb-3">
                            <label for="SchoolName" class="form-label">Nama Sekolah</label>
                            <input type="text" name="SchoolName" class="form-control  text-dark"
                                placeholder="Masukkan Nama Sekolah" required>
                        </div>
                        <div class="mb-3">
                            <label for="ClassName" class="form-label">Kelas</label>
                            <input type="text" name="ClassName" class="form-control  text-dark"
                                placeholder="Masukkan Nama Kelas (contoh: XI RPL A)" required>
                        </div>
                        <div class="mb-3">
                            <label for="CourseLogo" class="form-label">Logo Kelas (.jpg/.png)</label>
                            <input type="file" name="CourseLogo" class="form-control  text-dark"
                                accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-white text-dark float-right">Buat Kelas</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md">
            <img src="<?=base_url()?>assets/img/vector/Learning-pana (1).svg" class="w-100" alt="">
        </div>
    </div>

</div>
</main>