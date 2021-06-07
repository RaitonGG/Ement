<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$database = new CreateDb("ementas");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['carrinho'] as $key => $value){
          if($value["id_produto"] == $_GET['id']){
              unset($_SESSION['carrinho'][$key]);
              echo "<script>alert('Product foi removido...!')</script>";
              echo "<script>window.location = 'carrinho.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>carrinho</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Carrinho</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['carrinho'])){
                        $id_produto = array_column($_SESSION['carrinho'], 'id_produto');

                        $result = $database->getProdutos();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($id_produto as $id){
                                if ($row['id_produto'] == $id){
                                    carrinhoElement($row['fotografia_produto'], $row['nome_produto'],$row['preco_produto'], $row['id_produto']);
                                    $total = $total + (int)$row['preco_produto'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>carrinho está vazio</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>Detalhes do preco</h6>
                <hr>
                <div class="row detalhes-preco">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['carrinho'])){
                                $contador  = count($_SESSION['carrinho']);
                                echo "<h6>Preço ($contador items)</h6>";
                            }else{
                                echo "<h6>Preço (0 items)</h6>";
                            }
                        ?>
                        <h6>Taxas de entrega</h6>
                        <hr>
                        <h6>Montante a pagar</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>€<?php echo $total; ?></h6>
                        <h6 class="text-success">GRÁTIS</h6>
                        <hr>
                        <h6>€<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
