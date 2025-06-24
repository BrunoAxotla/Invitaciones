function validarCURP() {
    var curpInput = document.getElementById('curp');
    var curpValue = curpInput.value.trim();

    // Validación de longitud
    if (curpValue.length !== 18) {
        alert('El CURP debe tener 18 caracteres.');
        return false;
    }

    // Validación de letras y números
    var curpRegex = /^[A-Za-z0-9]+$/;
    if (!curpRegex.test(curpValue)) {
        alert('El CURP solo debe contener letras y números.');
        return false;
    }

    
    return true;
}
