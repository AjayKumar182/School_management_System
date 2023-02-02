<?php

    session_start();
    session_unset();
    session_destroy();

    echo '<script> type="text/JavaScript">';
    echo 'alert("LOGOUT");';
    echo 'window.location.href="home.html";';
    echo '</script>' ;
    ?>