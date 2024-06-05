<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Anggota Organisasi</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div id="panel-add"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <form action="<?= BASEURL ?>/anggotaorganisasi/store" method="post">
            <div class="w-[400px]">
                <input type="text" name="id_organisasi" value="<?= $data['id_organisasi'] ?>" hidden>
                <label for="id_siswa" class="font-semibold">Pilih siswa</label>
                <br>
                <select name="id_siswa" id="id_siswa"
                    class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-full border border-[#161f3d]">
                    <?php
                    foreach ($data['siswas'] as $siswa) {
                        echo "<option value='" . $siswa['id'] . "'>" . $siswa['nama'] . " <em>(" . $siswa['kelas_nama'] . ")</em>" . "</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="flex justify-between">
                <button onclick="{popUpPanel('panel-add'); event.preventDefault()}"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Close
                </button>
                <button type="submit"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Submit
                </button>
            </div>
        </form>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">

        <div class=" w-full text-end">
            <button onclick="popUpPanel('panel-add');"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Tambah
                anggota
            </button>
        </div>
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">Id</th>
                    <th class="p-2.5 text-white">Nama</th>
                    <th class="p-2.5 text-white">Kelas</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-auto">
                <?php
                foreach ($data['anggota_organisasis'] as $anggota_organisasi) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . $anggota_organisasi['id'] . "</td>";
                    echo "<td class='p-3'>" . $anggota_organisasi['nama'] . "</td>";
                    echo "<td class='p-3'>" . $anggota_organisasi['nama_kelas'] . "</td>";
                    echo "<td class='h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/anggotaorganisasi/delete/" . $anggota_organisasi['id'] . "/" . $data['id_organisasi'] . "' class='text-white font-semibold px-4 py-1 bg-[#ED5555] hover:bg-[#9e3939] duration-200 rounded-lg'>delete</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>