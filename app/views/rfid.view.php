<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/payrfid.css">
    <title></title>
</head>

<body>
    <section class="buo">
        <div class="lagayan">
            <div class="cards front-face">
                <header>
                    <span class="logo">
                        <img src="assets/images/image.png" alt="" />
                        <h5>Pay With RFID</h5>
                    </span>
                    <img src="assets/images/chip.png" alt="" class="chip" />
                </header>

                <div class="card-details">
                    <div class="name-number">
                        <h6>Card Number</h6>
                        <h5 class="number">8050 2030 3020 5040</h5>
                        <h5 class="name">Prem Kumar Shahi</h5>
                    </div>

                    <div class="valid-date">
                        <h6>Valid Thru</h6>
                        <h5>05/28</h5>
                    </div>
                </div>
                <div class="button-group">
                    <button role="close-button" onclick="hide_modal(event,'amount-paid')">Cancel</button>
                    <button onclick="handlePaymentMethodSelection()">Next</button>
                </div>
            </div>

    </section>
</body>

</html>