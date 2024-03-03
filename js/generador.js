document.addEventListener("DOMContentLoaded", function () {
  // Obtén referencias a los elementos del DOM
  const contragen = document.getElementById("contra");
  const refrescarBtn = document.querySelector(".refrescar");
  const copiarBtn = document.querySelector(".copiar");
  const anteriorBtn = document.querySelector(".anterior");
  const siguienteBtn = document.querySelector(".siguiente");
  const longitudInput = document.querySelector(".longitud");
  const longitudOutput = document.querySelector("#longitudOutput");
  const minusculasCheckbox = document.getElementById("minusculas");
  const mayusculasCheckbox = document.getElementById("mayusculas");
  const digitosCheckbox = document.getElementById("digitos");
  const simbolosCheckbox = document.getElementById("simbolos");

  // Arreglo para almacenar historial de contraseñas
  let historialContraseñas = [];
  let indiceHistorial = -1;
  let alertaMostrada = false; // Variable para controlar si se ha mostrado una alerta

  // Si es el generador pro, agregar evento para actualizar la longitud
  if (longitudInput) {
    longitudInput.addEventListener("input", function () {
      longitudOutput.textContent = this.value;
    });
  }

  // Función para generar una contraseña aleatoria para el generador básico
  function generarContraseñaBasica() {
    let nuevaContraseña;
    // Valida contraseñas hasta obtener una segura
    do {
      nuevaContraseña = "";
      const longitud = 8;
      const charset =
        "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
      for (let i = 0; i < longitud; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        nuevaContraseña += charset.charAt(randomIndex);
      }
    } while (!esContraseñaSegura(nuevaContraseña));

    // Añade la nueva contraseña al historial solo si es diferente de la última
    if (
      historialContraseñas.length === 0 ||
      nuevaContraseña !== historialContraseñas[historialContraseñas.length - 1]
    ) {
      historialContraseñas.push(nuevaContraseña);
    }

    // Reinicia el índiceHistorial
    indiceHistorial = historialContraseñas.length - 1;

    return nuevaContraseña;
  }

  // Función para validar si una contraseña es segura
  function esContraseñaSegura(contraseña) {
    // Verifica que no sean solo letras, solo números, ni caracteres repetidos
    const tieneLetrasYNumeros = /[a-zA-Z].*\d|\d.*[a-zA-Z]/.test(contraseña);
    const noTieneCaracteresRepetidos = !/(.)\1/.test(contraseña);

    // Verifica que no haya letras minúsculas, ni mayúsculas, ni números consecutivos
    const noTieneLetrasConsecutivas = !/[a-z]{2,}|[A-Z]{2,}/.test(contraseña);
    const noTieneNumerosConsecutivos = !/\d{2,}/.test(contraseña);

    return (
      tieneLetrasYNumeros &&
      noTieneCaracteresRepetidos &&
      noTieneLetrasConsecutivas &&
      noTieneNumerosConsecutivos
    );
  }

  // Función para generar una contraseña aleatoria para el generador pro
  function generarContraseñaPro() {
    let nuevaContraseña;
    let contraseñaGenerada = false;
    // Valida contraseñas hasta obtener una segura o hasta que se muestre una alerta
    do {
      nuevaContraseña = "";
      const longitud = longitudInput.value;
      let charset = "";

      if (minusculasCheckbox.checked) {
        charset += "abcdefghijklmnopqrstuvwxyz";
      }
      if (mayusculasCheckbox.checked) {
        charset += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      }
      if (digitosCheckbox.checked) {
        charset += "0123456789";
      }
      if (simbolosCheckbox.checked) {
        charset += "!@#$%^&*()_+~`|}{[]:;?><,./-=";
      }

      for (let i = 0; i < longitud; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        nuevaContraseña += charset.charAt(randomIndex);
      }

      // Verifica si la contraseña generada cumple los requisitos
      if (esContraseñaSeguraPro(nuevaContraseña)) {
        contraseñaGenerada = true;
      }
    } while (!contraseñaGenerada && !alertaMostrada); // Detiene la generación si hay una alerta

    // Restablecer alertaMostrada a false después de cada generación exitosa de contraseña
    alertaMostrada = false;

    if (contraseñaGenerada) {
      // Añade la nueva contraseña al historial solo si es diferente de la última
      if (
        historialContraseñas.length === 0 ||
        nuevaContraseña !==
          historialContraseñas[historialContraseñas.length - 1]
      ) {
        historialContraseñas.push(nuevaContraseña);
      }

      // Reinicia el índiceHistorial
      indiceHistorial = historialContraseñas.length - 1;

      return nuevaContraseña;
    }
  }

  // Función para validar si una contraseña generada en el generador pro es segura
  function esContraseñaSeguraPro(contraseña) {
    // Verificar que al menos dos checkboxes estén activados
    const checkboxActivos = [
      minusculasCheckbox,
      mayusculasCheckbox,
      digitosCheckbox,
      simbolosCheckbox,
    ].filter((checkbox) => checkbox.checked);

    if (checkboxActivos.length < 2 && !alertaMostrada) {
      alertaMostrada = true;
      alert(
        "La contraseña debe tener al menos dos sets de caracteres activados."
      );
      return false;
    }

    // Verificar si solo están activados los sets de letras
    const soloLetras =
      minusculasCheckbox.checked &&
      mayusculasCheckbox.checked &&
      !digitosCheckbox.checked &&
      !simbolosCheckbox.checked;

    // Verificar si solo están activados los sets de dígitos o símbolos
    const soloDigitosOSimbolos =
      (digitosCheckbox.checked || simbolosCheckbox.checked) &&
      !minusculasCheckbox.checked &&
      !mayusculasCheckbox.checked;

    // Forzar la inclusión de al menos un set de letras si solo están activados los dígitos y símbolos
    if (soloDigitosOSimbolos && !alertaMostrada) {
      alertaMostrada = true;
      alert("La contraseña debe incluir al menos un set de letras.");
      return false;
    }

    // Forzar la inclusión de al menos un set de dígitos o símbolos si solo están activados los sets de letras
    if (soloLetras && !alertaMostrada) {
      alertaMostrada = true;
      alert(
        "La contraseña debe incluir al menos un set de dígitos o símbolos."
      );
      return false;
    }

    // Verificar que la contraseña cumpla con las expresiones regulares
    const tieneLetrasYNumerosOSimbolos =
      /[a-zA-Z\d!@#$%^&*()_+~`|}{[\]:;?><,./-]/.test(contraseña);
    const noTieneLetrasConsecutivas = !/[a-z]{2,}|[A-Z]{2,}/.test(contraseña);
    const noTieneNumerosConsecutivos = !/\d{2,}/.test(contraseña);

    // Reiniciar alertaMostrada si todas las condiciones se cumplen
    if (checkboxActivos.length >= 2 && !soloLetras && !soloDigitosOSimbolos) {
      alertaMostrada = false;
    }

    // Devolver verdadero si la contraseña pasa todas las validaciones
    return (
      tieneLetrasYNumerosOSimbolos &&
      noTieneLetrasConsecutivas &&
      noTieneNumerosConsecutivos
    );
  }

  // Función para actualizar la contraseña en el DOM
  function actualizarContraseña() {
    // Muestra la contraseña actualizada en el DOM
    contragen.textContent = historialContraseñas[indiceHistorial];
    // Actualiza la opacidad de los botones según la existencia de contraseñas anteriores o siguientes
    actualizarOpacidadBotones();
  }

  // Función para copiar la contraseña al portapapeles
  function copiarContraseña() {
    const textoParaCopiar = contragen.textContent;
    const textarea = document.createElement("textarea");
    textarea.value = textoParaCopiar;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
    alert("Contraseña copiada al portapapeles.");
  }

  // Función para actualizar la opacidad de los botones de navegación
  function actualizarOpacidadBotones() {
    // Botón anterior
    if (indiceHistorial <= 0) {
      anteriorBtn.style.opacity = "0.5";
    } else {
      anteriorBtn.style.opacity = "1";
    }

    // Botón siguiente
    if (indiceHistorial >= historialContraseñas.length - 1) {
      siguienteBtn.style.opacity = "0.5";
    } else {
      siguienteBtn.style.opacity = "1";
    }
  }

  // Evento de clic para el botón de refrescar
  refrescarBtn.addEventListener("click", function () {
    if (this.closest(".generador")) {
      // Genera una nueva contraseña y la añade al historial para el generador básico
      const nuevaContraseña = generarContraseñaBasica();
      if (nuevaContraseña) {
        // Si se generó una nueva contraseña, muestra la contraseña actualizada en el DOM
        contragen.textContent = nuevaContraseña;
      }
    } else if (this.closest(".generadorpro")) {
      // Genera una nueva contraseña y la añade al historial para el generador pro
      const nuevaContraseña = generarContraseñaPro();
      if (nuevaContraseña) {
        // Si se generó una nueva contraseña, muestra la contraseña actualizada en el DOM
        contragen.textContent = nuevaContraseña;
      }
    }
    // Actualiza la opacidad de los botones según la existencia de contraseñas anteriores o siguientes
    actualizarOpacidadBotones();
  });

  // Evento de clic para el botón de copiar
  copiarBtn.addEventListener("click", function (event) {
    event.preventDefault();
    copiarContraseña();
  });

  // Evento de clic para el botón de anterior
  anteriorBtn.addEventListener("click", function () {
    // Verifica si hay contraseñas en el historial y no está en la primera
    if (historialContraseñas.length > 0 && indiceHistorial > 0) {
      // Decrementa el índiceHistorial y muestra la contraseña correspondiente
      indiceHistorial--;
      actualizarContraseña();
    }
  });

  // Evento de clic para el botón de siguiente
  siguienteBtn.addEventListener("click", function () {
    // Verifica si hay contraseñas en el historial y no se ha alcanzado la última
    if (
      historialContraseñas.length > 0 &&
      indiceHistorial < historialContraseñas.length - 1
    ) {
      // Incrementa el índiceHistorial y muestra la contraseña correspondiente
      indiceHistorial++;
      actualizarContraseña();
    }
  });

  // Generar la contraseña inicial al cargar la página
  if (document.querySelector(".generador")) {
    generarContraseñaBasica();
  } else if (document.querySelector(".generadorpro")) {
    const nuevaContraseña = generarContraseñaPro(); // Llamada inicial para generar la contraseña pro
    if (nuevaContraseña) {
      // Si se generó una nueva contraseña, muestra la contraseña generada
      contragen.textContent = nuevaContraseña;
    }
    longitudOutput.textContent = longitudInput.value;
  }

  // Actualizar la contraseña al cargar la página
  actualizarContraseña();
});
