<?php
// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

// mengecek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit_income"]) ) {
    // Ambil data dari tiap elemen dalam form
    $day_date = $_POST["day_date"];
    $item_name = $_POST["customer_name"];
    $payment_method = $_POST["payment_method"];
    $amount = $_POST["amount"];
    $note = $_POST["note"];
    
    // query insert data
    $query = "INSERT INTO income VALUES ('', '$day_date', '$item_name','$payment_method', '$amount', '$note')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if( mysqli_affected_rows($conn) > 0 ) {
        echo "
            <script>
                alert('Data have been Added!')
                document.location.href = 'record_income.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data have not been Added!')
                document.location.href = 'record_income.php'
            </script>
        ";
    }
}

?>