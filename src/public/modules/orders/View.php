<?php

namespace Orders;

class View
{
	public function show (string $user_name, string $orders)
	{
        $html =
<<<HTML
            <div style="font-size: 120%;">Заказы пользователя $user_name</div>
            <br>
            <table id="order_list" style="width: 50%;">
                <tr>
                    <td>Товар</td>
                    <td>Цена</td>
                    <td>Дата заказа</td>
                </tr>
                <script>
                    let order_list = document.getElementById('order_list');

                    $orders.forEach(function(order) {
                        order_list.innerHTML += 
                            '<tr>' +
                                '<td>' + order.title + '</td>' +
                                '<td>' + order.price + '</td>' +
                                '<td>' + order.created_at + '</td>' +
                            '</tr>'
                        ;
                    });
                </script>
            </table>
HTML;

        return $html;
	}
}