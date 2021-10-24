<?php
$total_price = 0;
$total_item = 0;

session_start();
if (!empty($_SESSION["shopping_cart"])) {
  $output = '
<table class="table table-summary" id="checkout-details">
<thead>
  <tr>
    <th>Product</th>
    <th>Total</th>
  </tr>
</thead>

<tbody>';
  foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    $output .= '
        <tr>
            <td>
            <a> ' . $values["product_name"] . '</a>
            </td>
            <td>₹ ' . number_format($values["product_quantity"] * $values["product_price"], 2) .  '</td>
        </tr>
            
  ';
    $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
    $total_item = $total_item + 1;
    $_SESSION['total_price'] = $total_price;
  }
  $output .= '<tr class="summary-subtotal">
                    <td>Subtotal:</td>
                    <td>₹ ' . $total_price . '</td>
                </tr>
                

                <tr class="summary-total">
                    <td>Total:</td>
                    <td>₹ ' . $total_price . '</td>
                </tr>
              
                </tbody>
                </table>';
  echo $output;
}
