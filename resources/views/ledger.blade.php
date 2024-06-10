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
                    <a class="header-link" href="/">Home</a>
                    <a class="header-link" href="/record_expenses">Record</a>
                    <a class="header-link" href="/ledger">Ledger</a>
                    <!-- <a class="header-link" href="login.html">
                        <img class="account-logo" src="assets/account-logo.png"> -->
                    </a>
                </div>
            </div>    

    <div class="container">
      <div class="left_Side">
        <div style="font-size: 30px;">
        <h3 class="title">MONTHLY BALANCES</h3>
        </div>
        <div style="margin-right: 1rem; margin-left: 1rem;">
          <div style="background-color: #DDF2FD; display: flex; justify-content: space-between; border-radius: 16px; padding: 12px; font-size: 16px; color: black; text-align: center; margin-bottom: 20px; align-items: center;">
              <a id="leftApr" href="#"><h2>April</h2></a>
              <h2>Total Expense<br>{{$april_total_expense}}</h2>
              <h2>Total Income<br>{{$april_total_income}}</h2>
          </div>
        </div>

        <div style="margin-right: 1rem; margin-left: 1rem;">
          <div style="background-color: #DDF2FD; display: flex; justify-content: space-between; border-radius: 16px; padding: 12px; font-size: 16px; color: black; text-align: center; margin-bottom: 20px; align-items: center;">
              <a id="leftMay" href="#"><h2>May</h2></a>
              <h2>Total Expense<br>{{$may_total_expense}}</h2>
              <h2>Total Income<br>{{$may_total_income}}</h2>
          </div>
        </div>

        <div style="margin-right: 1rem; margin-left: 1rem;">
          <div style="background-color: #DDF2FD; display: flex; justify-content: space-between; border-radius: 16px; padding: 12px; font-size: 16px; color: black; text-align: center; margin-bottom: 20px; align-items: center;">
              <a id="leftJun" href="#"><h2>June</h2></a>
              <h2>Total Expense<br>{{$june_total_expense}}</h2>
              <h2>Total Income<br>{{$june_total_income}}</h2>
          </div>
        </div>

        <div style="margin-right: 1rem; margin-left: 1rem;">
          <div style="background-color: #DDF2FD; display: flex; justify-content: space-between; border-radius: 16px; padding: 12px; font-size: 16px; color: black; text-align: center; margin-bottom: 20px; align-items: center;">
              <a id="leftJul" href="#"><h2>July</h2></a>
              <h2>Total Expense<br>{{$july_total_expense}}</h2>
              <h2>Total Income<br>{{$july_total_income}}</h2>
          </div>
        </div>
      </div>
      <div class="right_side APR" id="apr">
        <div>
        <p class="title">JUN 2024</p>
        <p class="subtitle">Current Month</p>
        </div>
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; ">
              <h2>Month Expenses</h2>
              <h2>{{$total_expense}}</h2>
          </div>
  
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center;  ">
              <h2>Month Income</h2>
              <h2>{{$total_income}}</h2>
          </div>
        </div>

        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem; margin-top:20px;">
          <div style="background-color: #D9D9D9; border-radius: 10px; padding: 12px; font-size: 16px; color: black; text-align: center; ">
              <h4>Filter</h4>
              <select name="" id="ledger_select">
                <option value="income" onclick=ledge();>income</option>
                <option value="expense" onclick=ledge();>expense</option>
              </select>
          </div>
        </div>

        <!-- INI TABEL INCOME -->
        <table id="show_income">
          <tr>
            <th>Transactions</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Day & Date</th>
          </tr>
          @foreach($incomes as $income)
          <tr>
            <td>{{$income->customer_name}}</td>
            <td>Income</td>
            <td>{{$income->amount}}</td>
            <td>{{$income->date}}</td>
          </tr>
          @endforeach
        </table>
        <!-- INI TABEL EXPENSE -->
        <table id="show_expense">
          <tr>
            <th>Transactions</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Day & Date</th>
          </tr>
          @foreach($expenses as $expense)
          <tr>
            <td>{{$expense->item_name}}</td>
            <td>Expense</td>
            <td>{{$expense->total_price}}</td>
            <td>{{$expense->date}}</td>
          </tr>
          @endforeach
        </table>
      </div>

      <div class="right_side MAY" id="may">
        <div>
        <p class="title">MAY 2024</p>
        <p class="subtitle">Current Month</p>
        </div>
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; ">
              <h2>Month Expenses</h2>
              <h2> Rp 0</h2>
          </div>
  
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center;  ">
              <h2>Month Income</h2>
              <h2>Rp 0</h2>
          </div>
        </div>

        <!-- <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem; margin-top:20px;">
          <div style="background-color: #D9D9D9; border-radius: 10px; padding: 12px; font-size: 16px; color: black; text-align: center; ">
              <h4>Filter</h4>
              <select name="" id="ledger_select">
                <option value="income">income</option>
                <option value="expense">expense</option>
              </select>
          </div>
        </div> -->

        <!-- <table>
          <tr>
            <th>Transactions</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Day & Date</th>
          </tr>
          <tr>
            <td>Mochi Milo</td>
            <td>Income</td>
            <td>Rp 240.000</td>
            <td>Rabu, 3 Mei 2024</td>
          </tr>
          <tr>
            <td>Mochi Stroberi</td>
            <td>Income</td>
            <td>Rp 250.000</td>
            <td>Rabu, 3 Mei 2024</td>
          </tr>
          <tr>
            <td>Mochi Matcha</td>
            <td>Income</td>
            <td>Rp 300.000</td>
            <td>Rabu, 3 Mei 2024</td>
          </tr>       
        </table> -->
      </div>

      <!-- <div class="right_side JUN" id="jun">
        <div>
        <p class="title">JUN 2024</p>
        <p class="subtitle">Current Month</p>
        </div>
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; ">
              <h2>Month Expenses</h2>
              <h2>Rp 0</h2>
          </div>
  
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center;  ">
              <h2>Month Income</h2>
              <h2>Rp 0</h2>
          </div>
        </div>

        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem; margin-top:20px;">
          <div style="background-color: #D9D9D9; border-radius: 10px; padding: 12px; font-size: 16px; color: black; text-align: center; ">
              <h4>Filter</h4>
              <select name="" id="">
                <option value="">income</option>
                <option value="">expense</option>
              </select>
          </div>
        </div>

        <!-- <table>
          <tr>
            <th>Transactions</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Day & Date</th>
          </tr>
          <tr>
            <td>Bubuk Milo</td>
            <td>Expenses</td>
            <td>Rp 50.000</td>
            <td>Kamis, 18 Juni 2024</td>
          </tr>
          <tr>
            <td>Bubuk Matcha</td>
            <td>Expenses</td>
            <td>Rp 40.000</td>
            <td>Kamis, 18 Juni 2024</td>
          </tr>
          <tr>
            <td>Anggur Muskat</td>
            <td>Expenses</td>
            <td>Rp 50.000</td>
            <td>Jumat, 19 Juni 2024</td>
          </tr>       
        </table> -->
      </div> -->

      <!-- <div class="right_side JUL" id="jul">
        <div>
        <p class="title">JUL 2024</p>
        <p class="subtitle">Current Month</p>
        </div>
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; ">
              <h2>Month Expenses</h2>
              <h2>Rp 0</h2>
          </div>
  
          <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center;  ">
              <h2>Month Income</h2>
              <h2>Rp 0</h2>
          </div>
        </div>

        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem; margin-top:20px;">
          <div style="background-color: #D9D9D9; border-radius: 10px; padding: 12px; font-size: 16px; color: black; text-align: center; ">
              <h4>Filter</h4>
              <select name="" id="">
                <option value="">income</option>
                <option value="">expense</option>
              </select>
          </div>
        </div>

        <table>
          <tr>
            <th>Transactions</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Day & Date</th>
          </tr>
          <tr>
            <td>Grape Sando</td>
            <td>Income</td>
            <td>Rp 200.000</td>
            <td>Selasa, 20 Juli 2024</td>
          </tr>
          <tr>
            <td>Mochi Milo</td>
            <td>Income</td>
            <td>Rp 300.000</td>
            <td>Selasa, 20 Juli 2024</td>
          </tr>
          <tr>
            <td>Mochi Stroberi</td>
            <td>Income</td>
            <td>Rp 400.000</td>
            <td>Selasa, 20 Juli 2024</td>
          </tr>       
        </table>
      </div> -->
      


    </div>
    
      
  </body>
</html>

<script>
  function ledge(){
    let ledger = document.getElementById('ledger_select').value;
    let show_income = document.querySelector('#show_income');
    let show_expense = document.querySelector('#show_expense');
    if(ledger == 'income'){
      // alert('ini income');
      show_expense.classList.add('hidden');
      show_income.classList.remove('hidden');
    }else{
      // alert('ini expense');
      show_income.classList.add('hidden');
      show_expense.classList.remove('hidden');
    };
  }
</script>
