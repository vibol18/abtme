<?php
include 'config.php';
global $conn;

// Fetch profile info from DB (assuming id = 1)
$result = $conn->query("SELECT * FROM profile WHERE id = 1");
$profile = $result->fetch_assoc();


if (isset($_POST['action']) && $_POST['action'] === 'follow') {
    $id = intval($_POST['id']);
    $conn->query("UPDATE profile SET followers = followers + 1 WHERE id = $id");
    $result = $conn->query("SELECT followers FROM profile WHERE id = $id");
    $row = $result->fetch_assoc();
    echo $row['followers'];
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: linear-gradient(180deg, #f8f9ff, #ffffff);
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="text-gray-800">
    <!-- Navbar -->
    <header class="bg-white/70 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center py-3">
            <h1 class="text-xl font-bold text-indigo-600">Portfolia</h1>
            <nav class="space-x-6 hidden md:block">
                <a href="#" class="hover:text-indigo-600 transition">Designers</a>
                <a href="#" class="hover:text-indigo-600 transition">Explore</a>
                <a href="https://vibol18.github.io/mitchacademytwo/" class="hover:text-indigo-600 transition">Projects</a>
                <a href="#" class="hover:text-indigo-600 transition">Work</a>
            </nav>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Upload</button>
        </div>
    </header>

    <!-- Profile Section -->
    <section class="max-w-6xl mx-auto px-4 mt-12 flex flex-col md:flex-row items-center gap-8" data-aos="fade-up">
        <img src="https://scontent.fpnh8-1.fna.fbcdn.net/v/t39.30808-6/528531811_762641566714914_828127759978536432_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeERWs5p5vP5OqniT-8I5oDEdfuJ1UE6k0J1-4nVQTqTQsngleg-N7fAy_8zIzzaGVYr8jnbwoDSmCe-iKmPxgUx&_nc_ohc=qrwUr3Ieq5oQ7kNvwEFhKGZ&_nc_oc=Adm0TC2ri9yghMm_-azPkq59rxExyivPgBGje5z9bI5hcLtfXYd5zilBnxuQQMqbVss&_nc_zt=23&_nc_ht=scontent.fpnh8-1.fna&_nc_gid=LFGVeyidD_ZDN2dNmcAjew&oh=00_AfimL_F1AiGShB8X2lgHJb12ZcCaBTCf_RaOlSkw6HgmsQ&oe=6926477F"
            class="w-32 h-32 rounded-2xl shadow-lg object-cover" alt="">
        <div>
            <h2 class="text-3xl font-semibold">Chhorn Vibol <span class="bg-indigo-100 text-indigo-600 text-sm px-2 py-0.5 rounded-lg ml-2">PRO +</span></h2>
            <p class="text-gray-500 mt-1">Teacher on Mitch Academy</p>

            <div class="flex gap-3 mt-4">
                <button id="followBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Follow</button>
                <button class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 transition">Get in touch</button>
            </div>
        </div>
    </section>

    <!-- Followers Section -->
    <section class="max-w-6xl mx-auto px-4 mt-10 flex justify-around text-center" data-aos="fade-up" data-aos-delay="200">
        <div>
            <h3 class="text-2xl font-bold"><span id="followersCount"><?= $profile['followers'] ?></span></h3>
            <p class="text-gray-500 text-sm">Followers</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold"><?= $profile['following'] ?></h3>
            <p class="text-gray-500 text-sm">Following</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold"><?= $profile['likes'] ?></h3>
            <p class="text-gray-500 text-sm">Likes</p>
        </div>
    </section>

    <!-- Tabs -->
    <section class="max-w-6xl mx-auto mt-10 border-b flex justify-start px-4 space-x-6 text-gray-600 font-medium" data-aos="fade-up" data-aos-delay="400">
        <a href="#" class="border-b-2 border-indigo-600 pb-2 text-indigo-600">Work</a>
        <a href="#" class="hover:text-indigo-600 pb-2">Moodboards</a>
        <a href="#" class="hover:text-indigo-600 pb-2">Likes</a>
        <a href="#" class="hover:text-indigo-600 pb-2">About</a>
    </section>

    <!-- Projects -->
    <section class="max-w-6xl mx-auto px-4 mt-8 grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-2 p-4" data-aos="fade-up">
            <img src="https://cdn.dribbble.com/userupload/16037054/file/original-9a7f6a5832511844eb6bb23193e35a0e.png" class="rounded-xl mb-3" alt="">
            <h3 class="font-semibold">Web Design</h3>
            <p class="text-gray-500 text-sm">HTML, CSS, JavaScript, Bootstrap, Tailwind</p>
        </div>

        <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-2 p-4" data-aos="fade-up" data-aos-delay="150">
            <img src="https://cdn.dribbble.com/userupload/17116781/file/original-b7a4c0939433be9b1a34c9ad6f7cb64e.png" class="rounded-xl mb-3" alt="">
            <h3 class="font-semibold">Web Backend</h3>
            <p class="text-gray-500 text-sm">PHP, AJAX, Laravel</p>
        </div>

        <div class="bg-white rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-2 p-4" data-aos="fade-up" data-aos-delay="300">
            <img src="https://cdn.dribbble.com/userupload/16827602/file/original-7ab93bfb5e8071e313d1e8c01f3a8f30.png" class="rounded-xl mb-3" alt="">
            <h3 class="font-semibold">Web Database</h3>
            <p class="text-gray-500 text-sm">MySQL, MongoDB</p>
        </div>
    </section>

    <!-- Skills -->
    </section>
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto text-center px-4">
            <h2 class="text-3xl font-bold mb-10 text-purple-400" data-aos="fade-down"> My Skills </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" data-aos="fade-up"> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/1200px-HTML5_logo_and_wordmark.svg.png" alt="" width="40px" height="40px"> </span> <span class="font-semibold text-lg">HTML5</span> </div> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fab fa-css3-alt"></i> </span> <span class="font-semibold text-lg">CSS3</span> </div> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fab fa-js-square"></i> </span> <span class="font-semibold text-lg">JavaScript</span> </div> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fas fa-mobile-alt"></i> </span> <span class="font-semibold text-lg">Responsive</span> </div> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fas fa-magic"></i> </span> <span class="font-semibold text-lg">Animations</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://www.pngall.com/wp-content/uploads/15/React-Logo.png" alt="" width="50px" height="50px"> </span> <span class="font-semibold text-lg">React</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://static.vecteezy.com/system/resources/previews/067/565/470/non_2x/bootstrap-logo-rounded-free-png.png" alt="" width="50px" height="50px"> </span> <span class="font-semibold text-lg">Boostrap</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png" alt="" width="50px" height="50px"> </span> <span class="font-semibold text-lg">PHP</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fa-solid fa-database"></i> </span> <span class="font-semibold text-lg">Database</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Tailwind_CSS_Logo.svg/2560px-Tailwind_CSS_Logo.svg.png" alt="" width="30px" height="30px"> </span> <span class="font-semibold text-lg">tailwind</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://images.credly.com/images/a699a8c9-354e-4404-b00c-fd3ebdc4289b/jquery-badge.png" alt="" width="30px" height="30px"> </span> <span class="font-semibold text-lg">Jquery</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://images.credly.com/images/a699a8c9-354e-4404-b00c-fd3ebdc4289b/jquery-badge.png" alt="" width="30px" height="30px"> </span> <span class="font-semibold text-lg">Jquery</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/1200px-Python-logo-notext.svg.png" alt="" width="30px" height="30px"> </span> <span class="font-semibold text-lg">Python</span> </div>
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Ruby_logo.svg/1200px-Ruby_logo.svg.png" alt="" width="30px" height="30px"> </span> <span class="font-semibold text-lg">Ruby</span> </div> <!-- Card -->
                <div class="flex items-center justify-center border border-gray-700 rounded-lg py-6 px-4 hover:bg-purple-600/10 transition duration-300 hover:-translate-y-1"> <span class="text-purple-500 text-3xl mr-3"> <i class="fas fa-paint-brush"></i> </span> <span class="font-semibold text-lg">Modern UI</span> </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center mt-16 mb-6 text-gray-400 text-sm">
        © 2025 ETEC Design Portfolio. All rights reserved.
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // AJAX follow
        $(document).ready(function() {
            $('#followBtn').click(function() {
                $.post('', {
                    action: 'follow',
                    id: 1
                }, function(data) {
                    $('#followersCount').text(data);
                    $('#followBtn').text('Following').prop('disabled', true);
                });
            });
        });
    </script>
</body>

</html>
