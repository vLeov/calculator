getKeyboardInput = function () {
    document.body.addEventListener("keyup", (e) => {
        e.preventDefault();
        //console.log(e.key)
        if (e.key >= "0" && e.key <= "9") {
            runAction(Number(e.key), "number")
        }
        if (e.key === "+") {
            runAction('+', 'action');
        }
        if (e.key === "-") {
            runAction('-', 'action');
        }
        if (e.key === "/") {
            runAction('/', 'action');
        }
        if (e.key === "*") {
            runAction('*', 'action');
        }
        if (e.key === "") {
            runAction('', 'action');
        }
        if (e.key === "Enter") {
            runAction('=', 'action');
        }
        if (e.key === "Escape" || e.key === "Backspace" || e.key === "Delete") {
            runAction('clear', 'action');
        }
        if (e.key === "." || e.key === ",") {
            runAction('.', 'numberaction');

        }
    });

}
