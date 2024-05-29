<?php
// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

// mengecek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit_inventory"]) ) {
    // Ambil data dari tiap elemen dalam form
    $item_name = $_POST["item_name"];
    $unit_price = $_POST["unit_price"];
    $quantity = $_POST["quantity"];
    
    // query insert data
    $query = "INSERT INTO inventory VALUES ('', '$item_name', '$unit_price', '$quantity')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if( mysqli_affected_rows($conn) > 1 ) {
        echo "
            <script>
                alert('Data have been Added!')
                document.location.href = 'record_inventory.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data have not been Added!')
                document.location.href = 'record_inventory.php'
            </script>
        ";
    }
}

?>