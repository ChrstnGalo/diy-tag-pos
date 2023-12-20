<?php



defined("ABSPATH") ? "" : die();

if (Auth::access('user')) {
	require views_path('home');
} else {

	redirect('login');
}
