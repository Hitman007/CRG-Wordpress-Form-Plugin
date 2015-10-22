<?php

function getUserInfoScript() {
    $output = <<<OUTPUT
     <script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
        <script>
        jQuery('document').ready(function() {
            jQuery('input.bill_info').click(function() {
                var div = jQuery(this).attr('id');
            	jQuery('div#' + div).slideDown();
            	jQuery('div#' + div).html("<form>Next Billing Date: <input type = 'text' name = 'next-billing-date' > Treatments Remaining: <input type = 'text' name = 'treatments-remaining' size = '2' /> <input type = 'submit' value = 'UPDATE' name = 'recurring-billinging-submit' /></form>");
            	jQuery('div#' + div).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    maxDate: "+5y",
                    minDate: new Date()
                });
            });
        });
        </script>
OUTPUT;
    
    echo $output;
}





