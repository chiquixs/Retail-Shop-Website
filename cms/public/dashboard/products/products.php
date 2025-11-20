<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// koneksi database
require_once '../../../../config/db.php';
$stmt = $pdo->query("SELECT * FROM product");
$categories = $stmt->fetchAll();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get started with a free and open source Tailwind CSS dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.143.0">

    <title>Tailwind CSS Products Page - Windster</title>

    <link rel="canonical" href="https://themesberg.com/product/tailwind-css/dashboard-windster">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://themewagon.github.io/windster/app.css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://themewagon.github.io/windster/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://themewagon.github.io/windster/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://themewagon.github.io/windster/favicon-16x16.png">
    <link rel="icon" type="image/png" href="https://themewagon.github.io/windster/favicon.ico">
    <link rel="manifest" href="https://themewagon.github.io/windster/site.webmanifest">
    <link rel="mask-icon" href="https://themewagon.github.io/windster/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Tailwind CSS Products Page - Windster">
    <meta name="twitter:description" content="Get started with a free and open source Tailwind CSS dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta name="twitter:image" content="https://themewagon.github.io/docs/images/og-image.jpg">

    <!-- Facebook -->
    <meta property="og:url" content="https://themewagon.github.io/windster/e-commerce/products/">
    <meta property="og:title" content="Tailwind CSS Products Page - Windster">
    <meta property="og:description" content="Get started with a free and open source Tailwind CSS dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta property="og:type" content="article">
    <meta property="og:image" content="https://themewagon.github.io/docs/images/og-image.jpg">
    <meta property="og:image:type" content="image/png">





    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-141734189-6');
    </script>


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-THQTXJ7');
    </script>


</head>

