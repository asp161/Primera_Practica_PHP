//Variables globales para la tabla
var i = 1;
var j = 3;
var a = 0.1;
var b = 0.16;
var c = 0.25;
var d = 0.31;

function addRow(){

    for (var aux = 0; aux <= 14; aux++) {
        var table = document.getElementById("tablaA");
        var row = table.insertRow();
        var cell = row.insertCell();
        cell.innerHTML = i;
        cell = row.insertCell();
        cell.innerHTML = j * i;
        cell = row.insertCell();
        cell.innerHTML = a.toFixed(2);
        cell = row.insertCell();
        cell.innerHTML = b.toFixed(2);
        cell = row.insertCell();
        cell.innerHTML = c.toFixed(2);
        cell = row.insertCell();
        cell.innerHTML = d.toFixed(2);
        if (i <= 3) {
            a = a + 0.1;

        } else if (i >= 11) {
            a = a + 0.07;

        } else {
            a = a + 0.08;
        }

        if (i >= 11) {
            b = b + 0.13;
        } else if (i >= 4) {
            b = b + 0.14;
        } else {
            b = b + 0.16;
        }


        if (i >= 11) {
            c = c + 0.22;

        } else if (i >= 4) {
            c = c + 0.23;

        } else {
            c = c + 0.25;

        }


        if (i >= 11) {
            d = d + 0.28;

        } else if (i >= 4) {
            d = d + 0.29;

        } else {
            d = d + 0.31;
        }
        i++;
    }
}


