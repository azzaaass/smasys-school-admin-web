<div class="flex-1 p-8">
    <h1 class="text-xl font-bold mb-4">Pilih Organisasi</h1>
    <div>
        <?php Flasher::flash(); ?>
    </div>
    <div class="card p-8 bg-[#fbfbfb]">
        <div class=" w-full text-end">
            <a href="<?= BASEURL ?>/organisasi/add"
                class="text-white text-md font-semibold rounded-md px-6 py-2 bg-[#5570ed] hover:bg-[#3c51b1] duration-200">Add
                Organisasi</a>
        </div>
        <table class="mt-4 min-w-full overflow-hidden rounded-t-lg">
            <thead class="text-md bg-[#5570ed]">
                <tr>
                    <th class="p-2.5 text-white">No</th>
                    <th class="p-2.5 text-white">Nama</th>
                    <th class="p-2.5 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-auto">
                <?php
                foreach ($data['organisasis'] as $organisasi) {
                    echo "<tr class='bg-[#eff0f5]'>";
                    echo "<td class='p-3'>" . $organisasi['id'] . "</td>";
                    echo "<td class='p-3'>" . $organisasi['nama'] . "</td>";
                    echo "<td class='h-full w-min'>" .
                        "<div class='flex gap-3'>" .
                        "<a href='" . BASEURL . "/organisasi/detail/" . $organisasi['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#5570ed] hover:bg-[#3c51b1] duration-200 rounded-lg'>preview</a>" .
                        "<a href='" . BASEURL . "/organisasi/delete/" . $organisasi['id'] . "' class='text-white font-semibold px-4 py-1 bg-[#ED5555] hover:bg-[#9e3939] duration-200 rounded-lg'>delete</a>" .
                        "</div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>