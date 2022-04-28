<?php

    # date_default_timezone_get()
    date_default_timezone_set('Europe/Istanbul');   
    setlocale(LC_TIME, 'turkish');

    echo strftime('%d %B %Y, %A - %T', strtotime('-3 day'));
    
   

?>