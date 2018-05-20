<?php
header("Content-type: text/css");
?>

body{
    font-family: 'EB Garamond', serif;
}

hr.star-light,
hr.star-primary {
    margin: 25px auto 30px;
    padding: 0;
    max-width: 250px;
    border: 0;
    border-top: solid 5px;
    text-align: center;
}
hr.star-light:after,
hr.star-primary:after {
    display: inline-block;
    position: relative;
    top: -.8em;
    padding: 0 .25em;
    font-family: FontAwesome;
    font-size: 2em;
}
hr.star-light {
    border-color: #fff;
}
hr.star-light:after {
    color: #fff;
    background-color: #18bc9c;
}
hr.star-primary {
    border-color: white;
}
hr.star-primary:after {
    color: white;
    background-color: #fff;
}
