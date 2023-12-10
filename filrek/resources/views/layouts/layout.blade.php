<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filrek</title>
    <link rel="icon" href="{{ asset('images/filrek-favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--Navbar-->
    <header class="header">
        <a href="{{ route('view.home') }}" class="logo"><img src="{{ asset('images/logo_filrek.svg') }}"
                alt="">FILREK</a>
        <nav class="navbar">
            <!-- search bar -->
            <form name="searchBar" action="{{ route('view.search') }}" method="post" class="search_wrapper">
                @csrf
                <div class="search_bar">
                    <input name="search" type="text" placeholder="Search" required>
                    <i class='bx bx-search'></i>
                </div>
            </form>

            <a href="{{ route('view.trending') }}"><i class='bx bxs-hot'></i></a>
            <a href="#" onclick="toggleMenu()"><i class='bx bx-user-circle'></i>Account</a>

            <!-- Account sub menu wrapper -->
            <div class="sub_menu_wrap" id="subMenu">
                <div class="sub_menu">

                    <!-- Account sub menu user info -->
                    <div class="user_info">
                        <img src="{{ asset('images/user.svg') }}" alt="">
                        <h2>{{ $user[0]->username }}</h2>
                    </div>
                    <hr>

                    <!-- Account sub menu edit profile -->
                    <a href="{{ route('view.editAccount') }}" class="sub_menu_link">
                        <img src="{{ asset('images/edit.svg') }}" alt="">
                        <p>Edit Account</p>
                    </a>

                    <!-- Account sub menu delete profile -->
                    <a href="{{ route('view.deleteAccount') }}" class="sub_menu_link">
                        <img src="{{ asset('images/trash.svg') }}" alt="">
                        <p>Delete Account</p>
                    </a>

                    <!-- Account sub menu logout profile -->
                    <a href="{{ route('view.logout') }}" class="sub_menu_link">
                        <img src="{{ asset('images/logout.svg') }}" alt="">
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <!-- javascript link -->
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/user_dropdown.js') }}"></script>
</body>

</html>
