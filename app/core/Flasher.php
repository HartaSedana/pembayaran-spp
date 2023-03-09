<?php

class Flasher {

    public static function setFlash($tipe ,$pesan,  $aksi){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash() {
        if( isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'].' alert-dismissable fade show" role="alert">
                <strong>' . $_SESSION['flash']['pesan'].' ' . $_SESSION['flash']['aksi'].'!</strong> 
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            unset($_SESSION['flash']);
        }

    }
}
?>

