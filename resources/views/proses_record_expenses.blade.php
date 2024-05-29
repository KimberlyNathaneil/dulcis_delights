<?php
// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

// mengecek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit_expenses"]) ) {
    // Ambil data dari tiap elemen dalam form
    $day_date = $_POST["day_date"];
    $item_name = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $unit_price = $_POST["unit_price"];
    $total_price = $_POST["total_price"];
    $note = $_POST["note"];
    
    
    // query insert data
    $query = "INSERT INTO expenses VALUES ('','$day_date', '$item_name', '$quantity', '$unit_price', '$total_price', '$note')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if( mysqli_affected_rows($conn) > 0 ) {
        echo "
            <script>
                alert('Data have been Added!')
                document.location.href = 'record_expenses.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data have not been Added!')
                document.location.href = 'record_expenses.php'
            </script>
        ";
    }
}
?>