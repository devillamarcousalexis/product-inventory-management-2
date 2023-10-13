<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class=" fixed bottom-0 w-full">
            <div class="w-screen bg-blue-900 py-2 inline-block text-center">
                <h1 class="font-poppins text-sm text-white mt-2">Developed by Marcous Alexis C. De Villa</h1>
            </div>
        </footer>

    </div>
    <script>
    // Add a click event listener to all "Edit" buttons
    document.querySelectorAll('[data-modal-show="edit-modal"]').forEach((editButton) => {
        editButton.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            // Fetch product details and fill the edit modal fields
            fetch(`/get-product/${productId}`)
                .then(response => response.json())
                .then(data => {
                    const editModal = document.getElementById('edit-modal');
                    const categorySelect = editModal.querySelector(
                        '#category_id'); // Use the correct ID here
                    const productNameInput = editModal.querySelector(
                        '#product_name'); // Use the correct ID here

                    // Set the category and product name based on data received
                    categorySelect.value = data.category_id;
                    productNameInput.value = data.product_name;

                    // Show the edit modal
                    editModal.style.display = 'block';
                });
        });
    });

    // Add a click event listener to close the edit modal
    document.querySelector('[data-modal-hide="edit-modal"]').addEventListener('click', function() {
        document.getElementById('edit-modal').style.display = 'none';
    });
    </script>


</body>

</html>