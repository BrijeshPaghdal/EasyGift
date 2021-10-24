<?php
require("../config.php");
$query  = "SELECT s.sub_c_id , s.sub_c_name , c.cate_name , c.cate_image_name FROM  `tbl_sub_category` s , `tbl_category` c WHERE s.cate_id = c.cate_id AND  c.cate_id != 0";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = " <table class='table table-hover js-basic-example contact_list js-sweetalert'>
    <thead>
        <tr>
            <th>Images</th>
            <th>Sub Category Name</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <div class='menu'>";
    while ($row = mysqli_fetch_assoc($res)) {
        $image_name = $row['cate_image_name'];
        $cate_name = $row['cate_name'];
        $sub_c_name = $row['sub_c_name'];
        $sub_c_id  = $row['sub_c_id'];

        $output .= "<tr>
        <td class='table-img'>
            <img src='category-image/{$image_name}' alt=''  height = '40px' width= '40px'  />
        </td>
        <td>{$sub_c_name}</td>
        <td>{$cate_name}</td>
        <td>
          <button class='btn tblActnBtn' data-type='confirm' id='btnSubCateDelete' data-id='$sub_c_id'>
              <i class='material-icons'>delete</i>
          </button>
        </td>
    </tr>";
    }

    $output .= "</div></tbody>
    </thead>
    </table>";
    echo $output;
} else {
    echo "<center>No Records Found.....</center>";
}
?>

<script src="assets/js/table.min.js"></script>

<script src="assets/js/pages/tables/jquery-datatable.js"></script>
