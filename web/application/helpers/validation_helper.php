<?php

/**
 * @Summary: validate email address.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidEmail($email) {
	$valid = true;
	if ($email == "") {
		$valid = false;
	}
	return $valid;
}

/**
 * @Summary: validate logon id.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidlogonId($logonId) {
	$valid = true;
	if ($logonId == null || $logonId == "") {
		$valid = false;
	}
	return $valid;
}

/**
 * @Summary: validate first name.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidFirstName($first_name) {
	$valid = true;
	if ($first_name == null || $first_name == "") {
		$valid = false;
	}
	return $valid;
}

/**
 * @Summary: validate last name.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidLastName($last_name) {
	$valid = true;
	if ($last_name == null || $last_name == "") {
		$valid = false;
	}
	return $valid;
}

/**
 * @Summary: validate phone number.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidPhone($phone) {
	$valid = true;
	if ($phone == null || $phone == "") {
		$valid = false;
	}
	return $valid;
}

/**
 * @Summary: validate password.
 * @Author:  Fathi Hindi - 01/27/2017.
 */
function isValidPassword($password) {
	$valid = true;
	if ($password == null || $password == "") {
		$valid = false;
	}
	return $valid;
}