<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    </head>
<body>
    <div class="d-aside-right-bar bg-grey">
        <aside class="asidebar  collapse navbar-collapse" id="navbarSupportedContent">
            <div class="asidebar-top">
                <ul class="internal-icon">
                    <li>
                        <a href="{{ route('admin.chalan') }}">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                            Chalan
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{ route('admin.students') }}">
                            <span class="material-symbols-outlined">
                                school
                            </span>
                            Students
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rules') }}">
                            <span class="material-symbols-outlined">
                                kid_star
                            </span>
                            Rules & Regulations
                        </a>
                    </li>
                   
                </ul>
            </div>
            <div class="asidebar-bottom">
                <ul class="internal-icon">
                    <li><a href="" class="blue">
                            <span class="material-symbols-outlined">
                                currency_exchange
                            </span>
                            Help & Support
                        </a>
                    </li>
                    <li><a href="">
                            <span class="material-symbols-outlined">
                                bookmark
                            </span>
                            Bookmarks
                        </a>
                    </li>
                    <li><a href="">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                            My Profile
                        </a>
                    </li>
                    <li>
                    
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>                    
                    </li>
                </ul>
                <div class="divider"></div>
                <div class="asidebar-copyright">
                    <p>© IUB 2024</p>
                </div>
            </div>
        </aside>
    </div>
</body>
</html>