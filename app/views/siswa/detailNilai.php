<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Detail Nilai</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class="grid grid-cols-4 gap-4">
            <?php foreach ($data['nilais'] as $nilai) { ?>
                <div>
                    <form action="<?= BASEURL ?>/nilai/update" method="post">
                        <label for="nilai" class="font-semibold"><?= $nilai['nama'] ?></label>
                        <br>
                        <div class="flex">
                            <input type="text" name="id_kelas" value="<?= $data['id_kelas'] ?>" hidden>
                            <input type="text" name="id_siswa" value="<?= $data['id_siswa'] ?>" hidden>
                            <input type="text" name="id_nilai" value="<?= $nilai['id'] ?>" hidden>
                            <input type="text" id="nilai" name="nilai" value="<?= $nilai['nilai'] ?>"
                                class="mt-2 p-1.5 rounded-l-lg bg-[#eff0f5] w-[80%] border border-[#161f3d]">
                            <button type="submit"
                                class="mt-2 p-1.5 rounded-r-lg bg-[#eff0f5] w-[10%] border border-[#161f3d] text-center">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <?php foreach ($data['nilai_nulls'] as $nilai) { ?>
                <div>
                    <form action="<?= BASEURL ?>/nilai/store" method="post">
                        <label for="nilai" class="font-semibold"><?= $nilai['nama'] ?><em> (Belum dibuat)</em></label>
                        <br>
                        <div class="flex">
                            <input type="text" name="id_kelas" value="<?= $data['id_kelas'] ?>" hidden>
                            <input type="text" name="id_siswa" value="<?= $data['id_siswa'] ?>" hidden>
                            <input type="text" name="id_pelajaran" value="<?= $nilai['id_pelajaran_target'] ?>" hidden>
                            <input type="text" id="nilai" name="nilai" value="kosong"
                                class="mt-2 p-1.5 rounded-l-lg bg-[#eff0f5] w-[80%] border border-[#161f3d]">
                            <button type="submit"
                                class="mt-2 p-1.5 rounded-r-lg bg-[#eff0f5] w-[10%] border border-[#161f3d] text-center">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class="grid grid-cols-4 gap-4">
            <?php
            foreach ($data['nilai_deletes'] as $nilai) { ?>
                <div>
                    <form action="<?= BASEURL ?>/nilai/delete" method="post">
                        <label for="nilai" class="font-semibold"><?= $nilai['nama'] ?> telah hilang dari kelas!</label>
                        <br>
                        <div class="flex">
                            <input type="text" name="id_kelas" value="<?= $data['id_kelas'] ?>" hidden>
                            <input type="text" name="id_siswa" value="<?= $data['id_siswa'] ?>" hidden>
                            <input type="text" name="id_nilai" value="<?= $nilai['id'] ?>" hidden>
                            <button type="submit"
                                class="mt-2 p-1.5 rounded-lg bg-[#ED5555] hover:bg-[#9E3939] text-white font-semibold duration-200 w-[50%] border border-[#161f3d] text-center">
                                <i class="fa-regular fa-trash-can"></i> tekan untuk hapus
                            </button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>