<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <!-- Page Heading -->
    <header>
        <div class="p-4 sm:ml-64">
            <div class="border-2 mt-16 border-gray-200 rounded-lg dark:border-gray-700">
                <!-- Breadcrumb -->
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <Link href="{{ url('/dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                            </Link>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $header }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
                <div class="mx-auto max-w-screen-xl text-center">
                    <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                        <Link href="/" class="flex">
                        <img src="/images/logo_dpmptsp.png" class="h-14" alt="FlowBite Logo" />
                        </Link>
                    </a>
                    <p class="my-6 text-gray-500 dark:text-gray-400">Aplikasi Perizinan Online Non OSS DPMPTSP Provinsi Kepulauan Riau.</p>
                    <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
                        <li>
                            <Link away href="https://dpmptsp.kepriprov.go.id/" class="mr-4 hover:underline md:mr-6">Website</Link>
                        </li>
                        <li>
                            <Link away href="https://www.instagram.com/dpmptspprovinsikepri/" class="mr-4 hover:underline md:mr-6 ">Instagram</Link>
                        </li>
                        <li>
                            <Link away href="https://www.facebook.com/people/Dpmptsp-Provinsi-Kepulauan-Riau/100091329853958/?refid=52" class="mr-4 hover:underline md:mr-6">Facebook</Link>
                        </li>
                        <li>
                            <Link away href="https://api.whatsapp.com/send?phone=628117772197&text=ini%20khusus%20layanan%20konsultasi%20DPMPTSP%20Kepri" class="mr-4 hover:underline md:mr-6 ">Pengaduan Layanan</Link>
                        </li>
                    </ul>
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2021-2022 <a href="#" class="hover:underline">Sijarimu™</a>. All Rights Reserved.</span>
                </div>
            </footer>
        </div>
    </div>

</div>