<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
  <header class="bg-white">
      <nav class="flex justify-between items-center w-[92%]  mx-auto p-4">
          <div>
              <img class="cursor-pointer" style="height: 2rem; width: auto; " src="/images/logo.png"  alt="logo">
          </div>
          <div
              class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
              <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                  <li>
                      <a class="hover:text-gray-500" href="#">Dashboard</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">News</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">Interviews</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">Next Fixtures</a>
                  </li>
                  <li>
                      <a class="hover:text-gray-500" href="#">About MVN_EN</a>
                  </li>
              </ul>
          </div>
          <div class="flex items-center gap-6">
              <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Sign in</button>
              <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
          </div>
  </header>



  <script>
      const navLinks = document.querySelector('.nav-links')
      function onToggleMenu(e){
          e.name = e.name === 'menu' ? 'close' : 'menu'
          navLinks.classList.toggle('top-[9%]')
      }
  </script>
</body>


</html>




