        <?php require views_path('partials/header'); ?>
        <style>
            /* POPPINS FONT */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

            * {
                font-family: 'Poppins', sans serif;
            }

            body {
                background-image: url("assets/images/background1.gif");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
            }

            section {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                min-height: 100vh;

            }

            .form-box {
                position: relative;
                width: 507px;
                height: 580px;
                background: transparent;
                border: 2px solid rgba(255, 255, 255, 0.5);
                border-radius: 20px;
                backdrop-filter: blur(7px);
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .container {
                width: 500px;
                display: flex;
                flex-direction: column;
                padding: 0 15px 300px 15px;
                text-align: center;
                margin-top: 40px;
                /* Center align text within the container */
            }


            .button-box {
                width: 450px;
                margin: 15px auto 35px auto;
                /* Updated margin property */
                position: relative;
                box-shadow: 0 0 5px 3px #CCCCCC;
                border-radius: 30px;
            }

            .toggle-btn {
                padding: 10px 30px;
                cursor: pointer;
                background: transparent;
                border: 0;
                outline: none;
                position: relative;
                color: #fff;
            }

            #btn {
                top: 0;
                left: 0;
                position: absolute;
                width: 220px;
                height: 100%;
                background: linear-gradient(to right, #ff105f, #ffad06);
                border-radius: 30px;
                transition: .10s;
            }

            .input-group {

                position: absolute;
                width: 280px;
                transition: .5s;
                margin-top: 190px;
                margin-left: 15px;
            }


            .input-group small.text-danger {
                position: absolute;
                bottom: -20px;
                /* Adjust the bottom value as needed */
                width: 100%;
                /* Make sure it spans the entire width */
                text-align: center;
                /* Center the error text if needed */
                color: #8B0000;
                /* Adjust the color as needed */
            }

            header {
                color: #fff;
                font-size: 35px;
                justify-content: center;

            }


            .diy-tag {
                color: #fff;

            }


            #rfid {
                width: 465px;
                left: 50px;
            }

            #unique_num {
                width: 465px;
                left: 50px;
            }

            #scanner {
                position: absolute;
                margin-top: 60px;
                height: 200px;
                margin-left: -390px;
            }

            #keypad {
                display: none;
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: transparent;
                padding: 10px;
                border-top: 1px solid #ccc;
                color: white;

            }

            .key {
                display: inline-block;
                width: 60px;
                height: 50px;
                margin: 5px;
                background-color: #222327;
                cursor: pointer;
                text-align: center;
                line-height: 30px;
                border-radius: 5px;
            }
        </style>

        <section>
            <div class="form-box">
                <div class="container">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="rfid()">RFID Login</button>
                        <button type="button" class="toggle-btn" onclick="unique_num()">QR Login</button>
                    </div>

                    <center>
                        <div class="diy-tag">
                            <header id="loginHeader">RFID Login</header><?= esc(APP_NAME) ?>
                        </div>
                    </center>
                    <br>
                    <form id="rfid" method="post" class="input-group">
                        <input style="text-align: center;" autocomplete="off" name="pin_number_rfid" type="password" class="form-control <?= !empty($errors['rfid']) ? 'border-danger' : '' ?>" placeholder="Enter PIN" onclick="toggleKeypad()" autofocus>
                        <input style="text-align: center;" autocomplete="off" name="rfid" type="text" class="form-control my-2 w-100 py-2 <?= !empty($errors['rfid']) ? 'border-danger' : '' ?>" placeholder="Enter RFID" autofocus>
                        <?php if (!empty($errors['rfid'])) : ?>
                            <small class="text-danger"><?= $errors['rfid'] ?></small>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark my-2 w-100 py-2">Enter</button>
                    </form>
                    <form id="unique_num" method="post" class="input-group">
                        <input style="text-align: center;" autocomplete="off" name="pin_number_qr" type="password" class="form-control <?= !empty($errors['unique_num']) ? 'border-danger' : '' ?>" placeholder="Enter PIN" onclick="toggleKeypad()" autofocus>
                        <input id="num" style="text-align: center;" autocomplete="off" readonly name="unique_num" class="form-control my-2 w-100 py-2 <?= !empty($errors['unique_num']) ? 'border-danger' : '' ?>" placeholder="Scan QR" autofocus>
                        <?php if (!empty($errors['unique_num'])) : ?>
                            <small class="text-danger"><?= $errors['unique_num'] ?></small>
                        <?php endif; ?>
                        <div><video id="scanner" autoplay></video></div>
                        <button type="submit" class="btn btn-dark my-2 w-100 py-2">Enter</button>
                    </form>

                    <div id="keypad">
                        <div class="key" onclick="appendPin('1')">1</div>
                        <div class="key" onclick="appendPin('2')">2</div>
                        <div class="key" onclick="appendPin('3')">3</div>
                        <div class="key" onclick="appendPin('4')">4</div>
                        <div class="key" onclick="appendPin('5')">5</div>
                        <div class="key" onclick="appendPin('6')">6</div>
                        <div class="key" onclick="appendPin('7')">7</div>
                        <div class="key" onclick="appendPin('8')">8</div>
                        <div class="key" onclick="appendPin('9')">9</div>
                        <div class="key" onclick="appendPin('0')">0</div>
                        <div class="key" onclick="clearPin()">C</div>

                    </div>
                </div>
            </div>
        </section>

        <script>
            var pinRFID = document.querySelector('input[name="pin_number_rfid"]');
            var pinQR = document.querySelector('input[name="pin_number_qr"]');
            var keypad = document.getElementById('keypad');

            function toggleKeypad() {
                keypad.style.display = (keypad.style.display === 'none') ? 'block' : 'none';
            }

            function appendPin(value) {
                pinRFID.value += value;
                pinQR.value += value;
            }

            function clearPin() {
                pinRFID.value = pinRFID.value.slice(0, -1);
                pinQR.value = pinQR.value.slice(0, -1);
            }

            var x = document.getElementById("rfid");
            var y = document.getElementById("unique_num");
            var z = document.getElementById("btn");
            var loginHeader = document.getElementById("loginHeader");

            var selectedForm = localStorage.getItem('selectedForm');

            // Set the initial form based on the stored preference or default to RFID
            if (selectedForm === 'unique_num') {
                unique_num(); // Show QR form
            } else {
                rfid(); // Show RFID form
            }

            function unique_num() {
                x.style.left = "-500px";
                y.style.left = "0px"
                z.style.left = "230px"
                loginHeader.innerText = "QR Login";

                // Store the selected form in localStorage
                localStorage.setItem('selectedForm', 'unique_num');
            }

            function rfid() {
                x.style.left = "0px";
                y.style.left = "490px"
                z.style.left = "0"
                loginHeader.innerText = "RFID Login";

                // Store the selected form in localStorage
                localStorage.setItem('selectedForm', 'rfid');
            }

            // Add an event listener to listen for RFID card tap event
            document.addEventListener("rfidTapped", function(event) {
                var rfidValue = event.detail;
                autoLogin(rfidValue);
            });

            // Function to automatically log in with RFID value
            function autoLogin(rfidValue) {
                // Make an AJAX request to your server with the RFID value
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.success) {
                            // Instead of redirecting, trigger the form submission manually
                            document.getElementById('rfid').submit();
                        }
                    }
                };
                xhttp.open("POST", "login.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("rfid=" + rfidValue);
            }

            const videoElement = document.getElementById('scanner');
            const scanner = new Instascan.Scanner({
                video: videoElement
            });

            scanner.addListener('scan', function(content) {
                document.getElementById('num').value = content;

                // Call the login function with the scanned content
                handleQRLogin(content);
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(error) {
                console.error(error);
            });

            // Function to handle QR code login
            function handleQRLogin(qrContent) {
                // Perform your login logic here with qrContent
                // For example, you can send an AJAX request to the server for authentication

                // After successful login, you can submit the form
            }
        </script>

        <?php require views_path('partials/footer'); ?>