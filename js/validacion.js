

    function soloLetras(event) {
        var charCode = event.keyCode;
        if (charCode != 8 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode != 32) {
            event.preventDefault();
            return false;
        }
        return true;
    }

    function soloNumeros(event) {
        var charCode = event.keyCode;
        var inputField = event.target || event.srcElement;
        if (inputField.value.length >= inputField.maxLength || charCode < 48 || charCode > 57) {
            event.preventDefault();
            return false;
        }
        return true;
    }

    function validarFormulario() {
        var nombre = document.getElementsByName('nombre')[0].value;
        var colonia = document.getElementsByName('colonia')[0].value;
        var calle = document.getElementsByName('calle')[0].value;
        var telefono = document.getElementsByName('telefono')[0].value;
        var codigoPostal = document.getElementsByName('codigopostal')[0].value;

        if (nombre.trim() === "") {
            alert("Por favor, introduce un nombre válido.");
            return false;
        }

        if (colonia.trim() === "") {
            alert("Por favor, introduce una colonia válida.");
            return false;
        }

        if (calle.trim() === "") {
            alert("Por favor, introduce una calle válida.");
            return false;
        }

        if (telefono.length !== 10 || isNaN(telefono)) {
            alert("El teléfono debe tener 10 dígitos y solo puede contener números.");
            return false;
        }

        if (codigoPostal.length !== 5 || isNaN(codigoPostal)) {
            alert("El código postal debe tener 5 dígitos y solo puede contener números.");
            return false;
        }

        return true;
    }