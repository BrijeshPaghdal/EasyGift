<?php
require("../config.php");
$query  = "SELECT * FROM `tbl_category` WHERE cate_id != 0";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = " <table class='table table-hover js-basic-example contact_list js-sweetalert'>
    <thead>
        <tr>
            <th>Images</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = mysqli_fetch_assoc($res)) {
        $image_name = $row['cate_image_name'];
        $cate_name = $row['cate_name'];
        $cat_id  = $row['cate_id'];

        $output .= "<tr>
        <td class='table-img'>
            <img src='category-image/{$image_name}' alt=''  height = '40px' width= '40px'  />
        </td>
        <td>{$cate_name}</td>
        <td>
            <button class='btn tblActnBtn' data-type='confirm' id='btnCateDelete' data-id='$cat_id'>
                <i class='material-icons'>delete</i>
            </button>
        </td>
    </tr>";
    }

    $output .= "</tbody>
    </thead>
    </table>";
    echo $output;
} else {
    echo "<center>No Records Found.....</center>";
}
?>

<script src="assets/js/table.min.js"></script>

<script src="assets/js/pages/tables/jquery-datatable.js"></script>
