<?php

session_start();

require_once ("php/CreateDb.php");

$database = new CreateDb("ementas");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Ement</h1>
                <!-- Logo ou nome da empresa de onde vem o QRCODE -->
            </div>
            <div class="currentDetails">
                <!-- Mostra Mesa nrº x-->
                <div class="header-option">
                </div>
            </div>
            <div class="searchBar">
                <div class="header-option">
                    <i data-feather="search"></i>
                    <span>Pesquisar</span>
                </div>
            </div>
        </div>
    </header>
    <!-- Categories -->
    <div class="categories">
        <div class="container">
            <!-- buttons com categorias -->
            <button class="categories-btn selected">
            Bebidas
          </button>
            <button class="categories-btn">
            Comidas
          </button>
        </div>
    </div>

    <!-- Listing -->
    <div class="listings">
        <div class="container">
          <div class="listings-header">
            <div class="listings-header-title">
                    <h2>Frase da categoria, (BD)</h2>
                    <span class="listings-span">sub-frase da categoria, (BD)</span>
            </div>
          </div>
        </div>
        <div class="container">
        <div class="listings-list">
          <a href="productPage.html">
          <div class="listings-list-element">
              <div class="listings-list-element-text">
              <div class="text-title">
              <h3 class="text-title-h3">produto x, (BD)</h3>
              <div><span>Pequena descrição sobre o produto e os seus componentes, (BD)</span></div>
              <div class="info">
                <span class="text-title-span">4,50€ (BD)</span>
                <span class="rating-circle">4.2 (BD)</span>
              </div>
              </div>
            </div>
          </div>
          </a>
          <a href="productPage.html">
          <div class="listings-list-element">
            <div class="listings-list-element-text">
              <div class="text-title">
                <h3 class="text-title-h3">item numero x+1, (BD)</h3>
                <div><span>Pequena descrição sobre o produto e os seus componentes, (BD)</span></div>
                <div class="info">
                    <span class="text-title-span">4,50€ (BD)</span>
                    <span class="rating-circle">4.2 (BD)</span>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      <div>
      <?php
        $result1 = $database->getEstabelecimentos();
        if($result1){
          while ($row = mysqli_fetch_assoc($result1)){ ?>
                <div>
                  <b>Nome do Restaurante:</b> <?php echo $row['nome_estabelecimento']; ?> <br/>
                </div>
          <?php } ?> 
        <?php } ?> 
      </div>

      <script src="https://unpkg.com/feather-icons"></script>
       <script>
         feather.replace()
       </script>
  </body>
</html>