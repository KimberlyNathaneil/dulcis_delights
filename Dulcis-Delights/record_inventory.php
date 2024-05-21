<?php
    $conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

    $result = mysqli_query($conn, "SELECT * FROM inventory");
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights - Income Record </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar-inventory">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="index.php">Home</a>
                    <a class="header-link header-active" href="record.php">Record</a>
                    <a class="header-link" href="ledger.html">Ledger</a>
                    <!-- <a class="header-link" href="login.html">
                        <img class="account-logo" src="assets/account-logo.png">
                    </a>    -->
                </div>                                   
            </div>
        </div>
        <div class="record" id="record_inventory">
            <div class="record-bar flex-container flex-row">
                <a class="record-text" href="record_expenses.php">Expenses</a>
                <a class="record-text" href="record_income.php">Income</a>
                <a class="record-text record-text-active" href="record_inventory.php">Inventory</a>
            </div>
        </div>
        <div class="input-inv" id="input_inventory">
            <div class="input-content flex-container flex-col">
                <form action="proses_record_inventory.php" method="post">
                    <div class="input-box flex-container flex-row">
                        <input type="text" id="item_name" name="item_name" placeholder="Item Name" required>
                        <input type="number" id="unit_price" name="unit_price" placeholder="Unit Price" required>
                        <input type="number" id="quantity" name="quantity" placeholder="Qty" required>
                    </div> 
                    <div class="input-submit flex-container flex-end">
                        <div class="submit-wrap">
                            <input type="submit" name="submit_inventory" value="Confirm"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-inventory" id="table-inventory">
            <table>
                <tr>
                    <th span="1" style="width: 33em;">Item Name</th>
                    <th span="1" style="width: 33em;">Unit Price</th>
                    <th span="1" style="width: 33em; border-right: 0.2em solid black;">Quantity</th>
                </tr>
                <tr class="table-hidden">
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $i = 1; ?>
                <?php while( $row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?= $row['item_name']; ?> </td>
                        <td><?= $row['unit_price']; ?></td>
                        <td>
                            <div class="inv-edit-wrap">
                                <p id="inv-qty-1"><?= $row['quantity']; ?></p>
                                <a id="inv-popup-event">
                                    <img class="inv-edit-img" src="assets/edit-logo.png" alt="Edit">
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endwhile; ?>           
            </table>
            <div class="inv-popup-overlay" id="inv-popup-overlay">
                <div class="inv-popup" id="inv-popup">
                    <div class="inv-popup-content">
                        <input type="number" id="edit">
                        <button id="inv-popup-btn">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let popupOverlay = document.getElementById('inv-popup-overlay');
        let popup = document.getElementById('inv-popup');
        let qtyInput = document.getElementById('inv-popup-num');
        let popupEvent = document.getElementById('inv-popup-event');
        let popupBtn = document.getElementById('inv-popup-btn');
        
        function openPopup() {
            popupOverlay.style.display = 'block';
        }
        
        function closePopupFunc() {
            popupOverlay.style.display = 'none';
        }
        
        popupBtn.addEventListener('click', function() {
            let tempQty = qtyInput.value;
            if (tempQty == null || tempQty == "") {
                alert("Please tick the box!");
                openPopup();
            } else {
                closePopupFunc();
                qtyInput.value = null;
            }
        });
        
        popupEvent.addEventListener('click', function() {
            openPopup();
        });

        popupOverlay.addEventListener('click', function() {
            if (event.target === popupOverlay) {
                closePopupFunc();
            }
        });        
    });
</script>
    