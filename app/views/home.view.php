<?php require views_path('partials/header'); ?>
<style>


</style>
<div class="d-flex">
	<div style="min-height:600px;" class="shadow-sm col-8 p-4">

		<div></div>

		<div class="input-group mb-3 ">
			<input onkeyup="check_for_enter_key(event)" oninput="search_item(event)" type="text" class="ms-2 p-2 form-control js-search" placeholder="Enter Barcode" aria-label="Search" aria-describedby="basic-addon1" autofocus>
			<span class="input-group-text " id="basic-addon1"><i class="fa-solid fa-barcode"></i></i></span>
		</div>
		<center>
			<button class="category-list" type="button" onclick="search_item(event, 'Canned Goods')">
				<i class="fa-solid fa-box-archive"></i>Canned Goods
			</button>
			<button class="category-list" type="button" onclick="search_item(event, 'Condiments & Spices')">
				<i class="fa-solid fa-mortar-pestle"></i>Condiments & Spices
			</button>
			<button class="category-list" type="button" onclick="search_item(event, 'Dairy')">
				<i class="fa-solid fa-cow"></i>Dairy
			</button>
			<button class="category-list" type="button" onclick="search_item(event, 'Snacks')">
				<i class="fa-solid fa-cookie-bite"></i>Snacks
				<button class="category-list" type="button" onclick="search_item(event, 'Beverages')">
					<i class="fa-solid fa-wine-bottle"></i>Beverages
				</button>
				<button class="category-list" type="button" onclick="search_item(event, 'Personal Care')">
					<i class="fa-solid fa-hand-holding-medical"></i>Personal Care
				</button>

		</center>
		<div onclick="add_item(event)" class="js-products d-flex text-muted" style="flex-wrap: wrap;height: 90%;overflow-y: scroll;">


		</div>
	</div>

	<div class="col-4 bg-light p-4 pt-2 text-black">

		<div>
			<center>
				<h3>Cart <div class="js-item-count badge rounded-circle">0</div>
				</h3>
			</center>
		</div>

		<div class="table-responsive" style="height:500px;overflow-y: scroll;">
			<table class="table table-striped table-hover">
				<tr>
					<th>Image</th>
					<th>Description</th>
					<th>Amount</th>
				</tr>

				<tbody class="js-items">


				</tbody>
			</table>
		</div>

		<div class="js-gtotal alert" style="font-size:30px;background-color:#F5CA95;">Total: ₱0.00</div>
		<div class="">
			<button onclick="show_modal('amount-paid')" class="check fw-bold my-2 w-100 py-4">Checkout</button>
			<button onclick="clear_all()" class="clear fw-bold  my-2 py-2 w-100">Clear Cart</button>
		</div>
	</div>
</div>

<!--modals-->

<!--enter amount modal-->
<div role="close-button" onclick="hide_modal(event,'amount-paid')" class="js-amount-paid-modal hide" style="animation: appear .5s ease;background-color: #000000bb; width: 100%;height: 100%;position: fixed;left:0px;top:0px;z-index: 4;">

	<div style="width:420px;min-height:250px;background-color:#EB942B;padding:10px;margin:auto;margin-top:300px; border: 2px; border-radius: 15px;">
		<h4 class="text-dark fw-bold" style="margin-left: 10px;">Select <span style="color: #335500;">Payment</span> Method</h4>
		<div>
			<div class="contain">
				<div class="radio-tile-group">

					<div class="input-contain">
						<input type="radio" id="payWithRFID" name="paymentMethod" value="rfid">
						<div class="radio-tile">
							<ion-icon name="card-outline"></ion-icon>
							<label for="payWithRFID">Pay Wih RFID</label>
						</div>
					</div>

					<div class="input-contain">
						<input type="radio" id="payWithQR" name="paymentMethod" value="qr">
						<div class="radio-tile">
							<ion-icon name="qr-code-outline"></ion-icon>
							<label for="payWithQR">Pay With QR</label>
						</div>
					</div>
				</div>
				<div class="d-grid gap-2 d-md-block">
					<button role="close-button" onclick="hide_modal(event,'amount-paid')" class="checkout-cancel">Cancel</button>
					<button onclick="handlePaymentMethodSelection()" class="checkout-next">Next</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!--end enter amount modal-->


