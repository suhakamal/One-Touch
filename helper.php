<?php
function redirect($loc) {
    header("Location: $loc");
    die();
}