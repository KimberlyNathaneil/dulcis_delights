<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights - Income Record </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="../../css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar-inventory">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="/home">Home</a>
                    <a class="header-link header-active" href="/expenses">Record</a>
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
                <a class="record-text" href="incomes">Income</a>
                <a class="record-text record-text-active" href="inventories">Inventory</a>
            </div>
        </div>
        <div class="input-inv" id="input_inventory">
            <div class="input-content flex-container flex-col">
                <form action="/inventories/{{ $inventory->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="input-box flex-container flex-row">
                        <input type="text" id="item_name" name="item_name" placeholder="Item Name" required value="{{ $inventory->item_name }}">
                        <input type="number" id="unit_price" name="unit_price" placeholder="Unit Price" required value="{{ $inventory->unit_price }}">
                        <input type="number" id="qty" name="qty" placeholder="Qty" required value="{{ $inventory->qty }}">
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
                    <th span="1" style="width: 20em;">Action</th>
                </tr>
                @foreach ($inventories as $inventory )
                <tr>
                    <td span="1" style="width: 20em;">{{ $inventory->item_name }}</td>
                    <td span="1" style="width: 20em;">Rp {{number_format($inventory->unit_price, 0, '', '.')}}</td>
                    <td span="1" style="width: 5em">{{ $inventory->qty}}</td>
                    <td span="1" style="width: 20em;"><a href="">Edit</a>
                    <form action="inventories/{{$inventory->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                <?php $i = 1; ?>
                {{-- <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="inv-edit-wrap">
                            <p id="inv-qty-1"></p>
                            <a id="inv-popup-event">
                                <img class="inv-edit-img" src="assets/edit-logo.png" alt="Edit">
                            </a>
                        </div>                        
                    </td>
                </tr>
            </table>
            <div class="inv-popup-overlay" id="inv-popup-overlay">
                <div class="inv-popup" id="inv-popup">
                    <div class="inv-popup-content">
                        <input type="number" id="edit">
                        <button id="inv-popup-btn">Confirm</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </body>
</html>
{{-- <script>
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
</script> --}}
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