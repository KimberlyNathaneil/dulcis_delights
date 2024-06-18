<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights - Income Record </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar-income">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="/home">Home</a>
                    <a class="header-link header-active" href="/record_expenses">Record</a>
                    <a class="header-link" href="/ledger">Ledger</a>
                    <a class="header-link" role="button" id="anchor">
                        <img class="account-logo" src="assets/account-logo.png">
                        <div class="popup" id="popup">
                            <div class="popup-content">
                              <div class="top-section">
                                <div class="left-column">
                                  <img class="account-logo" src="assets/account-logo.png" alt="Account Logo">
                                </div>
                                <div class="right-column">
                                  <div class="name-row">
                                    <span>{{ session('loggedUser.name') }}</span>
                                  </div>
                                  <div class="email-row">
                                    <span>{{ session('loggedUser.email') }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="bottom-section">
                                <form action="{{ route('logout') }}" method="get">
                                    @csrf
                                    <button class="logout-btn" id="logout-btn" type="submit">Logout</button>
                                </form>
                              </div>
                            </div>
                          </div>
                    </a>
                    <div class="overlay" id="overlay"></div>
                </div>                                   
            </div>
        </div>
        <div class="record" id="record_expenses">
            <div class="record-bar flex-container flex-row">
                <a class="record-text" href="expenses">Expenses</a>
                <a class="record-text record-text-active" href="incomes">Income</a>
                <a class="record-text" href="inventories">Inventory</a>
            </div>
        </div>
        <div class="input" id="input_income">
            <div class="input-content flex-container flex-col">
                <form action="" method="post">
                    @csrf
                    <div class="input-box flex-container flex-row">
                        <input type="date" id="date" name="date" placeholder="Date" required>
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
                    <th span="1" style="width: 20em;">Action</th>
                </tr>
                @foreach ($incomes as $income )
                <tr>
                    <td span="1" style="width: 20em;">{{ $income->date }}</td>
                    <td span="1" style="width: 20em;">{{ $income->customer_name }}</td>
                    <td span="1" style="width: 5em">{{ $income->payment_method }}</td>
                    <td span="1" style="width: 20em;">Rp {{number_format($income->amount, 0, '', '.')}}</td>
                    <td span="1" style="width: 20em; border-right: 0.2em solid black;">{{ $income->note }}</td>
                    <td span="1" style="width: 20em;"><a href="">Edit</a>
                    <form action="incomes/{{$income->id}}" method="POST">
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
<script>
        const anchor = document.querySelector('#anchor');
        const popup = document.querySelector('#popup');
        const overlay = document.querySelector('#overlay');
    
        anchor.addEventListener('click', (e) => {
            if (e.target.id === 'logout-btn') {
                return;
            }
            e.preventDefault();
            overlay.classList.add('show');
            popup.classList.add('show');
        });
    
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.classList.remove('show');
                popup.classList.remove('show');
            }
        });
    </script>
