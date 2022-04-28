<?php

    //strtotime()


    $unix = strtotime('+8 day', time());

    echo date('Y-m-d H:i:s', $unix);




?>