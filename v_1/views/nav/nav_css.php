<?php
header("Content-type: text/css");
?>

@media(min-width:768px) {
    .navbar-fixed-top {
        padding: 25px 0;
        -webkit-transition: padding .3s;
        -moz-transition: padding .3s;
        transition: padding .3s;
    }
    .navbar-fixed-top .navbar-brand {
        font-size: 2em;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
    }
    .navbar-fixed-top.navbar-shrink {
        padding: 10px 0;
    }
    .navbar-fixed-top.navbar-shrink .navbar-brand {
        font-size: 1.5em;
    }
}
