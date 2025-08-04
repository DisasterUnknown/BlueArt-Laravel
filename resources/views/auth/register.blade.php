<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register Page</title>
</head>

<body class="relative" id="registerPage">
    <div class="bg-cover bg-center h-screen" style="background-image: url('/assets/LoginBackground.gif')">
        <!-- Navigation Bar     -->
        <div class="flex justify-between absolute top-0 left-0 w-full">
            <div class="mt-2">
                <a href="{{ url('/home') }}"
                    class="border bg-white bg-opacity-5 backdrop-blur-lg ml-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">BlueArt</a>
            </div>
            <div class="mt-2">
                <a href="{{ url('/auth/login') }}"
                    class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">Login</a>
                <a href="{{ url('/aboutUs') }}"
                    class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">About
                    Us</a>
            </div>
        </div>
        <div class="flex items-center justify-center h-screen">
            <form class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[350px] shadow-lg rounded shadow-lg"
                id="registerForm">
                <h1 class="text-3xl text-white text-center font-bold mb-7">Register</h1>

                <!-- User Name Enter Field -->
                <div class="flex justify-center mb-2">
                    <input type="text" placeholder="Username"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                        id="nameIN">
                </div>

                <!-- Email Enter Field -->
                <div class="flex justify-center mb-2">
                    <input type="email" placeholder="Email"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                        id="emailIN">
                </div>

                <!-- Password Enter Field -->
                <div class="flex justify-center mb-2">
                    <input type="text" placeholder="Password"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                        id="passIN">
                </div>

                <!-- Contact Enter Field -->
                <div class="flex justify-center mb-2">
                    <input type="tel" placeholder="Contact"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                        id="telIN">
                </div>

                <!-- Address Enter Field -->
                <div class="flex justify-center mb-2">
                    <input type="text" placeholder="Address"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                        id="addressIN">
                </div>

                <!-- Role Enter Field -->
                <div class="flex justify-center mb-2">
                    <label class="text-white mr-5 ml-1">Role:</label>
                    <select id="roleSelect"
                        class="border border-white border-r-10 bg-white text-white bg-opacity-5 px-1.5 py-0.5 w-full rounded-full hover:bg-opacity-10">
                        <option value="customer" class="bg-white text-black">Customer</option>
                        <option value="seller" class="bg-white text-black">Seller</option>
                    </select>
                </div>

                <p class="mb-2 text-white text-sm text-center" id="errorOut">&nbsp;</p>
                <button type="button"
                    class="bg-white px-4 py-1 block mx-auto w-full rounded-full font-bold hover:bg-white hover:bg-opacity-70"
                    id="registerBtn">Register</button>
            </form>

            <div class="hidden" id="compleateResponce">null</div>
            <div class="hidden" id="responce">null</div>
        </div>

        <!-- Footer with absolute positioning -->
        <footer
            class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
            <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>