<!--enter rfid-paid modal-->
<div role="close-button" onclick="hide_modal(event,'rfid-paid')" class="js-rfid-paid-modal hide" style="animation: appear .5s ease;background-color: #000000bb; width: 100%;height: 100%;position: fixed;left:0px;top:0px;z-index: 4;">

	<section class="buo" style="background-color: transparent;">
		<div class="lagayan">
			<div class="cards front-face" style="background:url(assets/images/atm.jpg); background-size: cover; color:black;">
				<header>
					<span class="logo">
						<img src="assets/images/image.png" alt="" />
						<h5>Pay With RFID</h5>
					</span>
					<img src="assets/images/chip.png" alt="" class="chip" />
				</header>

				<div class="card-details">
					<div class="name-number fw-bold">
						<h6>RFID Number</h6>
						<input style="text-align: center; margin-bottom:15px; width:100%; color:white; background:transparent;" autocomplete="off" name="rfid" class="form-control <?= !empty($errors['rfid']) ? 'border-danger' : '' ?>" placeholder="Tap the RFID" autofocus>
						<h5 class="name"><?= auth('username') ?></h5>
					</div>

					<div class="valid-date">
						<h6>Date Created</h6>
						<h5><?= auth('date') ?></h5>
					</div>
				</div>
				<div class="rfid-button d-grid gap-2 d-md-block">
					<button role="close-button" onclick="hide_modal(event,'rfid-paid')" class="checkout-rfid">Cancel</button>
					<button onclick=validate_amount_paid(event) class="checkout-next">Next</button>
				</div>
			</div>

	</section>
</div>

<!--end enter rfid-paid modal-->

<!--enter qr-paid modal-->
<div role="close-button" onclick="hide_modal(event,'qr-paid')" class="js-qr-paid-modal hide" style="animation: appear .5s ease;background-color: #000000bb; width: 100%;height: 100%;position: fixed;left:0px;top:0px;z-index: 4;">

	<div style="width:500px;min-height:200px;background-color:#EB942B;padding:10px;margin:auto;margin-top:100px;border: 2px; border-radius: 15px;">
		<h4 class="fw-bold" style="color:#335500;">Pay with QR<button role="close-button" onclick="hide_modal(event,'qr-paid')" class="btn btn-danger float-end p-0 px-2">X</button></h4>
		<input id="num" style="text-align: center;" autocomplete="off" readonly name="unique_num" class="form-control <?= !empty($errors['unique_num']) ? 'border-danger' : '' ?>" placeholder="Scan the QR Code" autofocus>
		<?php if (!empty($errors['unique_num'])) : ?>
			<small class="text-danger"><?= $errors['unique_num'] ?></small>
		<?php endif; ?>
		<div>
			<center><video id="scanner" autoplay style="height: 300px;width:400px"></video></center>
		</div>

		<div class="d-grid gap-2 d-md-block">
			<button role="close-button" onclick="hide_modal(event,'qr-paid')" class="checkout-qr">Cancel</button>
			<button onclick=validate_amount_paid(event) class="checkout-next">Next</button>
		</div>
	</div>
</div>

<!--end enter qr-paid modal-->

<!--change modal-->
<div role="close-button" onclick="hide_modal(event,'change')" class="js-change-modal hide" style="animation: appear .5s ease;background-color: #000000bb; width: 100%;height: 100%;position: fixed;left:0px;top:0px;z-index: 4;">

	<div class="text-black" style="width:500px;min-height:200px;background-color:white;padding:10px;margin:auto;margin-top:100px">
		<h4>New Balance:</button></h4>
		<br>
		<div class="js-change-input form-control text-center" style="font-size:60px">0.00</div>
		<br>
		<center><button role="close-button" onclick="hide_modal(event,'change')" class="js-btn-close-change btn btn-lg btn-secondary">Continue</button></center>
	</div>
</div>
<!--end change modal-->


