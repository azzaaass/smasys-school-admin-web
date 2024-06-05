<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Daftar siswa</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class="flex justify-between items-center mb-4">
            <a href="<?= BASEURL ?>/pelajaran/add"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                Siswa</a>
            <div class="flex items-center">
                <form action="<?= BASEURL ?>/pelajaran/index" method="post">
                    <input type="text" name="keyword" placeholder="Cari nip, guru atau pelajaran"
                        value="<?= isset($data['keyword']) ? $data['keyword'] : '' ?>"
                        class="border border-gray-300 px-3 py-1 rounded-md mr-2">
                    <button type="submit"
                        class="text-white font-semibold rounded-md px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Search</button>
                </form>
                <form action="<?= BASEURL ?>/pelajaran/index" method="post" id="form-sorting">
                    <select name="sort_type" class="ml-4 border border-gray-300 px-3 py-1 rounded-md mr-2" onchange="$('#form-sorting').submit();">
                        <option value="nip" <?= isset($data['sort_type']) && $data['sort_type'] == 'nip' ? 'selected' : '' ?>>NIP</option>
                        <option value="nama" <?= isset($data['sort_type']) && $data['sort_type'] == 'nama' ? 'selected' : '' ?>>Mata pelajaran</option>
                        <option value="guru" <?= isset($data['sort_type']) && $data['sort_type'] == 'guru' ? 'selected' : '' ?>>Guru</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">No</th>
                    <th class="p-2.5 text-white">NIP</th>
                    <th class="p-2.5 text-white">Guru</th>
                    <th class="p-2.5 text-white">Pelajaran</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-auto">
                <?php
                foreach ($data['pelajarans'] as $index => $pelajaran) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . ($index + 1) . "</td>";
                    echo "<td class='p-3'>" . $pelajaran['nip'] . "</td>";
                    echo "<td class='p-3'>" . $pelajaran['guru'] . "</td>";
                    echo "<td class='p-3'>" . $pelajaran['nama'] . "</td>";
                    echo "<td class='h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/pelajaran/detail/" . $pelajaran['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200 rounded-lg'>preview</a>" .
                        "<a href='" . BASEURL . "/pelajaran/delete/" . $pelajaran['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#ED5555] hover:bg-[#9e3939] duration-200 rounded-lg'>delete</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>