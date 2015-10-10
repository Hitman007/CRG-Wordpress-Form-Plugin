<?php

namespace CustomRayGuns;

//This function is run when the user submits the POST variable ['crg-info-form']
function getFormSubmissionVariablesFromHTMLRequest(){
	$listOfPostFieldNames = array();
	
	foreach (array_keys($_POST) as $fieldName){
		$listOfPostFieldNames[$fieldName] = $_POST[$fieldName];
	}
	$user_id = get_current_user_id();
	if ($user_id == 0){
    		die( 'You are currently not logged in. getFormSubmissionVariablesFromHTMLRequest.php 14');
		 }else{
		 if(isset($_GET['user'])) {
		    if (current_user_can('administrator')) {
		      $user_id = $_GET['user'];
		    } else {
		      die('Not admin.');
		    }
		  } else {
		    $user_id = get_current_user_id();
		  }
		$listOfPostFieldNames['UserID'] = $user_id;
	}
	return $listOfPostFieldNames;
}
