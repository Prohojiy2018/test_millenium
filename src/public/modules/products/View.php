<?php

namespace Products;

class View
{
	public function show (string $products)
	{
        $html =
<<<HTML
            <div style="font-size: 120%;">Добавленные товары</div>
            <br>
            <table id="product_list" style="width: 50%;">
                <tr>
                    <td>Товар</td>
                    <td>Цена</td>
                </tr>
                <script>
                    let product_list = document.getElementById('product_list');

                    $products.forEach(function(product) {
                        product_list.innerHTML += 
                            '<tr>' +
                                '<td>' + product.title + '</td>' +
                                '<td>' + product.price + '</td>' +
                            '</tr>'
                        ;
                    });
                </script>
            </table>
HTML;

        return $html;
	}
}