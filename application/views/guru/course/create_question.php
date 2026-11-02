<div class="card  mb-3">
    <h4 class="p-2  text-light"> Soal Nomor <?= (int)($nomor_soal->jumlah) + 1 ?></h4>
</div>
<div class="card pb-2 mb-3">
    <div class="container">
        <form action="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <label class="col-form-label text-light">Pertanyaan </label>
                <textarea name="soal" class="form-control bg-darkblue text-light" rows="3"></textarea>
            </div>
            <div class="col-12 mt-2">
                <div class="col-sm-12">
                    <label class="col-form-label text-light ">Jawaban A </label>
                </div>
                <div class="col-md-12">
                    <input type="text" name='jawaban_1' class="form-control bg-darkblue text-light">
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="col-sm-12">
                    <label class="col-form-label text-light ">Jawaban B </label>
                </div>
                <div class="col-sm-12">
                    <input type="text" name='jawaban_2' class="form-control bg-darkblue text-light">
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="col-sm-12">
                    <label class="col-form-label text-light ">Jawaban C </label>
                </div>
                <div class="col-sm-12">
                    <input type="text" name='jawaban_3' class="form-control bg-darkblue text-light">
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="col-sm-12">
                    <label class="col-form-label text-light ">Jawaban D </label>
                </div>
                <div class="col-sm-12">
                    <input type="text" name='jawaban_4' class="form-control bg-darkblue text-light">
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="col-sm-12">
                    <label class="col-form-label text-light ">Jawaban E </label>
                </div>
                <div class="col-sm-12">
                    <input type="text" name='jawaban_5' class="form-control bg-darkblue text-light">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="inputState" class="col-form-label">Jawaban Benar</label>
                    <select id="inputState" name="TrueOption" class="form-select">
                        <option selected value="">Choose...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>

                    </select>
                </div>
                <div class="col-md-5">
                    <label for="inputCity" class="col-form-label">Gambar</label>
                    <input type="file" name="file" class="form-control" id="inputCity">
                </div>

                <div class="col-md-4">
                    <label for="inputCity" class="col-form-label mt-3"> </label>
                    <div class="input-group">
                        <input type="submit" name="processed" value="Tambah Soal" class="form-control btn btn-outline-secondary bg-secondary" id="inputCity">
                        <input type="submit" name="processed" value="Simpan" class="form-control btn btn-outline-secondary bg-primary" id="inputCity">
                    </div>

                </div>

        </form>


    </div>



</div>

</div>