<nav class="navbar sticky-top navbar-expand-xl" style="background-image: url('/banner/navground.png');">
    <div class="container">
        <a class="navbar-brand" href="/Product">
            <img src="/banner/logo.png" alt="" style="width: 250px;">
        </a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: aliceblue;">
                    Kategori
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" style="width: 450px; border-radius: 20px;">
                </form>
            </li>
            <li class="nav-item">
                <i class="fa fa-bell" style="font-size: 24px; margin-top: 8px"></i>
            </li>
            <?php
            $cart = $cart->contents();
            $item = 0;
            foreach ($cart as $key => $value) :
                $item = $item + $value['qty'];
            ?>
                <li class="nav-item">
                    <i class="fa fa-shopping-cart" style="font-size: 24px; margin-top: 8px"></i>
                    <span class="badge badge-danger navbar-badge"> <?= $item; ?> </span>

                </li>
            <?php endforeach; ?>
            <li>
                <form action="/login/logout" method="post">
                    <button class="btn btn-danger">logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>