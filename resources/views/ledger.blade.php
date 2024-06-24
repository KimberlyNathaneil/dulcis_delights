<html>
  <head>
    <title>Ledger</title>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="/home">Home</a>
                    <a class="header-link" href="/expenses">Record</a>
                    <a class="header-link header-active" href="/ledger">Ledger</a>
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

    <div class="container">
      <div class="left_Side" style="padding-top: 2.5rem;">
        @foreach($months as $month)
          <div style="margin-right: 1rem; margin-left: 1rem;">
              <div style="background-color: #DDF2FD; display: flex; justify-content: space-between; border-radius: 16px; padding: 12px; font-size: 16px; color: black; text-align: center; margin-bottom: 20px; align-items: center;">
                <a id="left{{ $month }}" onclick="ledgerShow('{{ $month }}', {{ ${$month.'_total_expense'} }}, {{ ${$month.'_total_income'} }});" href="#"><h2>{{ $month }}</h2></a>
                  <h2>Total Expense<br>Rp {{ number_format(${$month.'_total_expense'}, 0, '', '.') }}</h2>
                  <h2>Total Income<br>Rp {{ number_format(${$month.'_total_income'}, 0, '', '.') }}</h2>
              </div>
          </div>
        @endforeach
      </div>
    
      <div class="right_side" id="apr">
        <div>
            <p class="title" id="month-title">JUN 2024</p>
            <p class="subtitle">Current Month</p>
        </div>
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; ">
                <h2>Month Expenses</h2>
                <h2 id="total-expense">Rp {{ number_format($total_expense, 0, '', '.') }}</h2>
            </div>
    
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center;  ">
                <h2>Month Income</h2>
                <h2 id="total-income">Rp {{ number_format($total_income, 0, '', '.') }}</h2>
            </div>
        </div>
    
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem; margin-top:20px;">
            <div style="background-color: #D9D9D9; border-radius: 10px; padding: 12px; font-size: 16px; color: black; text-align: center; ">
                <h4>Filter</h4>
                <select name="" id="ledger_select" onchange="ledge()">
                  <option value="" selected disabled hidden>Please select</option>
                  <option value="income">income</option>
                  <option value="expense">expense</option>
                </select>
            </div>
        </div>


        <!-- INI TABEL INCOME -->
    
        <!-- INI TABEL INCOME -->
        <table id="show_income">
          <tbody>
            <tr>
                <th>Transactions</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Day & Date</th>
            </tr>
            @foreach($incomes as $income)
                @php
                    $month = date('F', strtotime($income->date));
                @endphp
                @if($month == date('F'))
                    <tr>
                        <td>{{ $income->customer_name }}</td>
                        <td>Income</td>
                        <td>Rp {{ number_format($income->amount, 0, '', '.') }}</td>
                        <td>{{ $income->date }}</td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
    
        <table id="show_expense">
          <tbody>
            <tr>
                <th>Transactions</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Day & Date</th>
            </tr>
            @foreach($expenses as $expense)
                @php
                    $month = date('F', strtotime($expense->date));
                @endphp
                @if($month == date('F'))
                    <tr>
                        <td>{{ $expense->item_name }}</td>
                        <td>Expense</td>
                        <td>Rp {{ number_format($expense->total_price, 0, '', '.') }}</td>
                        <td>{{ $expense->date }}</td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>      
  </body>
</html>
<script>

      let incomeData = {!! json_encode($incomes)!!};
      let expensesData = {!! json_encode($expenses)!!};

      function ledge(){
        let ledger = document.getElementById('ledger_select').value;
        let show_income = document.querySelector('#show_income');
        let show_expense = document.querySelector('#show_expense');
        if(ledger == 'income'){
          show_expense.classList.add('hidden');
          show_income.classList.remove('hidden');
        }else{
          show_income.classList.add('hidden');
          show_expense.classList.remove('hidden');
        };
      }

      function ledgerShow(month, totalExpense, totalIncome) {
        console.log('ledgerShow called with month:', month);

        document.getElementById("month-title").innerHTML = month + " 2024";
        function formatNumber(number) {
          return "Rp " + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        } 
        // Update total expense and income
        document.getElementById("total-expense").innerHTML = formatNumber(totalExpense);
        document.getElementById("total-income").innerHTML = formatNumber(totalIncome);

        var incomeTable = document.getElementById("show_income").getElementsByTagName("tbody")[0];
        var expensesTable = document.getElementById("show_expense").getElementsByTagName("tbody")[0];

        incomeTable.innerHTML = "";
        expensesTable.innerHTML = "";

        const monthMap = {
          'April': 4,
          'May': 5,
          'June': 6,
          'July': 7
        };
        
        let selectedMonth = monthMap[month];

        let filteredIncomes = incomeData.filter(function(income) {
          const dateParts = income.date.split('-');
          const month = parseInt(dateParts[1]);
          return month === selectedMonth;
        });
      
        let filteredExpenses = expensesData.filter(function(expense) {
          const dateParts = expense.date.split('-');
          const month = parseInt(dateParts[1]);
          return month === selectedMonth;
        });
      
        incomeTable.innerHTML = "<tr><th>Transactions</th><th>Category</th><th>Amount</th><th>Day & Date</th></tr>";
        filteredIncomes.forEach(function(income) {
          incomeTable.innerHTML += "<tr><td>" + income.customer_name + "</td><td>Income</td><td>Rp " + income.amount + "</td><td>" + income.date + "</td></tr>";
        });
        
        expensesTable.innerHTML = "<tr><th>Transactions</th><th>Category</th><th>Amount</th><th>Day & Date</th></tr>";
        filteredExpenses.forEach(function(expense) {
          expensesTable.innerHTML += "<tr><td>" + expense.item_name + "</td><td>Expense</td><td>Rp " + expense.total_price + "</td><td>" + expense.date + "</td></tr>";
        });
      }

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
