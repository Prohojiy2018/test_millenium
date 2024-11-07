<?php

namespace Products;

class View
{
	public function show (array $products): string
	{
        $html_products = [];
        foreach ($products as $product) {
            $title = $product['title'];
            $price = $product['price'];

            $html_products[] =
<<<HTML
                <tr>
                    <td>$title</td>
                    <td>$price руб.</td>
                </tr>
HTML;
        }

        $html_products = implode("\n", $html_products);

        $html =
<<<HTML
            <div style="font-size: 120%;">Добавленные товары</div>
            <br>
            <table id="product_list" style="width: 50%;">
                <tr>
                    <td>Наименование</td>
                    <td>Цена</td>
                </tr>
                $html_products
            </table>
HTML;

        return $html;
	}
}