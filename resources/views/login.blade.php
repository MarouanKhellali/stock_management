<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/app.css">
    <title> Login </title>
</head>

<body>
    <div class="bg-white dar:bg-gray-50">
        <div class="flex justify-center h-screen">
            <div class="hidden md:block md:w-2/4"
                style="background: linear-gradient(180deg, #2EA154 0%, #54B435 68.75%)">
                <div class="flex items-center justify-center w-full h-screen p-8">
                    <img src="images/bigLogo.png" alt="Modern building architecture">
                </div>
            </div>
            <div class="flex items-center w-full h-screen max-w-md px-6 mx-auto md:w-2/4">
                <div class="flex-1">
                    <div class="text-center pb-4 ">
                        <h2 class="text-6xl font-bold text-center text-gray-700 pb-4 text-green-600">Login</h2>
                    </div>
                    <div class="mt-8 h">
                        <form action="{{ route('login') }}" method="POST">
                            @if (Session::has('error'))
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @csrf
                            <div class="mt-6 flex items-center bg-gray-100 rounded-md px-4 py-2 mt-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <input type="email" name="email" id="email" placeholder="Email"  
                                    class="block w-full pl-3  text-gray-700 placeholder-gray-400 bg-gray-100 rounded-md placeholder-gray-300 " />

             
                               
                            </div>
                            <div class="mt-6 flex items-center bg-gray-100 rounded-md px-4 py-2 mt-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="block w-full pl-3  text-gray-700 placeholder-gray-400 bg-gray-100 rounded-md placeholder-gray-300 " />
                            </div>

                            <div class="mt-6 flex justify-center">

                                <button type="submit"
                                    class="w-48 px-4 py-2 tracking-wide text-white transition-colors duration-200 transform rounded-md bg-green-600 hover:bg-green-400 focus:outline-none focus:bg-green-400 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                    Login
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

{{-- <!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <!-- component -->
    <div class="h-screen md:flex">
        <div
            class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
            <div>
                <h1 class="text-white font-bold text-6xl font-sans">GoFinance</h1>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">



            <form class="bg-white w-80" action="{{ route('login') }}" method="POST">
                @if (Session::has('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @csrf
                <h1 class="text-gray-800 font-bold text-4xl text-center  mb-6">Login New!</h1>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="email" name="email" id="email"
                        placeholder="Email Address" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password" id="password"
                        placeholder="Password" />
                </div>
                <div class="grid justify-center">

                    <button type="submit"
                        class="block w-48 bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2 ">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html> --}}
