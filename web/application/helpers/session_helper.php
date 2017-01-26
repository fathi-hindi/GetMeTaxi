<?php

/**
 * @Summary: Get language id from session.
 * @Author:  Fathi Hindi - 01/26/2017.
 */
function getLanguageId() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    // We need to use $CI->session instead of $this->session
    $language_id = $this->session->userdata(SESSION_LANGUAGE_ID_KEY);
	if (empty($language_id)) {
		$language_id = LANGUAGE_ID_DEFAULT_VALUE;
	}
	return $language_id;
}
