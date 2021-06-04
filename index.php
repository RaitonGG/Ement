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
      <div>
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