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
 * @Summary: Get user type.
 * @Author:  Fathi Hindi - 03/02/2017.
 */
function getUserType() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    $user_type= $CI->session->userdata(SESSION_USER_TYPE_KEY);
	return $user_type;
}

/**
 * @Summary: Check if the current user is logged in or not.
 * @Author:  Fathi Hindi - 02/07/2017.
 */
function isLoggedIn() {
    $isLoggedIn = false;
	if (getUserId() != null && getUserId() > 0 && getUserType() != null && getUserType() != USER_TYPE_GUEST) {
		$isLoggedIn = true;
	}
	return $isLoggedIn;
}

/**
 * @Summary: Check if the is genetic user.
 * @Author:  Fathi Hindi - 02/28/2017.
 */
function isGenericUser() {
    $isGenericUser = false;
	
	if (getUserId() == null || getUserId() <= 0) {
		$isGenericUser = true;
	}
	return $isGenericUser;
}

/**
 * @Summary: Get user first name from session.
 * @Author:  Fathi Hindi - 02/28/2017.
 */
function getUserFirstName() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    $user_first_name= $CI->session->userdata(SESSION_USER_FIRST_NAME_KEY);
	return $user_first_name;
}

/**
 * @Summary: Get user last name from session.
 * @Author:  Fathi Hindi - 02/28/2017.
 */
function getUserLastName() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    $user_last_name= $CI->session->userdata(SESSION_USER_LAST_NAME_KEY);
	return $user_last_name;
}

/**
 * @Summary: Get user logon id from session.
 * @Author:  Fathi Hindi - 02/28/2017.
 */
function getUserLogonId() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    $user_logon_id= $CI->session->userdata(SESSION_USER_LOGON_ID_KEY);
	return $user_logon_id;
}

/**
 * @Summary: Get user photo.
 * @Author:  Fathi Hindi - 02/28/2017.
 */
function getUserPhoto() {
    // Get current CodeIgniter instance
    $CI = & get_instance();
    $user_photo= $CI->session->userdata(SESSION_USER_PHOTO_KEY);
	if (isset($user_photo) && $user_photo != '') {
		$user_photo = USER_PHOTO_FOLDER_PATH . $user_photo;
	} else {
		$user_photo = USER_PHOTO_FOLDER_PATH . USER_PHOTO_DEFAULT_IMG;
	}	
	return $user_photo;
}