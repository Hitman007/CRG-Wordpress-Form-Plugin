<?php

function returnCustomerAreaShortcode(){
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();
        $terms = get_user_meta($user_id, "user_accept_terms_true_or_false");
        if( isset($_POST['user_accept_terms_true_or_false']) ){
            $terms_post = $_POST['user_accept_terms_true_or_false'];
            if(!empty($terms)) {
                update_post_meta($user_id, "user_accept_terms_true_or_false", $terms_post);
            } else {
                add_user_meta( $user_id, "user_accept_terms_true_or_false", $terms_post);
            }
            echo $terms_post;
        }else{
            update_post_meta($user_id, "user_accept_terms_true_or_false", $terms_post);
        }
        $terms = get_user_meta($user_id, "user_accept_terms_true_or_false");
        echo $terms[0];
        echo "<input type='hidden' name='user_accept_terms_true_or_false' value='".$terms[0]."'>";
        $shortcodeOutput = <<<shortcodeOutput
<h2>Please review the following:</h2>
<ul>
<li>
<a href = "/info-sheet/">Information Form</a>
</li><li>
<a href = "/hipaa">HIPAA Form</a>
</li><li>
<a href = "/tac">Terms and Conditions</a><br />
<form id="terms_and_conds" action="" method="post">
<input id="tac_check" type = "checkbox" name = "user_accept_terms_true_or_false" /> I accept the Term and Conditions
</form>
</li>
</ul>
<script>
jQuery(document).ready(function(){
    jQuery("#terms_and_conds").on("change", "input:checkbox", function(){
        jQuery("#terms_and_conds").submit();
        var val = jQuery("#tac_check").val();
        alert(val);
    });
});
</script>
shortcodeOutput;
        return $shortcodeOutput;
     }else{ //User is not logged in:
       return;
     }
}
