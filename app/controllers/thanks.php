<?php

$data['pg'] = "Thanks";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$user = $this->load_model("User");
}
require views_path('thanks');