<body class="bg-gray-50">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>





    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="https://themewagon.github.io/windster/" class="text-xl font-bold flex items-center lg:ml-2.5">
                        <img src="https://themewagon.github.io/windster/images/logo.svg" class="h-6 mr-2" alt="Windster Logo">
                        <span class="self-center whitespace-nowrap">Windster</span>
                    </a>
                    <form action="#" method="GET" class="hidden lg:block lg:pl-32">
                        <label for="topbar-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                        </div>
                    </form>
                </div>
                <div class="flex items-center">

                    <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                        <span class="sr-only">Search</span>

                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="hidden lg:flex items-center">
                        <span class="text-base font-normal text-gray-500 mr-5">Open source ❤️</span>
                        <div class="-mb-1">
                            <a class="github-button" href="https://github.com/themesberg/windster-tailwind-css-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themesberg/windster-tailwind-css-dashboard on GitHub">Star</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="flex overflow-hidden bg-white pt-16">

        <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 bg-white divide-y space-y-1">
                        <ul class="space-y-2 pb-2">
                            <li>
                                <form action="#" method="GET" class="lg:hidden">
                                    <label for="mobile-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                    </div>
                                </form>
                            </li>
                            <li>
                                <a href="../index.html" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                    <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../users/user.html" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="../products/product.html" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="../suppliers/supplier.html" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Supplier</span>
                                </a>
                            </li>
                            <li>
                                <a href="products.html" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>


        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>

                <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                    <div class="mb-1 w-full">
                        <div class="mb-4">
                            <nav class="flex mb-5" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                                    <li class="inline-flex items-center">
                                        <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                            </svg>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">E-commerce</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Products</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All products</h1>
                        </div>
                        <div class="block sm:flex items-center md:divide-x md:divide-gray-100">
                            <form class="sm:pr-3 mb-4 sm:mb-0" action="#" method="GET">
                                <label for="products-search" class="sr-only">Search</label>
                                <div class="mt-1 relative sm:w-64 xl:w-96">
                                    <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for products">
                                </div>
                            </form>
                            <div class="flex items-center sm:justify-end w-full">
                                <div class="hidden md:flex pl-2 space-x-1">
                                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <button type="button" data-modal-toggle="add-product-modal" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 text-center sm:ml-auto">
                                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Add product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden">
                                <table class="table-fixed min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Product Name
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Category
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Supplier
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                SKU
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Stock
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Price
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-table" class="bg-white divide-y divide-gray-200">
                                        <?php
                                        try {
                                            // QUERY JOIN PRODUK + KATEGORI + SUPPLIER
                                            $stmt = $pdo->query("
        SELECT 
            p.id_product,
            p.name AS product_name,
            p.sku,
            p.stock,
            p.price,
            p.image,
            c.name as category_name,
            s.name as supplier_name,
            p.id_category,  
            p.id_supplier
        FROM product p
        LEFT JOIN category c ON p.id_category = c.id_category
        LEFT JOIN supplier s ON p.id_supplier = s.id_supplier
        ORDER BY p.name ASC
    ");

                                            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if (count($products) > 0) {
                                                foreach ($products as $product) {

                                                    $id          = $product['id_product'];
                                                    $name        = $product['product_name'];
                                                    $category    = $product['category_name'] ?: '-';
                                                    $supplier    = $product['supplier_name'] ?: '-';
                                                    $sku         = $product['sku'];
                                                    $stock       = $product['stock'];
                                                    $price       = $product['price'];
                                        ?>
                                                    <tr data-product-id="<?= htmlspecialchars($id) ?>">
                                                        <td class="p-4 w-4">
                                                            <div class="flex items-center">
                                                                <input type="checkbox" class="w-4 h-4 bg-gray-100 rounded border-gray-300">
                                                            </div>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap">
                                                            <?= htmlspecialchars($name) ?>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                            <?= htmlspecialchars($category) ?>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                            <?= htmlspecialchars($supplier) ?>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                            <?= htmlspecialchars($sku) ?>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                            <?= htmlspecialchars($stock) ?>
                                                        </td>

                                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap">
                                                            Rp <?= number_format($price, 0, ',', '.') ?>
                                                        </td>

                                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                                            <button type="button"
                                                                class="edit-product-btn text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
                                                                data-modal-toggle="product-modal"
                                                                data-id="<?= $product['id_product'] ?>"
                                                                data-name="<?= htmlspecialchars($product['product_name']) ?>"
                                                                data-sku="<?= htmlspecialchars($product['sku']) ?>"
                                                                data-price="<?= $product['price'] ?>"
                                                                data-stock="<?= $product['stock'] ?>"
                                                                data-category-id="<?= $product['id_category'] ?>"
                                                                data-supplier-id="<?= $product['id_supplier'] ?>">
                                                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 012 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                Edit
                                                            </button>

                                                            <button type="button"
                                                                class="delete-product-btn text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2"
                                                                data-id="<?= htmlspecialchars($id) ?>"
                                                                data-name="<?= htmlspecialchars($name) ?>">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="8" class="p-4 text-center text-gray-500">
                                                        No products found. Click "Add Product" to create one.
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            ?>
                                            <tr>
                                                <td colspan="8" class="p-4 text-center text-red-500">
                                                    Error loading products: <?= htmlspecialchars($e->getMessage()) ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="product-modal">
                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">Edit product</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <form id="edit-product-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_product" id="edit_id">

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_name" class="text-sm font-medium text-gray-900 block mb-2">Product Name</label>
                                            <input type="text" name="name" id="edit_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_sku" class="text-sm font-medium text-gray-900 block mb-2">SKU</label>
                                            <input type="text" name="sku" id="edit_sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_category" class="text-sm font-medium text-gray-900 block mb-2">Category</label>
                                            <select name="id_category" id="edit_category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_supplier" class="text-sm font-medium text-gray-900 block mb-2">Supplier</label>
                                            <select name="id_supplier" id="edit_supplier" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                                <option value="">Select Supplier</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                                            <input type="number" name="price" id="edit_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="edit_stock" class="text-sm font-medium text-gray-900 block mb-2">Stock</label>
                                            <input type="number" name="stock" id="edit_stock" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                        </div>

                                        <div class="col-span-full">
                                            <label class="text-sm font-medium text-gray-900 block mb-2">Change Image (Optional)</label>
                                            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                                            <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="p-6 border-t border-gray-200 rounded-b">
                                <button form="edit-product-form" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Update Product</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Product Modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-product-modal">
                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="bg-white rounded-lg shadow relative">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">
                                    Add Product
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-product-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <form id="add-product-form" method="post" enctype="multipart/form-data">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!-- Product Name -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Product Name *</label>
                                            <input type="text" name="name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Nordic Chair" required>
                                        </div>

                                        <!-- SKU -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="sku" class="text-sm font-medium text-gray-900 block mb-2">SKU *</label>
                                            <input type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="FURN-001" required>
                                        </div>

                                        <!-- Category Dropdown -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Category *</label>
                                            <select name="id_category" id="add_category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                                <option value="">Select Category</option>
                                                <!-- Options will be loaded dynamically -->
                                            </select>
                                        </div>

                                        <!-- Supplier Dropdown -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="supplier" class="text-sm font-medium text-gray-900 block mb-2">Supplier *</label>
                                            <select name="id_supplier" id="add_supplier" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                                <option value="">Select Supplier</option>
                                                <!-- Options will be loaded dynamically -->
                                            </select>
                                        </div>

                                        <!-- Stock -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="stock" class="text-sm font-medium text-gray-900 block mb-2">Stock *</label>
                                            <input type="number" name="stock" id="stock" min="0" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="100" required>
                                        </div>

                                        <!-- Price -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price (Rp) *</label>
                                            <input type="number" name="price" id="price" min="0" step="1000" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="500000" required>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="col-span-full">
                                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Product Image *</label>
                                            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                            <p class="mt-1 text-sm text-gray-500">PNG, JPG or JPEG (MAX. 2MB)</p>

                                            <!-- Image Preview -->
                                            <div id="image-preview" class="mt-3 hidden">
                                                <img id="preview-img" src="" alt="Preview" class="max-w-xs h-48 object-cover rounded-lg border">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="p-6 border-t border-gray-200 rounded-b">
                                <button type="button" id="btn-save-add" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    <i class="fas fa-save mr-2"></i>Add Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Product Modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="delete-product-modal">
                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="bg-white rounded-lg shadow relative">
                            <!-- Modal header -->
                            <div class="flex justify-end p-2">
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="delete-product-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 pt-0 text-center">
                                <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this product?</h3>
                                <a href="#" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </a>
                                <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" data-modal-toggle="delete-product-modal">
                                    No, cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </main>

        </div>

    </div>



    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://themewagon.github.io/windster/app.bundle.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("✅ Javascript Siap!");

        // 1. Load Dropdown (Categories & Suppliers)
        loadDropdowns();

        // === BAGIAN ADD PRODUCT ===
        // Reset form saat modal Add dibuka
        const openAddModalBtn = document.querySelector('[data-modal-toggle="add-product-modal"]');
        if (openAddModalBtn) {
            openAddModalBtn.addEventListener('click', function() {
                document.getElementById('add-product-form').reset();
                document.getElementById('image-preview').classList.add('hidden');
                document.getElementById('preview-img').src = "";
            });
        }

        // Preview Image (Add Product)
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview-img').src = e.target.result;
                        document.getElementById('image-preview').classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Tombol Save Add Product (Manual Trigger)
        const btnSaveAdd = document.getElementById('btn-save-add');
        if (btnSaveAdd) {
            btnSaveAdd.addEventListener('click', function() {
                const form = document.getElementById('add-product-form');
                if (form && form.checkValidity()) {
                    handleFormSubmit(form, 'add_product.php');
                } else {
                    form.reportValidity();
                }
            });
        }

        // === BAGIAN EDIT PRODUCT ===
        // Listener Tombol Edit di Tabel (Event Delegation)
        document.addEventListener('click', function(e) {
            // Cari tombol edit terdekat yang diklik
            const btn = e.target.closest('.edit-product-btn');
            
            if (btn) {
                // Ambil data dari atribut tombol
                const id = btn.dataset.id;
                const name = btn.dataset.name;
                const sku = btn.dataset.sku;
                const price = btn.dataset.price;
                const stock = btn.dataset.stock;
                const catId = btn.dataset.categoryId;
                const supId = btn.dataset.supplierId;

                // Isi form Edit
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_name').value = name;
                document.getElementById('edit_sku').value = sku;
                document.getElementById('edit_price').value = price;
                document.getElementById('edit_stock').value = stock;
                
                // Set Dropdown (Pilih opsi sesuai ID)
                document.getElementById('edit_category').value = catId;
                document.getElementById('edit_supplier').value = supId;
            }
        });

        // Submit Form Edit
        const editForm = document.getElementById('edit-product-form');
        if (editForm) {
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit(this, 'edit_product.php');
            });
        }
    });

    // === FUNGSI UMUM KIRIM DATA ===
    async function handleFormSubmit(form, url) {
        const formData = new FormData(form);
        
        // Tentukan tombol mana yang loading
        let btn;
        if (form.id === 'add-product-form') {
            btn = document.getElementById('btn-save-add');
        } else {
            btn = form.querySelector('button[type="submit"]');
        }

        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });
            const text = await response.text();
            const data = JSON.parse(text);

            if (data.success) {
                alert('✅ Berhasil!');
                location.reload();
            } else {
                alert('❌ Gagal: ' + (data.message || 'Error tidak diketahui'));
            }
        } catch (error) {
            console.error('Error:', error);
            alert('❌ Terjadi kesalahan sistem.');
        } finally {
            if(btn) {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        }
    }

    // === LOAD DROPDOWNS ===
    async function loadDropdowns() {
        try {
            // Categories
            const resCat = await fetch('get_categories.php');
            const dataCat = await resCat.json();
            let catOpts = '<option value="">Select Category</option>';
            if (dataCat.success) dataCat.categories.forEach(c => catOpts += `<option value="${c.id_category}">${c.name}</option>`);
            
            if(document.getElementById('add_category')) document.getElementById('add_category').innerHTML = catOpts;
            if(document.getElementById('edit_category')) document.getElementById('edit_category').innerHTML = catOpts;

            // Suppliers
            const resSup = await fetch('get_suppliers.php');
            const dataSup = await resSup.json();
            let supOpts = '<option value="">Select Supplier</option>';
            if (dataSup.success) dataSup.suppliers.forEach(s => supOpts += `<option value="${s.id_supplier}">${s.name}</option>`);
            
            if(document.getElementById('add_supplier')) document.getElementById('add_supplier').innerHTML = supOpts;
            if(document.getElementById('edit_supplier')) document.getElementById('edit_supplier').innerHTML = supOpts;

        } catch (err) {
            console.error('Gagal load dropdown:', err);
        }
    }
</script>


</html>