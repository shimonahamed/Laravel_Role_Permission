<div class="main-header container-fluid  mt-2">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MyBrand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/product')}}">Product</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/resgister')}}">Register</a>
                        </li>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    ari>
                                {{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    {{--                                    {{route('profile.edit')}}--}}
                                    <a class="dropdown-item" href="">Profile</a>
                                </li>
                                <li>
                                    <form method="post" action="{{url('logout')}}">
                                        @csrf
                                        <a class="dropdown-item" href="{{url('/logout')}}"
                                           onclick="event.preventDefault();
                                           this.closest('form').submit();"

                                        >Logout</a>
                                    </form>
                                </li>

                            </ul>

                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
