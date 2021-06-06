<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="produtos.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Carrinho de Compras
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="carrinho.php" class="nav-item nav-link active">
                    <h5 class="px-5 carrinho">
                        <i class="fas fa-shopping-cart"></i> carrinho
                        <?php

                        if (isset($_SESSION['carrinho'])){
                            $contador = count($_SESSION['carrinho']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$contador</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>