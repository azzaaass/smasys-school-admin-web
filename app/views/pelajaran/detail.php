<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Tambah Siswa</h1>
    <div class="card p-8 bg-[#fbfbfb]">
        <form action="<?= BASEURL ?>/pelajaran/update" method="post">
            <div class="grid grid-cols-3 gap-4">
            <input type="text" name="id" value="<?= $data['pelajaran']['id'] ?>" hidden>
                <div>
                    <label for="nip" class="font-semibold">NIP</label>
                    <br>
                    <input type="text" id="nip" name="nip" value="<?php echo  $data['pelajaran']['nip']?>"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
                <div>
                    <label for="guru" class="font-semibold">Nama Guru</label>
                    <br>
                    <input type="text" id="guru" name="guru" value="<?php echo  $data['pelajaran']['guru']?>"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
                <div>
                    <label for="nama" class="font-semibold">Mata pelajaran</label>
                    <br>
                    <input type="text" id="nama" name="nama" value="<?php echo  $data['pelajaran']['nama']?>"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
            </div>
            <br>
            <div class="mt-10 w-full text-end flex justify-end gap-4">
                <a href="<?= BASEURL ?>/pelajaran" onclick="return confirm('Apakah Anda yakin ingin membatalkan?')"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#ED5555] hover:bg-[#9E3939] duration-200">
                    Cancel
                </a>

                <button type="submit"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                    Siswa</button>
            </div>
        </form>
    </div>
</div>