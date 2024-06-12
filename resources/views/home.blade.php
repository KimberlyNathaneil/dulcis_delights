<html>
    <head>
        <title>Dulcis Delights</title>
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
                    <a class="header-link" href="/record_expenses">Record</a>
                    <a class="header-link" href="/ledger">Ledger</a>
                    {{-- <a class="header-link" href="index">
                        <img class="account-logo" src="assets/account-logo.png"> --}}
                    </a>
                </div>
            </div>  
        </div>  

        <section class="home" id="home">
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; text-align: center; margin-top: 50px; ">
                <h2 style="color: white">Month Expenses</h2>
                <h2 style="color: white"> Rp {{$monthExpense}} </h2>
            </div>
    
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; margin-top: 50px; ">
                <h2 style="color: white">Month Income</h2>
                <h2 style="color: white"> Rp {{$monthIncome}}  </h2>
            </div>
        </div>
            <!-- <div style="display: flex; gap: 32px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 50px; ">
                    <h2 style="color: white"> Date/Day/Time </h2>
                </div>
                <div style="display: flex; gap: 8rem;">
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 50px; ">
                        <h2 style="color: white"> (+) Rp xxx.xxx </h2>
                    </div>
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 50px; margin-right: 5.6rem">
                        <h2 style="color: white"> (-) Rp xxx.xxx </h2>
                    </div>
                </div>
            </div> -->
            <!-- <div style="background-color: #164863; border-radius: 100px; padding: 20px; margin-top: 20px; margin-left: 2rem; margin-right: 2rem; ">
                <div style="display: flex; gap: 64px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                    <div style="display: flex; flex: 1; gap: 64px;">
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2 style="color: white"> Item Name</h2>
                        </div>
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2 style="color: white"> Note </h2>
                        </div>
                    </div>
                    <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; flex: 1; display: flex; justify-content: space-around">
                         <h2> (-) xxx.xxx </h2>
                        <h2></h2>
                        <h2 style="color: white"> (-) Rp xxx.xxx </h2>
                    </div>
                </div>
            </div> -->

        @foreach($groupedTransactions as $date => $transactions)
            @php
                $totalIncome = $transactions->whereInstanceOf(Income::class)->sum('amount');
                $totalExpense = $transactions->whereInstanceOf(Expense::class)->sum('total_price');
            @endphp
            <div class="style=display: flex; gap: 32px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                    <h2 style="color: white"> {{ $date }} </h2>
                </div>
                <div style="display: flex; gap: 8rem;">
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                        <h2 style="color: white"> + Rp {{ $totalIncome }} </h2>
                    </div>
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; margin-right: 5.6rem">
                        <h2 style="color: white"> - Rp {{ $totalExpense }} </h2>
                    </div>
                </div>
            </div>
            @foreach($transactions as $transaction)
                <div style="background-color: #164863; border-radius: 100px; padding: 20px; margin-top: 20px; margin-left: 2rem; margin-right: 2rem; ">
                    <div style="display: flex; gap: 64px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                        <div style="display: flex; flex: 1; gap: 64px;">
                            <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                                <h2> {{ $transaction->item_name ?? $transaction->customer_name }} </h2>                        
                            </div>
                            <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                                <h2> {{ $transaction->note }} </h2>
                            </div>
                        </div>
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; flex: 1; display: flex; justify-content: space-around">
                            <h2></h2>
                            @if ($transaction instanceof Income)
                                <h2> + Rp {{ $transaction->amount }} </h2>
                            @else
                                <h2> - Rp {{ $transaction->total_price }} </h2>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        

        </section>
    </body>
</html>