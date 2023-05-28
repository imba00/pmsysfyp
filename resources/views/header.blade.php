<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/redirect">PARCEL MANAGEMENT SYSTEM</a></h1>

        <nav id="navbar" class="navbar">
            <ul>


                <li>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                    <li>
                        <x-app-layout>
                        </x-app-layout>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>
                    </li>

                    @if (Route::has('register'))
                    @endif
                @endauth
    </div>
    @endif
    </li>

    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
