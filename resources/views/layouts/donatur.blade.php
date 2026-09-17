<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Dashboard Donatur - Wapen')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-container": "#a9acfd",
                        "secondary": "#5457a1",
                        "primary": "#0800b5",
                        "inverse-on-surface": "#eaf1ff",
                        "on-secondary-container": "#3a3d86",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed-dim": "#c0c1ff",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#e1e0ff",
                        "background": "#f8f9ff",
                        "primary-container": "#2121e2",
                        "inverse-primary": "#bfc1ff",
                        "on-primary-fixed-variant": "#1b19df",
                        "on-surface": "#0b1c30",
                        "surface-variant": "#d3e4fe",
                        "on-primary-fixed": "#03006d",
                        "on-primary-container": "#b1b4ff",
                        "surface": "#f8f9ff",
                        "on-tertiary-container": "#b6bbc5",
                        "tertiary-container": "#464b54",
                        "inverse-surface": "#213145",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#c2c6d1",
                        "surface-container": "#e5eeff",
                        "outline": "#767588",
                        "on-surface-variant": "#454556",
                        "surface-container-highest": "#d3e4fe",
                        "error": "#ba1a1a",
                        "outline-variant": "#c6c4d9",
                        "surface-dim": "#cbdbf5",
                        "on-secondary-fixed": "#0d0d5b",
                        "on-secondary-fixed-variant": "#3c3f87",
                        "on-tertiary-fixed": "#171c23",
                        "surface-container-low": "#eff4ff",
                        "surface-tint": "#3c41f5",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#bfc1ff",
                        "primary-fixed": "#e1e0ff",
                        "tertiary-fixed": "#dee2ed",
                        "on-secondary": "#ffffff",
                        "on-background": "#0b1c30",
                        "on-primary": "#ffffff",
                        "tertiary": "#2f343d",
                        "on-tertiary-fixed-variant": "#424750",
                        "surface-bright": "#f8f9ff",
                        "surface-container-high": "#dce9ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "stack-md": "16px",
                        "margin-desktop": "40px",
                        "stack-sm": "8px",
                        "container-max": "1280px",
                        "stack-xl": "48px",
                        "stack-lg": "24px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "16px",
                            "fontWeight": "500"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.01em",
                            "fontWeight": "600"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "headline-sm": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-surface font-body-md text-on-surface flex min-h-screen">

    @php
        $activeMenu = trim($__env->yieldContent('active_menu', 'dashboard'));
    @endphp
    @include('donatur.partials.sidebar', ['active' => $activeMenu])

    <div id="drawer-overlay" class="md:hidden fixed inset-0 z-40 bg-black/50 hidden"></div>
    @include('donatur.partials.drawer', ['active' => $activeMenu])

    <main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
        <header
            class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button id="menu-btn" type="button"
                    class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h1 class="font-headline-md text-headline-md text-on-surface">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-3">
                <div class="relative">
                    <button id="profile-btn" type="button"
                        class="flex items-center gap-3 p-1 pr-3 rounded-full hover:bg-surface-container-low transition-colors focus:outline-none">
                        <p class="font-label-md text-label-md text-on-surface">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</p>
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant">person</span>
                        </div>
                        <span class="material-symbols-outlined text-on-surface-variant" style="font-size: 18px;">expand_more</span>
                    </button>

                    <div id="profile-menu"
                        class="hidden absolute right-0 mt-2 w-56 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-high overflow-hidden">
                        <div class="px-4 py-3 border-b border-outline-variant">
                            <p class="font-label-md text-label-md text-on-surface">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</p>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">{{ auth()->user()->email ?? '-' }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-error hover:bg-error-container transition-colors">
                                <span class="material-symbols-outlined">logout</span>
                                <span class="font-label-md text-label-md">Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">
            @yield('content')
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const drawer = document.getElementById('mobile-drawer');
            const overlay = document.getElementById('drawer-overlay');
            const menuBtn = document.getElementById('menu-btn');

            function openDrawer() {
                drawer.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }

            function closeDrawer() {
                drawer.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }

            menuBtn.addEventListener('click', openDrawer);
            document.getElementById('drawer-close').addEventListener('click', closeDrawer);
            overlay.addEventListener('click', closeDrawer);

            const profileBtn = document.getElementById('profile-btn');
            const profileMenu = document.getElementById('profile-menu');

            profileBtn.addEventListener('click', function (event) {
                event.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                if (!profileMenu.classList.contains('hidden') && !profileBtn.contains(event.target)) {
                    profileMenu.classList.add('hidden');
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeDrawer();
                    profileMenu.classList.add('hidden');
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>