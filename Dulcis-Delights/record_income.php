<?php
    $conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

    $result = mysqli_query($conn, "SELECT * FROM income");
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
        <div class="navbar" id="navbar-income">
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
        <div class="record" id="record_income">
            <div class="record-bar flex-container flex-row">
                <a class="record-text" href="record_expenses.php">Expenses</a>
                <a class="record-text record-text-active" href="record_income.php">Income</a>
                <a class="record-text" href="record_inventory.php">Inventory</a>
            </div>
        </div>
        <div class="input" id="input_income">
            <div class="input-content flex-container flex-col">
                <form method="post" action="proses_record_income.php">
                    <div class="input-box flex-container flex-row">
                        <input type="text" id="day_date" name="day_date" placeholder="Day, Date" required>
                        <input type="text" id="customer_name" name="customer_name" placeholder="Customer Name" required>
                        <input type="text" id="payment_method" name="payment_method" placeholder="Payment Method" required>
                        <input type="number" id="amount" name="amount" placeholder="Amount" required>
                        <input type="text" id="note" name="note" placeholder="Note" required>
                    </div> 
                    <div class="input-submit flex-container flex-end">
                        <div class="submit-wrap">
                            <input type="submit" name="submit_income" value="Confirm"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table" id="table-income">
            <table>
                <tr>
                    <th span="1" style="width: 20em;">Day, Date</th>
                    <th span="1" style="width: 20em;">Customer Name</th>
                    <th span="1" style="width: 20em;">Payment Method</th>
                    <th span="1" style="width: 20em;">Amount</th>
                    <th span="1" style="width: 20em; border-right: 0.2em solid black;">Note</th>
                </tr>
                <tr class="table-hidden">
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
                        <td><?= $row['customer_name']; ?></td>
                        <td><?= $row['payment_method']; ?></td>
                        <td><?= $row['amount']; ?></td>
                        <td><?= $row['note']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
    