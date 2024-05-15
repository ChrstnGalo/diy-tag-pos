<?php

$tab = $_GET['tab'] ?? 'dashboard';


if ($tab == "products") {

	$productClass = new Product();
	$products = $productClass->query("select * from products order by id desc");
} else
if ($tab == "sales") {

	$section = $_GET['s'] ?? 'table';
	$startdate = $_GET['start'] ?? null;
	$enddate = $_GET['end'] ?? null;


	$saleClass = new Sale();

	$limit = $_GET['limit'] ?? 20;
	$limit = (int)$limit;
	$limit = $limit < 1 ? 10 : $limit;

	$pager = new Pager($limit);
	$offset = $pager->offset;

	$query = "select * from sales order by id desc limit $limit offset $offset";

	//get today's sales total
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	$query_total = "SELECT sum(total) as total FROM sales WHERE day(date) = $day && month(date) = $month && year(date) = $year";


	//if both start and end are set
	if ($startdate && $enddate) {

		$query = "select * from sales where date BETWEEN '$startdate' AND '$enddate' order by id desc limit $limit offset $offset";
		$query_total = "select sum(total) as total from sales where date BETWEEN '$startdate' AND '$enddate'";
	} else

		//if only start date is set
		if ($startdate && !$enddate) {
			$styear = date("Y", strtotime($startdate));
			$stmonth = date("m", strtotime($startdate));
			$stday = date("d", strtotime($startdate));

			$query = "select * from sales where date = '$startdate' order by id desc limit $limit offset $offset";
			$query_total = "select sum(total) as total from sales where date = '$startdate' ";
		}


	$sales = $saleClass->query($query);

	$st = $saleClass->query($query_total);

	$sales_total = 0;
	if ($st) {
		$sales_total = $st[0]['total'] ?? 0;
	}

	if ($section == 'graph') {
		//read graph data
		$db = new Database();

		//query todays records
		$today = date('Y-m-d');
		$query = "SELECT total,date FROM sales WHERE DATE(date) = '$today' ";
		$today_records = $db->query($query);

		//query this months records
		$thismonth = date('m');
		$thisyear = date('Y');

		$query = "SELECT total,date FROM sales WHERE month(date) = '$thismonth' && year(date) = '$thisyear'";
		$thismonth_records = $db->query($query);

		//query this years records
		$query = "SELECT total,date FROM sales WHERE year(date) = '$thisyear'";
		$thisyear_records = $db->query($query);
	}
} else
if ($tab == "users") {

	$limit = 10;
	$pager = new Pager($limit);
	$offset = $pager->offset;

	$userClass = new User();
	$users = $userClass->query("select * from users order by id desc limit $limit offset $offset");
} else
if ($tab == "dashboard") {
	$db = new Database();

	$today = date('Y-m-d');
	$query = "SELECT sum(total) as daily_sales FROM sales WHERE DATE(date) = '$today'";
	$today_sales = $db->query($query);
	$daily_sales = $today_sales[0]['daily_sales'] ?? 0;

	$db = new Database();
	$query = "SELECT amount, barcode, qty, user_id, description FROM sales ORDER BY id DESC LIMIT 10"; // Adjust the query as needed
	$recent_sales = $db->query($query);
	$db = new Database();
	$query = "select count(id) as total from users";

	$myusers = $db->query($query);
	$total_users = $myusers[0]['total'];

	$query = "select count(id) as total from products";

	$myproducts = $db->query($query);
	$total_products = $myproducts[0]['total'];

	$query = "select sum(total) as total from sales";

	$mysales = $db->query($query);
	$total_sales = $mysales[0]['total'];

	// Retrieve today's sales
	$today = date('Y-m-d');
	$query = "SELECT sum(total) as daily_sales FROM sales WHERE DATE(date) = '$today'";
	$today_sales = $db->query($query);
	$daily_sales = $today_sales[0]['daily_sales'] ?? 0;

	// Retrieve today's records
	$query_today_records = "SELECT total,date FROM sales WHERE DATE(date) = '$today' ";
	$today_records = $db->query($query_today_records);

	$thismonth = date('m');
	$thisyear = date('Y');
	$query_thismonth_records = "SELECT total,date FROM sales WHERE month(date) = '$thismonth' && year(date) = '$thisyear'";
	$thismonth_records = $db->query($query_thismonth_records);
} else
if ($tab == "category") {

	$categoryClass = new Category();
	$categories = $categoryClass->query("select * from category order by id asc");
} else
if ($tab == "announcement") {
	$announcementModel = new Announcement();
	$announcements = $announcementModel->query("SELECT * FROM announcement ORDER BY id DESC");
}



if (Auth::access('supervisor')) {
	require views_path('admin/admin');
} else {
	require views_path('home');
}
