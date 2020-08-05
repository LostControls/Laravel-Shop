<?php
function testHelper() {
	return "OK!";
}

function routeClass() {
	return str_replace('.', '-', Route::currentRouteName());
}