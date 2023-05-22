<?php
/**
Plugin Name: Calculator
Description: Calculates number?
Version: 1.0
Author: Kacper Kowalczyk
License: GPLv2 or later
Text Domain: calc-plugin
*/?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<style>
    #main {
        margin-top: 5%;
        padding-left: 36%;
        width: 100%;
        justify-content: center;
    }

    #calculator {
        width: 271.2px;
        display: block;
        margin-left: -3%;
    }

    #buttons input {
        width: 70px;
        height: 70px;
        box-sizing: border-box;
        margin: 0;
        text-align: center;
        margin-left: -4px;
        border: 0px;
        background-color: darkgray;
        transition: transform 0.1s ease-out;
        font-family: "Roboto";
        overflow: hidden;
        font-size: x-large;

    }

    #buttons input:hover {
        transform: scale(1.9) rotate(3000deg);
        background-color: gray;
    }

    #buttons input:active {
        background-color: white;
    }

    #buttons #numberZero {
        width: 205.5px;
        border-bottom-left-radius: 25px;
    }

    #buttons #rbottom {
        border-bottom-right-radius: 25px;
    }

    #result #resultSCR {
        float: right;
        border: 0px;
        background-color: bisque;
        width: 202px;
        height: 70px;
        margin-bottom: -30px;
        margin-right: 1.2px;
        font-family: "Roboto";
        font-size: x-large;
        border-top-right-radius: 25px;
    }

    #result button {
        width: 71px;
        height: 70px;
        box-sizing: border-box;
        margin: 0;
        text-align: center;
        margin-left: -4px;
        margin-bottom: -36px;
        border: 0px;
        background-color: orange;
        transition: transform 0.1s ease-out;
        font-family: "Roboto";
        overflow: hidden;
        font-size: x-large;
        border-top-left-radius: 25px;
    }

    #result button:hover {
        transform: scale(1.01);
        background-color: darkorange;
    }

    #result button:active {
        background-color: white;
    }
</style>
<?php

function Calculator_settings()
{
    add_option('Calculator_option_name', 'Calculator');
    register_setting('Calculator_options_group', 'Calculator');
}
add_action('admin_init', 'Calculator_settings');

function Calculator_add_options_page()
{
    add_menu_page('Calculator', 'Calculator', 'manage_options', 'Calculator', 'Calculator_options_page');
}
add_action('admin_menu', 'Calculator_add_options_page');

function Calculator_options_page()
{
    ?>
    <div id='main'>
        <div id='calculator'>
            <div id='result'>
                <div id='resultNum'>
                    <input type="text" name="resultSCR" id="resultSCR" readonly>
                </div>
                <button name='result' id='resultbtn' onclick="calc()">=</button>
            </div><br><br>
            <div id='buttons'>
                <input type="button" name="numbers" id='numbers' value="1" onclick="show('1')"></input>
                <input type="button" name="numbers" id='numbers' value="2" onclick="show('2')"></input>
                <input type="button" name="numbers" id='numbers' value="3" onclick="show('3')"></input><input type="button"
                    value="+" name="operator" onclick="show('+')"></input><br>
                <input type="button" name="numbers" id='numbers' value="4" onclick="show('4')"></input>
                <input type="button" name="numbers" id='numbers' value="5" onclick="show('5')"></input>
                <input type="button" name="numbers" id='numbers' value="6" onclick="show('6')"></input><input type="button"
                    value="-" name="operator" onclick="show('-')"></input><br>
                <input type="button" name="numbers" id='numbers' value="7" onclick="show('7')"></input>
                <input type="button" name="numbers" id='numbers' value="8" onclick="show('8')"></input>
                <input type="button" name="numbers" id='numbers' value="9" onclick="show('9')"></input><input type="button"
                    value="*" name="operator" onclick="show('*')"></input><br>

                <input type="button" name="numbers" id='numberZero' value="0" onclick="show('0')" />
                <input type="button" value="/" name="operator" onclick="show('/')" id="rbottom"></input>
            </div>
        </div>

    </div>
    <script>
        let result = document.getElementById('resultSCR');

        const show = (n) => {
            result.value += n;
        }

        const calc = () => {
            if ((eval(result.value) % 1) == 0) {
                result.value = eval(result.value)
            } else {
                result.value = eval(result.value).toFixed(1);
            }
        }

    </script>
    <?php
}