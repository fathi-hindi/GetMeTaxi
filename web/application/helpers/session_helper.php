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
	return '1016';
}
