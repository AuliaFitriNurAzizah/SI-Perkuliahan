<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}
include "koneksi.php";
$database = new database;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="../../output.css">
</head>
  <body class="bg-rose-900 h-full text-white">

  <!-- navbar start -->
  <div class="navbar bg-base-100">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">daisyUI</a>
  </div>
  <div class="flex-none gap-2">
    <div class="form-control">
      <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
    </div>
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img
            alt="Tailwind CSS Navbar component"
            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
        </div>
      </div>
      <ul
        tabindex="0"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
        <li>
          <a class="justify-between">
            Profile
            <span class="badge">New</span>
          </a>
        </li>
        <li><a>Settings</a></li>
       <li><a  href="logout.php">Logout</a></li>
      
      </ul>
    </div>
  </div>
</div>

<!-- end navbar -->

<!-- hero -->
<!-- <div
  class="hero min-h-screen"
  style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
  <div class="hero-overlay bg-opacity-60"></div>
  <div class="hero-content text-neutral-content text-center">
    <div class="max-w-md">
      <h6 class="mb-5 text-5xl font-bold">SI PERKULIAHAN</h6>
      <p class="mb-5">
      <div>
    <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
    <p>Sistem Informasi Perkuliahan</p>
  </div>
      </p>
      <button class="btn btn-primary">Get Started</button>
    </div>
  </div>
</div> -->
<!-- hero -->
  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    href="../output.css"
    rel="stylesheet"/>
   
</head>
<body class="font-sans text-gray-800 bg-white">
    <!-- start: sidebar -->
     <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4">
            <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="" class="w-8 h-8 rounded object-cover">
            <span class="text-lg font-bold text-white ml-3">Sistem Perkuliahan</span>
            </a>

            <!-- start sidenav  -->
            <ul class="mt-4 sidebar-menu" >
                <li class="mb-1 group active">
                    <a href="#" class="flex items-center py-2 px-4 text-gray-400 hover:text-gray-100 hover:bg-gray-900 rounded-md group-[.active]:bg-gray-800 group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
</svg>
                    <span class="text-sm pl-3">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group" onclick="dropDown1()">
                    <a href="#" class="flex items-center py-2 px-4 text-gray-400 hover:text-gray-100 hover:bg-gray-950 rounded-md group-[.active]:bg-gray-900  group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
</svg>
                    <span class="text-sm pl-3">Inventory</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 ml-auto rotate-90" id="arrow1">
  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /> 
</svg>
                    </a>
                </li>
                <!-- start main content  -->
                    <div class=" leading-7 text-left text-sm " id="submenu1">
                        <a href="../mahasiswa/tampil_mhs.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md text-gray-200 pl-5">•  Mahasiswa</h1></a>
                        <a href="../dosen/tampil_dosen.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md mt-1 text-gray-200 pl-5">•  Dosen</h1></a>
                        <a href="../prodi/tampil_data.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md mt-1 text-gray-200 pl-5">•  Prodi</h1></a>
                        <a href="../matkul/tampil_matkul.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md mt-1 text-gray-200 pl-5">•  Matkul</h1></a>
                        <a href="../kelas/tampil_kls.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md mt-1 text-gray-200 pl-5">•  Kelas</h1></a>
                    </div>
                <!-- end main content  -->

                <li class="mb-1 group"  onclick="dropDown2()">
                    <a href="#" class="flex items-center py-2 px-4 text-gray-400 hover:text-gray-100 hover:bg-gray-950 rounded-md group-[.active]:bg-gray-800  group-[.active]:text-white  group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
                    <span class="text-sm pl-3">User</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 ml-auto rotate-90" id="arrow2">
  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
</svg>
                    </a>
                </li>

                <!-- start main user   -->
                <div class=" leading-7 text-left text-sm " id="submenu2">
                    <a href="tampil_user.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md text-gray-200 pl-5">•  Akun</h1></a>
                    <a href="logout.php"><h1 class="cursor-pointer p-1 hover:bg-gray-700 rounded-md mt-1 text-gray-200 pl-5">•  Logout</h1></a>
                </div>
                <!-- end main user  -->

            </ul>
            <!-- end sidenav -->
            
     </div>
    <!-- end: sidebar -->

