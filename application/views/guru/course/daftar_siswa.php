<div class="row mx-0 mt-4">
    <p class="fw-bold text-dark small"> <i class="fas fa-dot-circle text-warning me-1"></i>DAFTAR NAMA SISWA</p>
    <div class="card mt-3">
        <div class="card-body overflow-auto">
            <table class="table table-hover mt-3" id="daftar_siswa">
                <thead>
                    <th>No</th>
                    <th>Avatar</th>
                    <th>Nama Lengkap</th>
                    <th>Skor EXP</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Opsi</th>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach($siswa as $row):?>
                    <tr>
                        <td><?=$i?></td>
                        <td>
                            <img src="<?=base_url()?>media/avatar/<?=$row->UserAvatar?>" class="small-ava" alt="">
                        </td>
                        <td><?=$row->UserName?></td>
                        <td><?=$row->courseXP?></td>
                        <td><?=$row->Level?></td>
                        <td><?=$row->UserEmail?></td>
                        <td><?=$row->UserContactNo?></td>
                        <td>
                          
                            <a href="" data-bs-toggle="modal" data-bs-target="#kick<?=$i?>">
                                <i class="fas fa-user-slash fs-5 text-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Keluarkan dari kelas"></i>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="kick<?=$i?>" tabindex="-1" aria-labelledby="kickLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content modal-warning">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-2 text-center my-auto">
                                                    <i class="fas fa-exclamation fs-1 text-warning"></i>
                                                </div>
                                                <div class="col-md-10 ">
                                                    <p class="text-warning fw-bold"> Keluarkan <?=$row->UserName?>?</p>

                                                    <a href="<?=base_url()?>guru/kick/<?=$row->CourseID?>/<?=$row->UserID?>"
                                                        type="button" class="btn btn-warning btn-sm">Ya</a>
                                                    <button type="button"
                                                        class="btn btn-dark btn-sm position-absolute end-3"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</main>