<!--end modals-->
<script>
	var PRODUCTS = [];
	var ITEMS = [];
	var BARCODE = false;
	var GTOTAL = 0;
	var CHANGE = 0;
	var RECEIPT_WINDOW = null;

	var main_input = document.querySelector(".js-search");

	function search_item(e, category) {
		var text = e.target.value.trim();
		var data = {};
		data.data_type = "search";
		data.text = text;
		data.category = category; // Pass the selected category to the server
		send_data(data);
	}



	function send_data(data) {
		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function(e) {
			if (ajax.readyState == 4) {
				if (ajax.status == 200) {
					handle_result(ajax.responseText);
				} else {
					console.log("An error occurred. Err Code:" + ajax.status + " Err message:" + ajax.statusText);
					console.log(ajax);
				}

				// Clear main input if enter was pressed
				if (BARCODE) {
					main_input.value = "";
					main_input.focus();
				}

				BARCODE = false;
			}
		});

		ajax.open('post', 'index.php?pg=ajax', true);
		ajax.send(JSON.stringify(data));
	}

	function handle_result(result) {
		var obj = JSON.parse(result);

		if (typeof obj != "undefined") {
			// Valid JSON
			if (obj.data_type == "search") {
				var mydiv = document.querySelector(".js-products");
				mydiv.innerHTML = "";
				PRODUCTS = [];

				if (obj.data != "") {
					PRODUCTS = obj.data;

					for (var i = 0; i < obj.data.length; i++) {
						mydiv.innerHTML += product_html(obj.data[i], i);
					}

					if (BARCODE && PRODUCTS.length == 1) {
						add_item_from_index(0);
					} else if (BARCODE && PRODUCTS.length == 0) {
						alert("That item was not found");
					}
				}
			}
		}
	}

	function product_html(data, index) {
		// Calculate the final price based on discount
		const finalPrice = data.discount > 0 ? data.discounted_price : data.amount;

		// Determine the color based on whether there is a discount or not
		const priceColor = data.discount > 0 ? 'red' : 'black';

		// Generate a label indicating the discount (if applicable)
		const discountLabel = data.discount > 0 ? `<div style="font-size:14px; color: red;">Discount: ₱${data.discount} Off</div>` : '';

		// Generate the original price with strikethrough if there is a discount
		const originalPriceHTML = data.discount > 0 ? `<div style="text-decoration: line-through; color: ${priceColor};">₱${data.amount}</div>` : '';

		return `
        <!--card-->
        <div class="card m-2 border-0 mx-auto" style="min-width: 190px;max-width: 190px; height:310px">
            <a href="#">
                <img index="${index}" src="${data.image}" class="w-100 rounded border">
            </a>
            <div class="p-2">
                ${originalPriceHTML}
                <div style="font-size:20px; color: ${priceColor};"> ₱${finalPrice}</div>
                <div class="text-muted">${data.description}</div>
                ${discountLabel}
            </div>
        </div>
        <!--end card-->
    `;
	}

	function item_html(data, index) {
		// Calculate the final price based on discount
		const finalPrice = data.discount > 0 ? data.discounted_price : data.amount;

		return `
        <!--item-->
        <tr>
            <td style="width:110px"><img src="${data.image}" class="rounded border" style="width:100px;height:100px"></td>
            <td class="text-primary">
                ${data.description}

                <div class="input-group my-3" style="max-width:150px">
                    <span index="${index}" onclick="change_qty('down',event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
                    <input index="${index}" onblur="change_qty('input',event)" type="text" class="form-control text-primary" placeholder="1" value="${data.qty}" >
                    <span index="${index}" onclick="change_qty('up',event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
                </div>

            </td>
            <td style="font-size:20px">
                <b>₱${finalPrice}</b>
                <button onclick="clear_item(${index})" class="float-end btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <!--end item-->
    `;
	}


	var TOTAL_ITEMS_LIMIT = 10; // Maximum total items limit

	function add_item_from_index(index) {
		var totalItems = calculate_total_items();

		if (totalItems >= TOTAL_ITEMS_LIMIT) {
			alert("You have reached the maximum 10 total items to purchase.");
			return;
		}

		// Check if item exists
		for (var i = ITEMS.length - 1; i >= 0; i--) {
			if (ITEMS[i].id == PRODUCTS[index].id) {
				if (ITEMS[i].qty >= 10) {
					alert("You have reached the maximum 10 limit for this item.");
					return;
				}
				ITEMS[i].qty += 1;
				refresh_items_display();
				return;
			}
		}

		var temp = PRODUCTS[index];
		temp.qty = 1;

		if (totalItems + 1 > TOTAL_ITEMS_LIMIT) {
			alert("You have reached the maximum 10 total items to purchase.");
			return;
		}

		ITEMS.push(temp);
		refresh_items_display();
	}

	function calculate_total_items() {
		var totalItems = 0;

		for (var i = ITEMS.length - 1; i >= 0; i--) {
			totalItems += ITEMS[i].qty;
		}

		return totalItems;
	}

	function add_item(e) {

		if (e.target.tagName == "IMG") {
			var index = e.target.getAttribute("index");

			add_item_from_index(index);
		}
	}

	function refresh_items_display() {
		var item_count = document.querySelector(".js-item-count");
		item_count.innerHTML = ITEMS.length;

		var items_div = document.querySelector(".js-items");
		items_div.innerHTML = "";
		var grand_total = 0;

		for (var i = ITEMS.length - 1; i >= 0; i--) {
			items_div.innerHTML += item_html(ITEMS[i], i);
			grand_total += (ITEMS[i].qty * (ITEMS[i].discount > 0 ? ITEMS[i].discounted_price : ITEMS[i].amount));
		}

		var gtotal_div = document.querySelector(".js-gtotal");
		gtotal_div.innerHTML = "Total: ₱" + grand_total.toFixed(2);
		GTOTAL = grand_total;
	}

	function clear_all() {
		if (!confirm("Are you sure you want to clear all items in the list??!!"))
			return;

		// Clear local items
		ITEMS = [];
		refresh_items_display();
	}

	function clear_item(index) {

		if (!confirm("Remove item??!!"))
			return;

		ITEMS.splice(index, 1);
		refresh_items_display();

	}

	function change_qty(direction, e) {

		var index = e.currentTarget.getAttribute("index");
		if (direction == "up") {
			ITEMS[index].qty += 1;
		} else
		if (direction == "down") {
			ITEMS[index].qty -= 1;
		} else {

			ITEMS[index].qty = parseInt(e.currentTarget.value);
		}

		//make sure its not less than 1
		if (ITEMS[index].qty < 1) {
			ITEMS[index].qty = 1;
		}

		refresh_items_display();
	}

	function check_for_enter_key(e) {

		if (e.keyCode == 13) {
			BARCODE = true;
			search_item(e);
		}
	}

	function show_modal(modal) {

		if (modal == "amount-paid") {

			if (ITEMS.length == 0) {

				alert("Please add at least one item to the cart");
				return;
			}
			var mydiv = document.querySelector(".js-amount-paid-modal");
			mydiv.classList.remove("hide");

			mydiv.querySelector(".js-amount-paid-input").value = "";
			mydiv.querySelector(".js-amount-paid-input").focus();
		} else if (modal == "rfid-paid") {

			var mydiv = document.querySelector(".js-rfid-paid-modal");
			mydiv.classList.remove("hide");

			mydiv.querySelector(".js-rfid-paid-input").value = "";
			mydiv.querySelector(".js-btn-close-rfid-paid").focus();
		} else
		if (modal == "qr-paid") {

			var mydiv = document.querySelector(".js-qr-paid-modal");
			mydiv.classList.remove("hide");

			mydiv.querySelector(".js-qr-paid-input").value = "";
			mydiv.querySelector(".js-btn-close-qr-paid").focus();
		} else
		if (modal == "change") {

			var mydiv = document.querySelector(".js-change-modal");
			mydiv.classList.remove("hide");

			mydiv.querySelector(".js-change-input").innerHTML = CHANGE;
			mydiv.querySelector(".js-btn-close-change").focus();
		}


	}

	function hide_modal(e, modal) {

		if (e == true || e.target.getAttribute("role") == "close-button") {
			if (modal == "amount-paid") {
				var mydiv = document.querySelector(".js-amount-paid-modal");
				mydiv.classList.add("hide");
			} else
			if (modal == "rfid-paid") {
				var mydiv = document.querySelector(".js-rfid-paid-modal");
				mydiv.classList.add("hide");
			} else
			if (modal == "qr-paid") {
				var mydiv = document.querySelector(".js-qr-paid-modal");
				mydiv.classList.add("hide");
			} else
			if (modal == "change") {
				var mydiv = document.querySelector(".js-change-modal");
				mydiv.classList.add("hide");
				window.location.href = 'index.php?pg=thanks';
			}

		}

	}

	function handlePaymentMethodSelection() {
		var paymentMethods = document.getElementsByName("paymentMethod");
		var selectedMethod = null;

		for (var i = 0; i < paymentMethods.length; i++) {
			if (paymentMethods[i].checked) {
				selectedMethod = paymentMethods[i].value;
				break;
			}
		}

		if (!selectedMethod || (selectedMethod !== "rfid" && selectedMethod !== "qr")) {
			alert("Please select a valid payment method before proceeding.");
			return;
		}

		hide_modal(true, 'amount-paid');

		if (selectedMethod === "qr") {
			show_modal('qr-paid');
		} else if (selectedMethod === "rfid") {
			show_modal('rfid-paid');
		}
	}

	function calculate_total_quantity() {
		var totalQuantity = 0;

		for (var i = ITEMS.length - 1; i >= 0; i--) {
			totalQuantity += ITEMS[i].qty;
		}

		return totalQuantity;
	}


	function validate_amount_paid(e) {
		var userBalance = parseFloat(<?php echo Auth::get('balance'); ?>);
		var userRFID = "<?php echo Auth::get('rfid'); ?>";
		var userQR = "<?php echo Auth::get('unique_num'); ?>";


		// Check if a payment method is selected
		var paymentMethods = document.getElementsByName("paymentMethod");
		var selectedPaymentMethod = false;
		for (var i = 0; i < paymentMethods.length; i++) {
			if (paymentMethods[i].checked) {
				selectedPaymentMethod = paymentMethods[i].value;
				break;
			}
		}

		if (!selectedPaymentMethod) {
			alert("Please select a payment method before proceeding.");
			return;
		}

		var selectedMethod = getSelectedPaymentMethod();
		if (selectedMethod === "rfid") {
			var rfidInput = document.querySelector(".js-rfid-paid-modal input[name='rfid']");
			if (rfidInput.value.trim() !== userRFID) {
				alert("Invalid RFID. Please scan the correct RFID.");
				return;
			}
		} else if (selectedMethod === "qr") {
			var qrInput = document.querySelector("#num");
			if (qrInput.value.trim() !== userQR) {
				alert("Invalid QR. Please scan the correct QR.");
				return;
			}
		} {
			// Handle other payment methods if needed
		}

		if (userBalance < GTOTAL) {
			alert("Insufficient balance. Please add funds to your account.");
			return;
		}

		CHANGE = userBalance - GTOTAL;
		CHANGE = CHANGE.toFixed(2);

		hide_modal(true, 'amount-paid');
		show_modal('change');
		// remove unwanted information
		var ITEMS_NEW = [];
		for (var i = 0; i < ITEMS.length; i++) {
			var tmp = {};
			tmp.id = ITEMS[i]['id'];
			tmp.qty = ITEMS[i]['qty'];
			ITEMS_NEW.push(tmp);
		}

		// send cart data through ajax
		send_data({
			data_type: "checkout",
			text: ITEMS_NEW
		});

		// open receipt page
		print_receipt({
			company: 'DIY-TAG POS',
			amount: userBalance,
			change: CHANGE,
			gtotal: GTOTAL,
			data: ITEMS,
			totalQuantity: calculate_total_quantity()
		});

		// clear items
		ITEMS = [];
		refresh_items_display();

		// reload products
		send_data({
			data_type: "search",
			text: ""
		});
	}

	function getSelectedPaymentMethod() {
		var paymentMethods = document.getElementsByName("paymentMethod");
		for (var i = 0; i < paymentMethods.length; i++) {
			if (paymentMethods[i].checked) {
				return paymentMethods[i].value;
			}
		}
		return null;
	}

	function print_receipt(obj) {
		var totalQuantity = calculate_total_quantity();
		obj.totalQuantity = totalQuantity;

		var vars = JSON.stringify(obj);

		RECEIPT_WINDOW = window.open('index.php?pg=print&vars=' + vars, 'printpage', "width=500px;");

		setTimeout(close_receipt_window, 2000);
	}

	function close_receipt_window() {
		RECEIPT_WINDOW.close();
	}

	send_data({

		data_type: "search",
		text: ""
	});

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
		document.getElementById('unique_num').submit();
	}
</script>

<?php require views_path('partials/footer'); ?>