runAction = function (inputValue, buttonType) {
    calcAjax(inputValue, buttonType);

}
calcAjax = function (inputValue, buttonType) {
    $.ajax({
        url: "ajax.php",
        method: "POST",
        dataType: "json",
        data: {
            //'inputTypeField': $('#inputType').val(),
            //'setActionField': $('#setAction').val(),
            //'outputField': $('#output').val(),
            //'historyField': $('#history').val(),
            'inputValue': inputValue,
            'buttonType': buttonType
        }
    }).done(function (result) {
        $('#output').html(result['output'])
        $('#history').html(result['historyField'])

        console.log(result);
    });
}
$(document).ready(function () {
    //console.log('ready');
    runAction('restore', 'action')
    getKeyboardInput();
});
