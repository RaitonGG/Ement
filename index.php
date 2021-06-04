<?php
$conn = mysqli_connect('localhost', 'platafo8_Ricardo', 'SBCrtHPg5Lv3', 'platafo8_Ementas');
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
          <div class="listings-list-element">
            <a href="productPage.html">
              <div class="listings-list-element-text">
              <div class="text-title">
              <h3 class="text-title-h3">item numero x, (BD)</h3>
              <div><span>Pequena descrição sobre o produto e os seus componentes, (BD)</span></div>
              <div class="info">
                <span class="text-title-span">4,50€ (BD)</span>
                <span class="rating-circle">4.2 (BD)</span>
              </div>
              </div>
            </div>
            </a>
          </div>
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
        </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center">
      <?php
        $result = getRestaurantes();
        if($result){
          while ($row = mysqli_fetch_assoc($result)){ ?>
                <div>
                  <b>Nome do Restaurante:</b> <?php echo $row['Nome_Restaurante']; ?> <br/>
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

<?php 

function getRestaurantes(){
  $sql = "SELECT * FROM restaurantes";

  $result = mysqli_query($GLOBALS['conn'], $sql);

  if(mysqli_num_rows($result) > 0){
      return $result;
  }
}
?>