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
    <link rel="stylesheet" href="styles/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css%22%3E"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Ement</h1>
                <div>
                <?php
                  $result = getRestaurantes();
                  <!-- Logo ou nome da empresa de onde vem o QRCODE -->
                  if($result){
                    while ($row = mysqli_fetch_assoc($result)){ ?>
                          <div>
                            <b>Nome do Restaurante:</b> <?php echo $row['nome_restaurante']; ?> <br/>
                          </div>
                    <?php } ?>
                  <?php } ?>
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
          <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
           <script>
             $(document).on('click', 'button', function(){
               $(this).addClass('selected').siblings().removeClass('selected')
             })
           </script>
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
          <!-- <a href="productPage.html"> -->
          <div class="listings-list-element">
              <div class="listings-list-element-text">
              <div class="text-title">
  <div class="row">
    <div class="col-8">
      <h3>Rustic Chicken Mostarda e Mel (BD)</h3>
      <div><span class="listings-span">Batata Frita, Arroz Branco e Ovo Estrelado, Batata Frita, Arroz Branco e Ovo Estrelado, Batata Frita, Arroz Branco e Ovo Estrelado (BD)</span></div>
      <div class="info">
        <span class="text-title-span">4,50€ (BD)</span>
    </div>
    <div class="col-4">
      <span class="product-counter">
        <span class="minus" onClick='decreaseCount(event, this)'><i data-feather="minus"></i></span>
        <input type="text" value="1">
        <span class="plus" onClick='increaseCount(event, this)'><i data-feather="plus"></i></span>
            <script type="text/javascript">
                  function increaseCount(a, b) {
                    var input = b.previousElementSibling;
                    var value = parseInt(input.value, 10);
                    value = isNaN(value)? 0 : value;
                    value ++;
                    input.value = value;
                    // o valor tem que vir de BD
                    var buyBtnText = "Adicionar " + value +" ao carrinho • " + value*4.50 + "€"
                    document.getElementById('buy-btn-text').innerHTML = buyBtnText;
                  }
                  function decreaseCount(a, b) {
                    var input = b.nextElementSibling;
                    var value = parseInt(input.value, 10);
                    if (value > 1) {
                      value = isNaN(value)? 0 : value;
                      value --;
                      input.value = value;
                    }
                    // o valor tem que vir de BD
                    var buyBtnText = "Adicionar " + value +" ao carrinho • " + value*4.50 + "€"
                    document.getElementById('buy-btn-text').innerHTML = buyBtnText;
                  }
                </script>
    </span>
    </div>
  </div>
</div>
              <h3>Rustic Chicken Mostarda e Mel (BD)</h3>
              <div><span class="listings-span">Batata Frita, Arroz Branco e Ovo Estrelado, Batata Frita, Arroz Branco e Ovo Estrelado, Batata Frita, Arroz Branco e Ovo Estrelado (BD)</span></div>
              <div class="info">
                <span class="text-title-span">4,50€ (BD)</span>
                <span class="product-counter">
                  <span class="minus" onClick='decreaseCount(event, this)'><i data-feather="minus"></i></span>
                  <input type="text" value="1">
                  <span class="plus" onClick='increaseCount(event, this)'><i data-feather="plus"></i></span>
                      <script type="text/javascript">
                            function increaseCount(a, b) {
                              var input = b.previousElementSibling;
                              var value = parseInt(input.value, 10);
                              value = isNaN(value)? 0 : value;
                              value ++;
                              input.value = value;
                              // o valor tem que vir de BD
                              var buyBtnText = "Adicionar " + value +" ao carrinho • " + value*4.50 + "€"
                              document.getElementById('buy-btn-text').innerHTML = buyBtnText;
                            }
                            function decreaseCount(a, b) {
                              var input = b.nextElementSibling;
                              var value = parseInt(input.value, 10);
                              if (value > 1) {
                                value = isNaN(value)? 0 : value;
                                value --;
                                input.value = value;
                              }
                              // o valor tem que vir de BD
                              var buyBtnText = "Adicionar " + value +" ao carrinho • " + value*4.50 + "€"
                              document.getElementById('buy-btn-text').innerHTML = buyBtnText;
                            }
                          </script>
              </span>
              </div>
            </div>
          </div>
          <!-- </a> -->
          <a href="productPage.html">
          <div class="listings-list-element">
            <div class="listings-list-element-text">
              <div class="text-title">
                <h3 class="text-title-h3">item numero x+1, (BD)</h3>
                <div><span>Pequena descrição sobre o produto e os seus componentes, (BD)</span></div>
                <div class="info">
                    <span class="text-title-span">4,50€ (BD)</span>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      <div>
      </div>
      <script src="https://unpkg.com/feather-icons"></script>
       <script>
         feather.replace()
       </script>
  </body>
</html>
