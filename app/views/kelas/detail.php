<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Jadwal pelajaran</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div id="panel-add"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <form action="<?= BASEURL ?>/detailpelajaran/store" method="post">
            <div class="w-[400px]">
                <input type="text" name="id_kelas" value="<?= $data['id_kelas'] ?>" hidden>
                <label for="id_pelajaran" class="font-semibold">Pilih pelajaran</label>
                <br>
                <select name="id_pelajaran" id="id_pelajaran"
                    class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-full border border-[#161f3d]">
                    <?php
                    foreach ($data['pelajarans'] as $pelajaran) {
                        echo "<option value='" . $pelajaran['id'] . "'>" . $pelajaran['nama'] . " <em>(" . $pelajaran['guru'] . ")</em></option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="flex justify-between">
                <button onclick="{popUpPanel('panel-add'); event.preventDefault()}"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#ED5555] hover:bg-[#9e3939] duration-200">Close
                </button>
                <button type="submit"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Tambah
                    pelajaran
                </button>
            </div>
        </form>
    </div>
    <div id="panel-delete"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">Id</th>
                    <th class="p-2.5 text-white">Mata pelajaran</th>
                    <th class="p-2.5 text-white">Guru</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-mata-pelajaran" class="table-auto">
                <?php
                foreach ($data['detail_pelajarans'] as $detail_pelajaran) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . $detail_pelajaran['id'] . "</td>";
                    echo "<td class='p-3'>" . $detail_pelajaran['nama'] . "</td>";
                    echo "<td class='p-3'>" . $detail_pelajaran['guru'] . "</td>";
                    echo "<td class='px-3 h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/detailpelajaran/delete/" . $detail_pelajaran['id'] . "/" . $data['id_kelas'] . "' class='text-white font-semibold px-4 py-1 bg-[#ED5555] hover:bg-[#9e3939] duration-200 rounded-lg'>delete</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <div class="flex justify-between">
            <button onclick="popUpPanel('panel-delete')"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#ED5555] hover:bg-[#9e3939] duration-200">Close
            </button>
            <button onclick="{popUpPanel('panel-add'); popUpPanel('panel-delete')}"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                Pelajaran
            </button>
        </div>
    </div>
    <div id="panel-jadwal"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <h1 class="text-xl font-bold mb-4">Add Jadwal pelajaran</h1>
        <form action="<?= BASEURL ?>/jadwalkelas/store" method="post">
            <div class="w-[400px]">
                <input type="text" name="id_kelas" value="<?= $data['id_kelas'] ?>" hidden>
                <label for="id_pelajaran" class="font-semibold">Pilih pelajaran</label>
                <br>
                <select name="id_pelajaran" id="id_pelajaran"
                    class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-full border border-[#161f3d]">
                    <?php
                    foreach ($data['detail_pelajarans'] as $pelajaran) {
                        echo "<option value='" . $pelajaran['id_pelajaran'] . "'>" . $pelajaran['nama'] . " <em>(" . $pelajaran['guru'] . ")</em>" . "</option>";
                    }
                    ?>
                </select>
                <div class="mt-2">

                    <label for="jam" class="font-semibold">Jam</label>
                    <br>
                    <select name="jam" id="jam" class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-full border border-[#161f3d]">
                        <option value="1">07:00 - 08:00</option>
                        <option value="2">08:00 - 09:00</option>
                        <option value="3">09:00 - 10:00</option>
                        <option value="4">10:00 - 11:00</option>
                        <option value="5">11:00 - 12:00</option>
                        <option value="6">12:00 - 13:00</option>
                        <option value="7">13:00 - 14:00</option>
                        <option value="8">14:00 - 15:00</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="hari" class="font-semibold">Hari</label>
                    <br>
                    <select name="hari" id="hari"
                        class="mt-2 p-2 rounded-lg bg-[#eff0f5] w-full border border-[#161f3d]">
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jum'at</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="flex justify-between">
                <button onclick="{popUpPanel('panel-jadwal'); event.preventDefault()}"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#ED5555] hover:bg-[#9e3939] duration-200">Close
                </button>
                <button type="submit"
                    class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Submit
                </button>
            </div>
        </form>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class="flex gap-3 w-full text-end justify-end">
            <button onclick="popUpPanel('panel-jadwal');"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                Jadwal
            </button>
            <button onclick="popUpPanel('panel-delete');"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Daftar
                Pelajaran
            </button>
        </div>
        <div class="mt-4 grid grid-cols-5 gap-3">
            <?php
            $list_jadwal = [
                "07:00 - 08:00",
                "08:00 - 09:00",
                "09:00 - 10:00",
                "10:00 - 11:00",
                "11:00 - 12:00",
                "12:00 - 13:00",
                "13:00 - 14:00",
                "14:00 - 15:00"
            ];
            ?>
            <div class="card p-3">
                <h2 class="font-semibold mb-2">Senin</h2>
                <?php
                foreach ($data['senins'] as $senin) {
                    echo "<div class='group flex gap-1 items-center'>";
                    echo "<p class='text-sm'><span class='font-semibold'>" . $list_jadwal[$senin['jam'] - 1] . "</span> | " . $senin['nama'] . " <em>(" . $senin['guru'] . ")</em></p>";
                    echo "<a href='" . BASEURL . "/jadwalkelas/delete/" . $senin['id'] . "/" . $data['id_kelas'] . "'><i class='text-xs fa-solid fa-trash-can hidden group-hover:block'></i></a>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="card p-3">
                <h2 class="font-semibold mb-2">Selasa</h2>
                <?php
                foreach ($data['selasas'] as $selasa) {
                    echo "<div class='group flex gap-1 items-center'>";
                    echo "<p class='text-sm'><span class='font-semibold'>" . $list_jadwal[$selasa['jam'] - 1] . "</span> | " . $selasa['nama'] . " <em>(" . $selasa['guru'] . ")</em></p>";
                    echo "<a href='" . BASEURL . "/jadwalkelas/delete/" . $selasa['id'] . "/" . $data['id_kelas'] . "'><i class='text-xs fa-solid fa-trash-can hidden group-hover:block'></i></a>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="card p-3">
                <h2 class="font-semibold mb-2">Rabu</h2>
                <?php
                foreach ($data['rabus'] as $rabu) {
                    echo "<div class='group flex gap-1 items-center'>";
                    echo "<p class='text-sm'><span class='font-semibold'>" . $list_jadwal[$rabu['jam'] - 1] . "</span> | " . $rabu['nama'] . " <em>(" . $rabu['guru'] . ")</em></p>";
                    echo "<a href='" . BASEURL . "/jadwalkelas/delete/" . $rabu['id'] . "/" . $data['id_kelas'] . "'><i class='text-xs fa-solid fa-trash-can hidden group-hover:block'></i></a>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="card p-3">
                <h2 class="font-semibold mb-2">Kamis</h2>
                <?php
                foreach ($data['kamises'] as $kamis) {
                    echo "<div class='group flex gap-1 items-center'>";
                    echo "<p class='text-sm'><span class='font-semibold'>" . $list_jadwal[$kamis['jam'] - 1] . "</span> | " . $kamis['nama'] . " <em>(" . $kamis['guru'] . ")</em></p>";
                    echo "<a href='" . BASEURL . "/jadwalkelas/delete/" . $kamis['id'] . "/" . $data['id_kelas'] . "'><i class='text-xs fa-solid fa-trash-can hidden group-hover:block'></i></a>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="card p-3">
                <h2 class="font-semibold mb-2">Jum'at</h2>
                <?php
                foreach ($data['jumats'] as $jumat) {
                    echo "<div class='group flex gap-1 items-center'>";
                    echo "<p class='text-sm'><span class='font-semibold'>" . $list_jadwal[$jumat['jam'] - 1] . "</span> | " . $jumat['nama'] . " <em>(" . $jumat['guru'] . ")</em></p>";
                    echo "<a href='" . BASEURL . "/jadwalkelas/delete/" . $jumat['id'] . "/" . $data['id_kelas'] . "'><i class='text-xs fa-solid fa-trash-can hidden group-hover:block'></i></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <h1 class="text-xl font-bold mb-4">Daftar siswa</h1>
    <div class="card p-8 bg-[#fbfbfb]">
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">No</th>
                    <th class="p-2.5 text-white">Nama</th>
                    <th class="p-2.5 text-white">Nilai rata-rata</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-auto">
                <?php
                foreach ($data['siswas'] as $siswa) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . $siswa['id'] . "</td>";
                    echo "<td class='p-3'>" . $siswa['nama'] . "</td>";
                    echo "<td class='p-3'>" . $siswa['total_nilai'] . "</td>";
                    echo "<td class='h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/nilai/detailnilai/" . $data['id_kelas'] . "/" . $siswa['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200 rounded-lg'>Edit nilai</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>