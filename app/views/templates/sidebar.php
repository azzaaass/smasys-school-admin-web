<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="flex h-screen bg-[#eff0f5]">
        <div class="w-72 bg-[#161f3d] text-white">
            <div>
                <h2 class="mt-4 ml-8 text-3xl font-semibold"><i class="mr-3 fa-brands fa-centos"></i>SMASYS</h2>
                <ul class="mt-4">
                <li class="flex group">
                    <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/dashboard/index" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-house"></i>Dashboard</p>
                            </a>
                        </div>
                        <li class="flex group">
                    <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/pelajaran/index" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-chalkboard-user"></i>Guru</p>
                            </a>
                        </div>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                    <li class="flex group">
                    <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/kelas/index" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-people-roof"></i>Kelas</p>
                            </a>
                        </div>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                    <li class="flex group">
                    <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/organisasi/index" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-user-group"></i>Organisasi</p>
                            </a>
                        </div>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                    <li class="flex group">
                    <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/siswa/index" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-graduation-cap"></i>Siswa</p>
                            </a>
                        </div>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                    <li class="flex group">
                        <div class="w-[95%] py-3 px-8 bg-gradient-to-r group-hover:from-[#161F3D] group-hover:to-[#1D2F69]">
                            <a href="<?= BASEURL ?>/auth/logout" class="hover:text-white">
                                <p class="text-lg"><i class="mr-3 fa-solid fa-right-from-bracket"></i>Logout</p>
                            </a>
                        </div>
                        <div class="group-hover:bg-[#1D2F69] w-[5%]"></div>
                    </li>
                </ul>
            </div>
        </div>