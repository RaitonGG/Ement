<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');

// create instance of Createdb class
$database = new CreateDb("ementas");

if (isset($_POST['add'])){
    /// print_r($_POST['id_produto']);
    if(isset($_SESSION['carrinho'])){

        $item_array_id = array_column($_SESSION['carrinho'], "id_produto");

        if(in_array($_POST['id_produto'], $item_array_id)){
            echo "<script>alert('Produto já foi adicionado ao carrinho..!')</script>";
            echo "<script>window.location = 'produtos.php'</script>";
        }else{

            $contador = count($_SESSION['carrinho']);
            $item_array = array(
                'id_produto' => $_POST['id_produto']
            );

            $_SESSION['carrinho'][$contador] = $item_array;
        }

    }else{

        $item_array = array(
                'id_produto' => $_POST['id_produto']
        );

        // Create new session variable
        $_SESSION['carrinho'][0] = $item_array;
        print_r($_SESSION['carrinho']);
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
    <title>Carrinho de Comprar</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require_once ("php/header.php"); ?>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getProdutos();
                while ($row = mysqli_fetch_assoc($result)){
                    produto($row['nome_produto'], $row['preco_produto'], $row['fotografia_produto'], $row['id_produto']);
                }
            ?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>