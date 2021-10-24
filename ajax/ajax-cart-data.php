<?php
session_start();

$total_price = 0;
$total_item = 0;

$output = '
<table class="table table-cart table-mobile" id="cart-details">
<thead>
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th></th>
  </tr>
</thead>

<tbody>';


if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        $output .= '
         <tr>
            <td class="product-col">
                <div class="product">
                <h3 class="product-title">
                    <a>' . $values["product_name"] . '</a>
                </h3>
                </div>
            </td>
            <td class="price-col">₹ ' . $values["product_price"] . '</td>

            <td class="quantity-col">
                <div class="cart-product-quantity">
                    <input type="number" id="qty" data-id="' . $values["product_id"] . '" class="form-control" value="' . $values["product_quantity"] . '" min="1" max="5" step="1" data-decimals="0" required />
                </div>
            </td>

            <td class="total-col">₹ ' . number_format($values["product_quantity"] * $values["product_price"], 1) . '</td>
            <td class="remove-col">
                <button class="btn-remove" id="' . $values["product_id"] . '">
                <i class="icon-close"></i>
                </button>
            </td>

         </tr>
  ';
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        $total_item = $total_item + 1;
    }
} else {
}

$output .= '  </tbody>
</table>';
$data = array(
    'cart_details'  => $output,
    'total_price'  => '₹' . number_format($total_price, 2),
);

echo json_encode($data);
