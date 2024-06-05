<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Daftar siswa</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class="flex justify-between items-center mb-4">
            <a href="<?= BASEURL ?>/siswa/add"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                Siswa</a>
            <form action="<?= BASEURL ?>/siswa/search" method="post" class="flex items-center">
                <input type="text" name="keyword" placeholder="Cari siswa..." value="<?= isset($data['keyword']) ? $data['keyword'] : '' ?>" class="border border-gray-300 px-3 py-1 rounded-md mr-2">
                <select name="search_type" class="border border-gray-300 px-3 py-1 rounded-md mr-2">
                    <option value="nama" <?= isset($data['search_type']) && $data['search_type'] == 'nama' ? 'selected' : '' ?>>Nama</option>
                    <option value="kelas" <?= isset($data['search_type']) && $data['search_type'] == 'kelas' ? 'selected' : '' ?>>Kelas</option>
                </select>
                <button type="submit" class="text-white font-semibold rounded-md px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Search</button>
            </form>
        </div>
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">No</th>
                    <th class="p-2.5 text-white">Nama</th>
                    <th class="p-2.5 text-white">Kelas</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-auto">
                <?php
                foreach ($data['siswas'] as $index => $siswa) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . ($index + 1) . "</td>";
                    echo "<td class='p-3'>" . $siswa['nama'] . "</td>";
                    echo "<td class='p-3'>" . (isset($siswa['kelas_nama']) ? $siswa['kelas_nama'] : 'Tidak punya kelas') . "</td>";
                    echo "<td class='h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/siswa/detail/" . $siswa['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200 rounded-lg'>preview</a>" .
                        "<a href='" . BASEURL . "/siswa/delete/" . $siswa['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#ED5555] hover:bg-[#9e3939] duration-200 rounded-lg'>delete</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
