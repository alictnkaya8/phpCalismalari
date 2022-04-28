<?php

    $sifre = 'tayfun123';
    $md5sifre = md5($sifre);
    //386e81cd741ffb732268ce05983f3bd0 == 'tayfun123'
    /*
    if(md5($sifre) == $md5sifre){
        echo 'şifre doğru!';
    }
    */

    //echo password_hash($sifre, PASSWORD_DEFAULT);
    
    //$2y$10$72QM7OwAW8Z/q5mTXjUiUutFQ1xw4q5S1d1fIu8eoxTJWWhmbfdbC
    //$2y$10$nkhCAwXTgY9bMKrhwC/FO.GAwSbGUBBR5awzdLDr3xaSYMauZiN.u
    //$2y$10$yFuMKuzgEOF0SXpgQ6pg4eFEzCi0sEeTTEiebID.ycDWGsOHn9.DG

    $hash = '$2y$10$yFuMKuzgEOF0SXpgQ6pg4eFEzCi0sEeTTEiebID.ycDWGsOHn9.DG';

    if(password_verify($sifre, $hash)){
        echo 'şifre doğru!';
    }

?>