<?php
    $conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

    $result = mysqli_query($conn, "SELECT * FROM expenses");
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights - Expenses Record </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar-expenses">
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
        <div class="record" id="record_expenses">
            <div class="record-bar flex-container flex-row">
                <a class="record-text record-text-active" href="record_expenses.php">Expenses</a>
                <a class="record-text" href="record_income.php">Income</a>
                <a class="record-text" href="record_inventory.php">Inventory</a>
            </div>
        </div>
        <div class="input" id="input_expenses">
            <div class="input-content flex-container flex-col">
                <form action="proses_record_expenses.php" method="post">
                    <div class="input-box flex-container flex-row">
                        <input type="text" id="day_date" name="day_date" placeholder="Day, Date" required>
                        <input type="text" id="item_name" name="item_name" placeholder="Item Name" required>
                        <input type="number" id="quantity" name="quantity" placeholder="Qty" required>
                        <input type="number" id="unit_price" name="unit_price" placeholder="Unit Price" required>
                        <input type="number" id="total_price" name="total_price" placeholder="Total Price" required>
                        <input type="text" id="note" name="note" placeholder="Note" required>
                    </div> 
                    <div class="input-submit flex-container flex-end">
                        <div class="submit-wrap">
                            <input type="submit" name="submit_expenses" value="Confirm"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table" id="table-expenses">
            <table>
                <tr>
                    <th span="1" style="width: 20em;">Day, Date</th>
                    <th span="1" style="width: 20em;">Item Name</th>
                    <th span="1" style="width: 5em">Qty</th>
                    <th span="1" style="width: 20em;">Unit Price</th>
                    <th span="1" style="width: 20em;">Total Price</th>
                    <th span="1" style="width: 20em; border-right: 0.2em solid black;">Note</th>
                </tr>
                <tr class="table-hidden">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_array($result)) : ?> 
                    <tr>
                        <td><?= $row['day_date']; ?></td>
                        <td><?= $row['item_name']; ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td><?= $row['unit_price']; ?></td>
                        <td><?= $row['total_price']; ?></td>
                        <td><?= $row['note']; ?></td>
                    </tr>
                <?php $i++; ?>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>