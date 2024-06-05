<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Tambah Kelas</h1>
    <div class="card p-8 bg-[#fbfbfb]">
        <form action="<?= BASEURL ?>/kelas/store" method="post">
            <div class="grid grid-cols-3 gap-4">

                <div>
                    <label for="id_jurusan" class="font-semibold">Jurusan</label>
                    <br>
                    <select name="id_jurusan" id="id_jurusan"
                        class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                        <option value="1">IPA</option>
                        <option value="2">IPS</option>
                    </select>
                </div>
                <div>
                    <label for="nama" class="font-semibold">Nama</label>
                    <br>
                    <input type="text" id="nama" name="nama"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
                <div>
                    <label for="ketua_kelas" class="font-semibold">Ketua kelas</label>
                    <br>
                    <input type="text" id="ketua_kelas" name="ketua_kelas"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
                <div>
                    <label for="wali_kelas" class="font-semibold">Wali kelas</label>
                    <br>
                    <input type="text" id="wali_kelas" name="wali_kelas"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
                <div>
                    <label for="tingkat" class="font-semibold">Tingkat</label>
                    <br>
                    <select name="tingkat" id="tingkat"
                        class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                        <option value="10">Kelas 10</option>
                        <option value="11">Kelas 11</option>
                        <option value="12">Kelas 12</option>
                    </select>
                </div>
                <div>
                    <label for="tahun_ajar" class="font-semibold">Tahun Ajar</label>
                    <br>
                    <input type="text" id="tahun_ajar" name="tahun_ajar"
                        class="mt-2 p-1.5 rounded-lg bg-[#eff0f5] w-[90%] border border-[#161f3d]">
                </div>
            </div>
            <br>
            <div class="mt-10 w-full text-end flex justify-end gap-4">
                <a href="<?= BASEURL ?>/kelas"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#ED5555] hover:bg-[#9E3939] duration-200">
                    Cancel</a>
                <button type="submit"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                    Kelas</button>
            </div>
        </form>
    </div>
</div>