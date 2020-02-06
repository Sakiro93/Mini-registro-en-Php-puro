function valCedula(cedula) {
    if (cedula.length == 10) {
        var mensaje = "";
        //Obtenemos el dígito de la región
        var digito_region = cedula.substring(0, 2);//se declara una variable con var, substring me indica de donde hasta donde tomo el dígito
        //Pregunto si la region existe ecuador
        if (digito_region >= 1 && digito_region <= 24) {
            var dig;
            var suma_total = 0;
            for (var i = 0; i < 9; i++) {
                dig = parseInt(cedula.substring(i, i + 1));
                if (i % 2 == 0) {
                    dig = dig * 2;
                    if (dig > 9)
                        dig = dig - 9;
                }
                suma_total = suma_total + dig;
            }
            //Extraigo el último dígito
            var ultimo_digito = parseInt(cedula.substring(9, 10))
            //Obtenemos la decena inmediata
            var z = 0;
            while (suma_total % 10 != 0) {
                suma_total++;
                z++;
            }
            //Validamos que el digito validador sea igual al último dígito
            if (z == ultimo_digito) {
                return mensaje = "La cédula: " + cedula + " es correcta\n";
            } else
            {
                return mensaje = "La cédula: " + cedula + " no es correcta\n";
            }
        } else {
            return mensaje = "Esta cédula no pertenece a ninguna Provincia\n";
        }
    } else {
        return mensaje = "Esta cédula no tiene 10 Dígitos\n";
    }
}

