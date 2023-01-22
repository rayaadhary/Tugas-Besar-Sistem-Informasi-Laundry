<?php
require '../functions.php';
$no_faktur = 0;
if (isset($_POST['no_faktur'])) {
    $no_faktur = $_POST['no_faktur'];
}
$data = array();
if ($no_faktur > 0) {
    $query = "SELECT * FROM transaksi WHERE no_faktur='$no_faktur'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $total = $row['total'];

        $data[] = array(
            "total" => $total
        );
    }
}
echo json_encode($data);
