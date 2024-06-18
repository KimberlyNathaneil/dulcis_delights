<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights - Expenses Record </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="../../css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar-expenses">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="/home">Home</a>
                    <a class="header-link header-active" href="/record_expenses">Record</a>
                    <a class="header-link" href="/ledger">Ledger</a>
                    <!-- <a class="header-link" href="login.html">
                        <img class="account-logo" src="assets/account-logo.png">
                    </a>    -->
                </div>                                   
            </div>
        </div>
        <div class="record" id="record_expenses">
            <div class="record-bar flex-container flex-row">
                <a class="record-text record-text-active" href="expenses">Expenses</a>
                <a class="record-text" href="incomes">Income</a>
                <a class="record-text" href="inventories">Inventory</a>
            </div>
        </div>
        <div class="input" id="input_expenses">
            <div class="input-content flex-container flex-col">
                <form action="/expenses/{{$expense->id}}" method="POST">
                    @csrf
                    @method('UPDATE')
                    <div class="input-box flex-container flex-row">
                        <input type="date" id="date" name="date" placeholder="Date" required value="{{$expense->date}}">
                        <input type="text" id="item_name" name="item_name" placeholder="Item Name" required value="{{$expense->item_name}}">
                        <input type="number" id="qty" name="qty" placeholder="Qty" required value="{{$expense->qty}}">
                        <input type="number" id="unit_price" name="unit_price" placeholder="Unit Price" required value="{{$expense->unit_price}}">
                        <input type="number" id="total_price" name="total_price" placeholder="Total Price" required value="{{$expense->total_price}}">
                        <input type="text" id="note" name="note" placeholder="Note" required value="{{$expense->note}}">
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
                    <th span="1" style="width: 20em;">Action</th>
                </tr>
                @foreach ($expenses as $expense)
                <tr>
                    <td span="1" style="width: 20em;">{{ $expense->date }}</td>
                    <td span="1" style="width: 20em;">{{ $expense->item_name }}</td>
                    <td span="1" style="width: 5em">{{ $expense->qty }}</td>
                    <td span="1" style="width: 20em;">Rp {{number_format($expense->unit_price, 0, '', '.')}}</td>
                    <td span="1" style="width: 20em;">Rp {{number_format($expense->total_price, 0, '', '.') }}</td>
                    <td span="1" style="width: 20em; border-right: 0.2em solid black;">{{ $expense->note }}</td>
                    <td span="1" style="width: 20em;"><a href="">Edit</a>
                    <form action="expenses/{{$expense->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                <?php $i = 1; ?>
              
            </table>
        </div>
    </body>
</html>