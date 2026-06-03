<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $success = '';
        $error = '';
        $math_opeation = $_POST['math-operation'];
        if(empty($number1) || empty($number2)) {
            $error = 'Поля ввода не могут быть пустыми';
        } else {
            switch ($_POST['math-operation']) {
                case '+':
                    $success = $number1 + $number2;
                break;
                case '-':
                    $success = $number1 - $number2;
                break;
                case '*':
                    $success = $number1 * $number2;
                break;
                case '/':
                    if ($number2 === 0) {
                        $error = 'На ноль делить нельзя';
                    } else {
                        $success = $number1 / $number2;
                    }
                break;
                case '%':
                    if ($number2 === 0) {
                        $error = 'На ноль делить нельзя';
                    } else {
                        $success = $number1 % $number2;
                    }
                break;
                case '^':
                    $success = pow($number1, $number2);
                break;
            }
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="POST">
            <div class=block>
                <input name="number1" type="text">
                <input name="number2" type="text">
                <select name='math-operation'>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                    <option value="%">%</option>
                    <option value="^">^</option>
                </select>
                <input type="submit">
                <p><?php if (!empty($error)): echo $error; else: echo 'Результат: ', $success; endif ?></p>
            </div>
        </form>
    </body>
</html>