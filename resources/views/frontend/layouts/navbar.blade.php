<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:  #4c939e;">
        <a class="navbar-brand mx-auto"  style="width: 100%; margin: 0 auto; font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;" href="/categories"><center>Outfit Nepal</center></a>
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="position: relative;">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(session('user'))
                    <li><a class="dropdown-item" href="/logout">{{session('user')['name']}}</a></li>
                @else
                <li><a class="dropdown-item" href="#">Username</a></li>
                @endif
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/login">Login</a></li>
                    <li><a class="dropdown-item" href="/signup">Register</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-black " href="/cart" style="position: absolute; right:180;"><i class="fa fa-shopping-cart"><?php if(isset($_SESSION['auth'])){ ?>
                    <span id="cart-item"></span>
                <?php } ?> </i></a>
                </li>

            </ul>

            
        </div>
    </nav>
</body>