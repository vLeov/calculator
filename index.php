<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Calculator</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/keyboard.js"></script>

</head>
<body class="">
<div class="pos-calc" id="pos-calc" >

    <div class="">
        <div class="fields">
            <div id="history"></div>
            <div id="output">0</div>

        </div>
        <div class="calc-buttons">


            <div class="">
                <div class="calc-row">
                    <div class="" style="left: 0px">
                        <button class="btn btn-danger" onclick="runAction('clear', 'action')" type="button">clear
                        </button>
                    </div>

                    <div class="" style="left: 120px">
                        <button class="btn btn-primary" onclick="runAction('/', 'action')" type="button">/
                        </button>
                    </div>
                </div>
                <!-- Zeile 1 -->
                <div class="calc-row">
                    <div class="" style="left: 0px">
                        <button class="btn btn-secondary" onclick="runAction(7, 'number')" type="button">7</button>
                    </div>
                    <div class="" style="left: 40px">
                        <button class="btn btn-secondary" onclick="runAction(8, 'number')" type="button">8</button>
                    </div>
                    <div class="" style="left: 80px">
                        <button class="btn btn-secondary" onclick="runAction(9, 'number')" type="button">9</button>
                    </div>
                    <div class="" style="left: 120px">
                        <button class="btn btn-primary" onclick="runAction('*', 'action')" type="button">*
                        </button>
                    </div>
                </div>

                <!-- Zeile 2 -->
                <div class="calc-row">
                    <div class="" style="left: 0px">
                        <button class="btn btn-secondary" onclick="runAction(4, 'number')" type="button">4</button>
                    </div>
                    <div class="" style="left: 40px">
                        <button class="btn btn-secondary" onclick="runAction(5, 'number')" type="button">5</button>
                    </div>
                    <div class="" style="left: 80px">
                        <button class="btn btn-secondary" onclick="runAction(6, 'number')" type="button">6</button>
                    </div>
                    <div class="" style="left: 120px">
                        <button class="btn btn-primary" onclick="runAction('-', 'action')" type="button">-
                        </button>
                    </div>
                </div>

                <!-- Zeile 3 -->
                <div class="calc-row">
                    <div class="" style="left: 0px">
                        <button class="btn btn-secondary" onclick="runAction(1, 'number')" type="button">1</button>
                    </div>
                    <div class="" style="left: 40px">
                        <button class="btn btn-secondary" onclick="runAction(2, 'number')" type="button">2</button>
                    </div>
                    <div class="" style="left: 80px">
                        <button class="btn btn-secondary" onclick="runAction(3, 'number')" type="button">3</button>
                    </div>
                    <div class=" " style="left: 120px">
                        <button class="btn btn-primary" onclick="runAction('+', 'action')" type="button">+
                        </button>
                    </div>
                </div>

                <!-- Zeile 4 -->
                <div class="calc-row">
                    <div class="" style="left: 0px">
                        <button class="btn btn-secondary" onclick="runAction('+-', 'numberaction')" type="button"
                                style="padding-left: 5px;">+/-
                        </button>
                    </div>
                    <div style="left: 40px">
                        <button class="btn btn-secondary" onclick="runAction(0, 'number')" type="button">0</button>
                    </div>
                    <div style="left: 80px">
                        <button class="btn btn-secondary" onclick="runAction('.', 'numberaction')" type="button">,
                        </button>
                    </div>
                    <div class="d-grid gap-2" style="left: 120px">
                        <button class="btn btn-primary " onclick="runAction('=', 'action')" type="button">=</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</body>
</html>
