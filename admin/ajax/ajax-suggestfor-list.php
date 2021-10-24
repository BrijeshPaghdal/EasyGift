<?php
require("../config.php");
$query  = "SELECT * FROM  `tbl_suggestion`";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = " <table class='table table-hover js-basic-example contact_list js-sweetalert'>
    <thead>
        <tr>
            <th>#</th>
            <th>Sub Category Name</th>
            <th>Gedner</th>
            <th>Minimum Age</th>
            <th>Maximum Age</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $sugg_id = $row['sugg_id'];
        $sugg_for = $row['sugg_for'];
        $gender = $row['gender'];
        $min_age = $row['min_age'];
        $max_age = $row['max_age'];

        $output .= "<tr>
        <td>".$i++."</td>
        <td>{$sugg_for}</td>
        <td>{$gender}</td>
        <td>{$min_age}</td>
        <td>{$max_age}</td>
        <td>
          <button class='btn tblActnBtn' data-type='confirm' id='btnSuggDelete' data-id='$sugg_id'>
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
