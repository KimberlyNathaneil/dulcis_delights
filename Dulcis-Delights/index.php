<?php
    $conn = mysqli_connect("localhost", "root", "", "dulcis_delights");

    $result = mysqli_query($conn, "SELECT * FROM expenses");

?>

<html>
    <head>
        <title>Dulcis Delights</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Dulcis Delights </title>
        <link rel="icon" type="image/x-icon" href="assets/logo.jpg">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar" id="navbar">
            <div class="header">
                <div class="flex-container flex-row">
                    <a class="header-link" href="index.php">Home</a>
                    <a class="header-link" href="record.php">Record</a>
                    <a class="header-link" href="ledger.html">Ledger</a>
                    <!-- <a class="header-link" href="login.html">
                        <img class="account-logo" src="assets/account-logo.png"> -->
                    </a>
                </div>
            </div>  
        </div>  

        <section class="home" id="home">
        <div style="display: flex; gap: 128px; justify-content: end; margin-right: 4rem;">
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; text-align: center; margin-top: 50px; ">
                <h2 style="color: white">Month Expenses</h2>
                <h2 style="color: white"> Rp 16.000 </h2>
            </div>
    
            <div style="background-color: #427D9D; border-radius: 16px; padding: 12px; font-size: 16px; color: white; text-align: center; margin-top: 50px; ">
                <h2 style="color: white">Month Income</h2>
                <h2 style="color: white"> Rp 11.000 </h2>
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

            <div style="display: flex; gap: 32px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                    <h2 style="color: white"> 1-1-2024 </h2>
                </div>
                <div style="display: flex; gap: 8rem;">
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                        <h2 style="color: white"> + Rp 0 </h2>
                    </div>
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; margin-right: 5.6rem">
                        <h2 style="color: white"> - Rp 11.000 </h2>
                    </div>
                </div>
            </div>
            <div style="background-color: #164863; border-radius: 100px; padding: 20px; margin-top: 20px; margin-left: 2rem; margin-right: 2rem; ">
                <div style="display: flex; gap: 64px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                    <div style="display: flex; flex: 1; gap: 64px;">
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> Tepung</h2>                        
                        </div>
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> Pembelian di Alfamart </h2>
                        </div>
                    </div>
                    <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; flex: 1; display: flex; justify-content: space-around">
                        <!-- <h2> (-) xxx.xxx </h2> -->
                        <h2></h2>
                        <h2> - Rp 11.000 </h2>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 32px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                    <h2 style="color: white"> 2-1-2024 </h2>
                </div>
                <div style="display: flex; gap: 8rem;">
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                        <h2 style="color: white"> + Rp 0 </h2>
                    </div>
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; margin-right: 5.6rem">
                        <h2 style="color: white"> - Rp 5.000 </h2>
                    </div>
                </div>
            </div>
            <div style="background-color: #164863; border-radius: 100px; padding: 20px; margin-top: 20px; margin-left: 2rem; margin-right: 2rem; ">
                <div style="display: flex; gap: 64px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                    <div style="display: flex; flex: 1; gap: 64px;">
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> Tepung Maizena</h2>
                        </div>
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> Pembelian di Alfamart </h2>
                        </div>
                    </div>
                    <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; flex: 1; display: flex; justify-content: space-around">
                        <!-- <h2> (-) xxx.xxx </h2> -->
                        <h2></h2>
                        <h2> - Rp 5.000 </h2>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 32px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                    <h2 style="color: white"> 3-1-2024 </h2>
                </div>
                <div style="display: flex; gap: 8rem;">
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; ">
                        <h2 style="color: white"> + Rp 11.000 </h2>
                    </div>
                    <div style="background-color: #365486; border-radius: 100px; padding: 15px; font-size: 15px; color: white; text-align: center; margin-top: 20px; margin-right: 5.6rem">
                        <h2 style="color: white"> - Rp 0 </h2>
                    </div>
                </div>
            </div>
            <div style="background-color: #164863; border-radius: 100px; padding: 20px; margin-top: 20px; margin-left: 2rem; margin-right: 2rem; ">
                <div style="display: flex; gap: 64px; justify-content: end; margin-right: 4rem; justify-content: space-between; margin-left: 4rem;">
                    <div style="display: flex; flex: 1; gap: 64px;">
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> Bundling 5 Mochi </h2>
                        </div>
                        <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; ">
                            <h2> TRF </h2>
                        </div>
                    </div>
                    <div style="background-color: #FFF; width: 100%; border-radius: 100px; padding: 15px; font-size: 15px; color: black; text-align: center; margin-top: 0; flex: 1; display: flex; justify-content: space-around">
                        <h2> + Rp 11.000 </h2>
                        <h2></h2>
                        <!-- <h2> (-) xxx.xxx </h2> -->
                    </div>
                </div>
            </div>
       
        </section>
          
    </body>
</html>