<?php

function inputFields($placeholder,$name,$value,$type){
    $ele="
    <div>
        <input type='$type' name='$name' placeholder='$placeholder' class=\"form-control\" value='$value' autocomplete=\"off\">
    </div>
    ";
    echo $ele;
}

?>