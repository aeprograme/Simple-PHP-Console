<?php

/**
 * Project : Simple Console
 * File : Style.php
 * Description : Console style
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */
?>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

html,
body {
height: 100%;
background-color: <?= APP->config()['background'] ?>;
color: <?= APP->config()['text'] ?>;
font-family: <?= APP->config()['fontFamily'] ?>;
font-size: <?= APP->config()['fontSize'] ?>;
overflow: hidden;
}


#console {
display: flex;
flex-direction: column;
height: 100vh;
padding: 10px;
}


#output {
flex: 1;
overflow-y: auto;
white-space: pre-wrap;
padding-right: 4px;
margin-bottom: 10px;
}


#output::-webkit-scrollbar {
width: 6px;
}

#output::-webkit-scrollbar-track {
background: <?= APP->config()['background'] ?>;
}

#output::-webkit-scrollbar-thumb {
background-color: <?= APP->config()['scrollbar'] ?>;
border-radius: 3px;
}


#output {
scrollbar-width: thin;
scrollbar-color: <?= APP->config()['scrollbar'] ?> <?= APP->config()['background'] ?>;
}


#input {
padding: 10px;
background:
<? APP->config()['background'] ?>;
color: #111;
border: 1px solid #111;
outline: none;
font-family: inherit;
border-radius:10px;
}

.log {
width:100%;
}

.error {
color: #df1515;
}

.cmd {
color:#d1cece;
}