<div class="ml-[16%]">
<div
  class="hero min-h-screen"
  style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
  <div class="hero-overlay bg-opacity-60"></div>
  <div class="hero-content text-neutral-content text-center">
    <div class="max-w-md">
      <h6 class="mb-5 text-5xl font-bold">SI PERKULIAHAN</h6>
      <p class="mb-5">
      <div>
    <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
    <p>Sistem Informasi Perkuliahan</p>
  </div>
      </p>

<!--stat mahasiswa-->
      <div class="flex  justify-center">
      <div class="stats shadow w-fit">
  <div class="stat">
    <div class="stat-figure text-primary">
      <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg> -->
    </div>
    <div class="stat-title">Data Mahasiswa</div>
    <div class="stat-value text-primary"><?= $database->getAllData("tb_mahasiswa")?></div>
    <div class="stat-desc">Terdapat <?= $database->getAllData("tb_mahasiswa")?> data mahasiswa </div>
  </div>
  
  <!--stat dosen-->
  <div class="stat">
    <div class="stat-figure text-primary">
      <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg> -->
    </div>
    <div class="stat-title">Dosen</div>
    <div class="stat-value text-primary"><?= $database->getAllData("tb_dosen")?></div>
    <div class="stat-desc">Terdapat <?= $database->getAllData("tb_dosen")?> data dosen</div>
  </div>
  
  <!--stat kelas-->
  <div class="stat">
    <div class="stat-figure text-primary">
      <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg> -->
    </div>
    <div class="stat-title">Kelas</div>
    <div class="stat-value text-primary"><?= $database->getAllData("tb_kls")?></div>
    <div class="stat-desc">Terdapat <?= $database->getAllData("tb_kls")?> data kelas</div>
  </div>
 
 <!--stat matkul-->
  <div class="stat">
    <div class="stat-figure text-primary">
      <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg> -->
    </div>
    <div class="stat-title">Matkul</div>
    <div class="stat-value text-primary"><?= $database->getAllData("tb_matkul")?></div>
    <div class="stat-desc">Terdapat <?= $database->getAllData("tb_matkul")?> data matkul </div>
  </div>
  
  <!--stat prodi-->
  <div class="stat">
    <div class="stat-figure text-primary">
      <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg> -->
    </div>
    <div class="stat-title">Prodi</div>
    <div class="stat-value text-primary"><?= $database->getAllData("tb_prodi")?></div>
    <!-- <div class="stat-desc">21% more than last month</div> -->
    <div class="stat-desc">Terdapat <?= $database->getAllData("tb_prodi")?> data prodi</div>
  </div>

  


  
 
  
  
  
  <!-- <div class="stat">
    <div class="stat-figure text-secondary">
      <div class="avatar online">
        <div class="w-16 rounded-full">
          <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
        </div>
      </div>
    </div>
    <div class="stat-value">86%</div>
    <div class="stat-title">Tasks done</div>
    <div class="stat-desc text-secondary">31 tasks remaining</div>
  </div>
</div> -->
      </div>
    </div>
  </div>
</div>
</div>



   
    <script>
        function dropDown1() {
        document.querySelector('#submenu1').classList.toggle('hidden')
        document.querySelector('#arrow1').classList.toggle('rotate-0')
        }
        dropDown1()

        function dropDown2() {
        document.querySelector('#submenu2').classList.toggle('hidden')
        document.querySelector('#arrow2').classList.toggle('rotate-0')
        }
        dropDown2()

        function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
        }
    </script>
    
</body>

</html>
















    <!-- <nav>
      
       <br>
      <br>
 
  <div>
    <ul>
      <li>
        <a href="#">Home </a>
      </li>

      <li>
        <a href="kelas/tampil_kls.php">Kelas</a>
      </li>

      <li>
        <a href="mahasiswa/tampil_mhs.php">Mahasiswa</a>
      </li>

      <li>
        <a href="prodi/tampil_data.php">Prodi</a>
      </li>
    </ul>

    <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a>
  </div>

</nav> -->
 
<!-- <main>
  <div>
    <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
    <p>Sistem Informasi Perkuliahan</p>
  </div>
</main> -->

</body>
</html>
