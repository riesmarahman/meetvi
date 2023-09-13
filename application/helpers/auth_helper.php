<?php

function is_pimpinan($userdata) {
    if ($userdata['peran'] == "1") {
        return true;
    } else {
        return false;
    }
}

function is_sekretaris($userdata) {
    if ($userdata['peran'] == "2") {
        return true;
    } else {
        return FALSE;
    }
}

function is_peserta($userdata) {
    if ($userdata['peran'] == "3") {
        return true;
    } else {
        return FALSE;
    }
}

function is_notulis($userdata) {
    if ($userdata['peran'] == "4") {
        return true;
    } else {
        return FALSE;
    }

}