<?php

/**
 * @Summary: Get language id from session.
 * @Author:  Fathi Hindi - 01/26/2017.
 */
function getLanguageId() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    // We need to use $CI->session instead of $this->session
    $language_id = $CI->session->userdata(SESSION_LANGUAGE_ID_KEY);
	if (empty($language_id)) {
		$language_id = LANGUAGE_ID_DEFAULT_VALUE;
	}
	return $language_id;
}

/**
 * @Summary: Get user id from session.
 * @Author:  Fathi Hindi - 01/26/2017.
 */
function getUserId() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    // We need to use $CI->session instead of $this->session
    $user_id = $CI->session->userdata(SESSION_USER_ID_KEY);
	return $user_id;
}

/**
 * @Summary: Check if the current user is logged in or not.
 * @Author:  Fathi Hindi - 02/07/2017.
 */
function isLoggedIn() {
    $isLoggedIn = false;
	$CI = & get_instance();
    $user_id = $CI->session->userdata(SESSION_USER_ID_KEY);
	if (isset($user_id) && $user_id > 0) {
		$isLoggedIn = true;
	}
	return $isLoggedIn;
}
