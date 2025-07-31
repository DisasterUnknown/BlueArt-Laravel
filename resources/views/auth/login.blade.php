<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login Page</title>
</head>

<body class="relative">
  <div class="bg-cover bg-center h-screen" style="background-image: url('/assets/LoginBackground.gif')">

    <!-- Top Nav Bar -->
    <div class="flex justify-between absolute top-0 left-0 w-full">
      <a href="{{ url('/') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mt-2 ml-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">BlueArt</a>
      <a href="#" class="border bg-white bg-opacity-5 backdrop-blur-lg mt-2 mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">About Us</a>
    </div>

    <!-- Login Form -->
    <div class="flex items-center justify-center h-screen">
      <form class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[350px] shadow-lg rounded">
        <h1 class="text-3xl text-white text-center font-bold mb-7">Login</h1>

        <!-- Email Input -->
        <div class="flex justify-center mb-2">
          <input type="email" placeholder="Email" class="border border-black bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10" required>
        </div>

        <!-- Password Input -->
        <div class="flex justify-center mb-2">
          <input type="password" placeholder="Password" class="border border-black bg-white text-white bg-opacity-5 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10" required>
        </div>

        <!-- Login Button -->
        <button type="submit" class="bg-white px-4 py-1 block mx-auto w-full rounded-full font-bold hover:bg-white hover:bg-opacity-70">Login</button>

        <p class="text-white text-sm text-center mt-2 mb-0.5 opacity-80">
          Don't have an account?
          <a href="{{ url('/auth/register') }}" class="font-semibold hover:font-bold">Register</a>
        </p>

        <hr class="my-5">

        <!-- Google Sign-in Button -->
        <a href="#" class="bg-white px-4 py-1 block text-center mx-auto w-full rounded-full font-bold hover:bg-white hover:bg-opacity-70">
          Sign in with Google
        </a>
      </form>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
      <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
    </footer>
  </div>
</body>

</html>
