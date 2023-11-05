<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @vite('resources/css/app.css')
    <title>Sistem Pendukung Keputusan</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex h-screen">
        <div class="bg-black w-2/3">
            <div class="h-full w-full relative">
                <img src="{{ asset('image/background.jpg') }}" class="h-full opacity-30">
                <div class="absolute inset-0 flex flex-col">
                    <div class="mx-auto my-auto ">
                        <p class="font-bold text-2xl mb-1 "><span class="text-white">Sistem Pendukung Keputusan</span>
                            <span class="text-green-500">Pemberian Kredit</span>
                        </p>
                        <p class="text-center text-xl font-bold text-white"><span class="text-green-300">KSU</span>
                            Amrta Semaya</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slate-300 w-1/2">
            <div class="w-full h-full flex">
                <div class="bg-white rounded-md shadow-md py-5 px-10 mx-auto my-auto">
                    <p class="text-center mb-12 font-bold text-base text-gray-500">Sign In To <span class="text-green-500">Your Account !</span></p>
                    <form action="">
                        <div class="flex mb-5">
                            <div class="mr-5 items-center flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                            <div class="border-b border-green-500 ">
                                <input type="text" name="username" id="username"
                                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none h-10"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-5 items-center flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1c1.71 0 3.1 1.39 3.1 3.1v2z" />
                                </svg>
                            </div>
                            <div class="border-b border-green-500 ">
                                <input type="password" name="password" id="password"
                                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none h-10"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="mt-16 mb-3 text-center">
                            <button type="submit"
                                class="bg-green-500 py-2 px-8 rounded-md text-white font-semibold hover:bg-green-400">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M11 7L9.6 8.4l2.6 2.6H2v2h10.2l-2.6 2.6L11 17l5-5l-5-5zm9 12h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-8v2h8v14z"/></svg>
                                    </div>
                                    Login
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
