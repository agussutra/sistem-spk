<!-- Sidebar -->
<aside
class="flex-shrink-0 hidden w-64 bg-black border-r dark:border-primary-darker dark:bg-darker md:block">

<div class="h-full relative">
    <img src="{{ asset('image/background.jpg') }}" class="h-full opacity-40">
    <div class="absolute inset-0 flex flex-col">
        <div class="mx-auto mt-14 text-white">
            <div class="text-center font-bold mb-2">KSU Amrta Semaya</div>
            <div class="mb-2"><img src="{{ asset('image/avatar.jpg') }}"
                    class="m-auto  w-[80px] h-[80px] rounded-full"></div>
            <div class="text-center font-semibold">User</div>
        </div>
        <nav aria-label="Main"
            class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
            <a href="/"
                class=" @if(Request::is('/')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </span>
                <span class="ml-2 text-sm">Dashboard</span>
            </a>

            <a href="{{ route('nasabah.index') }}"
                class=" @if(Request::is('nasabah')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </span>
                <span class="ml-2 text-sm">Nasabah</span>
            </a>

            <a href="{{ route('user.index') }}"
                class="@if(Request::is('user')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </span>
                <span class="ml-2 text-sm">User</span>
            </a>

            <div x-data="{ isActive: false, open: false }">
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100': isActive || open }" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Data Master </span>
                    <span aria-hidden="true" class="ml-auto">
                        <svg class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                    <a href="{{ route('kriteria.index') }}" role="menuitem"
                        class="@if(Request::is('kriteria')) bg-green-600 @endif menu-item block p-2 text-sm text-white transition-colors duration-200 rounded-md dark:text-gray-100 dark:hover:text-light hover:text-gray-100">
                        Kriteria
                    </a>
                    <a href="{{ route('sub_kriteria.index') }}" role="menuitem"
                        class="@if(Request::is('sub_kriteria')) bg-green-600 @endif menu-item block p-2 text-sm text-white transition-colors duration-200 rounded-md dark:text-gray-100 dark:hover:text-light hover:text-gray-100">
                        Sub Kriteria
                    </a>
                </div>
            </div>
            {{-- <a href="{{ route('permohonan.index') }}"
                class="@if(Request::is('permohonan')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M21.99 8c0-.72-.37-1.35-.94-1.7L12 1L2.95 6.3C2.38 6.65 2 7.28 2 8v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2l-.01-10zm-2 0v.01L12 13L4 8l8-4.68L19.99 8zM4 18v-7.66l8 5.02l7.99-4.99L20 18H4z"/></svg>
                </span>
                <span class="ml-2 text-sm">Permohonan</span>
            </a> --}}
            <a href="{{ route('perhitungan_ahp.index') }}"
                class="@if(Request::is('perhitungan_ahp')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5.97 4.06L14.09 6l1.41 1.41L16.91 6l1.06 1.06l-1.41 1.41l1.41 1.41l-1.06 1.06l-1.41-1.4l-1.41 1.41l-1.06-1.06l1.41-1.41l-1.41-1.42zm-6.78.66h5v1.5h-5v-1.5zM11.5 16h-2v2H8v-2H6v-1.5h2v-2h1.5v2h2V16zm6.5 1.25h-5v-1.5h5v1.5zm0-2.5h-5v-1.5h5v1.5z" />
                    </svg>
                </span>
                <span class="ml-2 text-sm">Perhitungan AHP</span>
            </a>
            <a href="{{ route('laporan') }}"
                class="@if(Request::is('laporan')) bg-green-600 @endif menu-item flex items-center p-2 text-white transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20 4h-1v9l-3-2.25L13 13V4H8v12h12z"
                            opacity=".3" />
                        <path fill="currentColor"
                            d="M4 22h14v-2H4V6H2v14c0 1.1.9 2 2 2zm18-6V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2zM15 4h2v5l-1-.75L15 9V4zM8 4h5v9l3-2.25L19 13V4h1v12H8V4z" />
                    </svg>
                </span>
                <span class="ml-2 text-sm">Laporan</span>
            </a>
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class=" menu-item flex items-center p-2 text-red-500 transition-colors rounded-md">
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                            <path fill="currentColor"
                                d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm font-bold">Log Out</span>
                </button>
            </form>
        </nav>
    </div>
</div>
</aside>
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
    <header class="relative bg-white dark:bg-darker">
        <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
            <a href="#" class="inline-block text-md font-bold tracking-wider uppercase text-slate-300 py-4 pl-4">
                Sistem Pendukung Keputusan Pemberian Kredit KSU Amrta Semaya
            </a>
        </div>
    </header>