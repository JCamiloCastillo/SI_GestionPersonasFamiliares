function validarConMayus(inputText) {
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out.toUpperCase();
}

function validarConMinuscula(inputText) {
    var out = '';
    var filtro = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz ';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out.toUpperCase();
}

function validarNumeros(inputText) {
    var out = '';
    var filtro = '1234567890';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out;
}
function validarDrcion(inputText) {
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890#-. ';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out.toUpperCase();
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


