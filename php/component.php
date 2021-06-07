<?php

function produto($nomeproduto, $precoproduto, $imgproduto, $idproduto){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$imgproduto\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$nomeproduto</h5>
                            <!--Comentado!  <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>-->
                            <!--Comentado! <p class=\"card-text\">
                                Some quick example text to build on the card.
                            </p>-->
                            <h5>
                                <!--Comentado!<small><s class=\"text-secondary\">€519</s></small>-->
                                <span class=\"price\">€$precoproduto</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Adicionar ao carrinho <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='id_produto' value='$idproduto'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function carrinhoElement($imgproduto, $nomeproduto, $precoproduto, $idproduto){
    $element = "
    
    <form action=\"carrinho.php?action=remove&id=$idproduto\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$imgproduto alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$nomeproduto</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">€$precoproduto</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remover</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}