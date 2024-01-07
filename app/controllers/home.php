<?php



defined("ABSPATH") ? "" : die();


if (Auth::access('user')) {
	require views_path('home');
} else {
	// Baguhin ang sumusunod na bahagi base sa role ng user
	if (Auth::access('admin')) {
		redirect('admin');
	} else {
		redirect('login');
	}
}
