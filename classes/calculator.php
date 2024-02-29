<?php

class Calculator
{
    protected array $_currentSession;
    protected mixed $_inputValue;
    protected mixed $_buttonType;
    protected string $_currentNumber;
    protected string $_historyField;
    protected string $_mathAction;


    public function __construct()
    {
        $this->_currentSession = $_SESSION;
        $this->_inputValue = $_POST['inputValue'];
        $this->_buttonType = $_POST['buttonType'];
        $this->_currentNumber = 0.0;
        $this->_historyField = '';
        $this->_mathAction = '';

        error_log('---------------------------------------');
        error_log('INPUT buttonType:' . $this->_buttonType . ' (' . gettype($this->_buttonType) . ')');
        error_log('INPUT inputValue:' . $this->_inputValue . ' (' . gettype($this->_inputValue) . ')');

        $this->_restoreFromSession();

        error_log('START _currentNumber:' . $this->_currentNumber . ' (' . gettype($this->_currentNumber) . ')');
    }

    private function _restoreFromSession(): void
    {
        $this->_currentNumber = isset($this->_currentSession['currentNumber']) ? $this->_currentSession['currentNumber'] : $this->_currentNumber;
        $this->_historyField = isset($this->_currentSession['history']) ? $this->_currentSession['history'] : $this->_historyField;
        $this->_mathAction = isset($this->_currentSession['mathAction']) ? $this->_currentSession['mathAction'] : $this->_mathAction;
    }

    public function doIt(): array
    {
        switch ($this->_buttonType) {
            case 'number':
                $this->_checkNumberInput();
                break;
            case 'numberaction':
                $this->_checkNumberActionInput();
                break;
            case 'action':
                $this->_checkActionInput();
                break;
        }

        error_log('END _currentNumber:' . $this->_currentNumber . ' (' . gettype($this->_currentNumber) . ')');


        $this->_updateSession();

        return array(
            'output' => str_replace('.', ',', $this->_currentNumber),
            'historyField' => $this->_historyField,
        );
    }

    private function _checkNumberInput(): void
    {
        if (strlen((string)$this->_currentNumber) >= 15) {
            return;
        }

        if (empty($this->_currentNumber)) {
            $this->_currentNumber = $this->_inputValue;
            return; 
        }

        $this->_currentNumber .= $this->_inputValue;
    }

    private function _checkNumberActionInput()
    {
        if ($this->_inputValue === '.') {
            error_log('Komma Check: Komma gefunden');
            if (strpos($this->_currentNumber, '.') !== false) {
                error_log('Komma Check: Komma bereits vorhanden');
                return; 
            }
            if (empty($this->_currentNumber)) {
                error_log('Komma Check: Zahl noch nicht gesetzt');
                $this->_currentNumber = '0.';
                return; 
            }

            error_log('Komma Check: Zahl bereits gesetzt');
            $this->_currentNumber .= $this->_inputValue;
            return; 
        }

        if ($this->_inputValue === '+-') {
            if (empty($this->_currentNumber)) {
                return; 
            }
            $this->_currentNumber = (0 - (float)$this->_currentNumber);
        }
    }

    private function _checkActionInput(): void
    {
        switch ($this->_inputValue) {
            case 'clear':
                $this->_clearAll();
                break;
            case '+':
                $this->_setAction("+");
                break;
            case '-':
                $this->_setAction("-");
                break;
            case '*':
                $this->_setAction("*");
                break;
            case '/':
                $this->_setAction("/");
                break;
            case '=':
                $this->_calcIt();
                break;
            case 'restore':
                $this->_restoreFromSession();
                break;
        }
    }

    private function _clearAll(): void
    {
        session_destroy();
        $this->_currentNumber = 0.0;
        $this->_historyField = '';
    }

    private function _setAction($action)
    {
        if ($this->_historyField !== "") {
            if ($this->_currentNumber > 0) {
                $this->_calcIt(true);
            }
            $this->_historyField = substr($this->_historyField, 0, -1) . $action;
        } else {
            $this->_historyField = $this->_currentNumber . $action;
        }
        $this->_mathAction = $action;
        $this->_currentNumber = 0.0;
    }

    private function _calcIt($calcBetween = false)
    {
        $value = 0;
        $this->_historyField = substr($this->_historyField, 0, -1);
        switch ($this->_mathAction) {
            case '+':
                $value = (float)$this->_historyField + (float)$this->_currentNumber;
                break;
            case '-':
                $value = (float)$this->_historyField - (float)$this->_currentNumber;
                break;
            case '*':
                $value = (float)$this->_historyField * (float)$this->_currentNumber;
                break;
            case '/':
                $value = (float)$this->_historyField / (float)$this->_currentNumber;
                break;
        }
        if ($calcBetween) {
            $this->_historyField = $value . $this->_mathAction;
        } else {
            $this->_currentNumber = $value;
            $this->_historyField = '';
        }
    }

    private function _updateSession(): void
    {
        $_SESSION = array(
            'currentNumber' => $this->_currentNumber,
            'history' => $this->_historyField,
            'mathAction' => $this->_mathAction,
        );
    }

    private function myDebug($mixed = null): string
    {
//        ob_start();
//        var_dump($mixed);
//        $content = ob_get_contents();
//        ob_end_clean();

        $content = print_r($mixed, true);
        return strip_tags($content);
    }

}
