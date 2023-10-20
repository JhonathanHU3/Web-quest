<?php

    header("Content-type:text/css");

?>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style-type: none;
    text-decoration: none;
}

body, html {
    width: 100%;
    height: 100%;
}

#maindiv {
    display: flex;
    justify-content: center;
    width: 100%;
    height: 100%;
    background-image: url(../imgs/back_image.jpg);
    background-size: cover;
}

#buttons {
    text-align: center;
    padding: 50px;
    margin-top: 50px;
    height: 600px;
    width: 600px;
    color: white;
    border-radius: 30px 5px;
    box-shadow: 7px 7px 12px black;
}

.cl {
    width: 200px;
    height: 50px;
    font-size: 22px;
}

.texto1 {
    position: relative;
    margin: 35px auto;
    width: 85%;
    margin-bottom: 85px;
    font-size: 18px;
}

.textos {
    font-size: 23px;
    font-weight: 600;
}

