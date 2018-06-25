<?php 

if (@$addError != '') { echo @$addError; }

if (@$addSuccess != '') { echo @$addSuccess; }

if (!empty($inputErrors)) {
        foreach ($inputErrors as $error => $value) {
                echo "$value";
        }
}

?>