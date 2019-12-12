<?php
if(isset($_POST['data'])){
    doit();
}
function doit(){
    echo "message received.";
    exit;
}

?>