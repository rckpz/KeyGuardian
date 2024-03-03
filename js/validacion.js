document.addEventListener("DOMContentLoaded", function () {
  const registroForm = document.getElementById("registroform");
  const ingresoForm = document.getElementById("ingresoform");
  const mensajeDiv = document.getElementById("mensajeError");
  const mensajeTexto = document.getElementById("mensajeTexto");
  const mensajeImagen = document.getElementById("mensajeImagen");
  const botonMensaje = document.getElementById("botonMensaje");

  // Función para mostrar mensajes en el div
  function mostrarMensaje(mensaje, exito = false) {
    mensajeTexto.textContent = mensaje;
    mensajeImagen.src = exito ? "svg/exito.svg" : "svg/error.svg";
    mensajeDiv.style.display = "flex";

    // Configurar el texto y la acción del botón según el tipo de mensaje
    if (exito) {
      botonMensaje.textContent = "Ingresar";
      botonMensaje.addEventListener("click", function () {
        window.location.href = "ingresar.php";
      });
    } else {
      botonMensaje.textContent = "Aceptar";
      botonMensaje.addEventListener("click", function () {
        mensajeDiv.style.display = "none";
      });
    }
  }

  // Función para validar el formulario de registro
  function validarRegistro(event) {
    event.preventDefault();

    // Obtener los valores de los campos por id
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document
      .getElementById("confirmPassword")
      .value.trim();

    // Validar campos vacíos
    if (
      username === "" ||
      email === "" ||
      password === "" ||
      confirmPassword === ""
    ) {
      alert("Todos los campos son obligatorios.");
      return false;
    }

    // Validar formato de correo electrónico
    let correoRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    if (!correoRegex.test(email)) {
      alert("El correo electrónico no es válido.");
      return false;
    }

    // Validar longitud de usuario
    if (username.length < 8 || username.length > 16) {
      alert("El nombre de usuario debe tener entre 8 y 16 caracteres.");
      return false;
    }

    // Validar longitud de contraseña
    if (password.length < 6 || password.length > 16) {
      alert("La contraseña debe tener entre 6 y 16 caracteres.");
      return false;
    }

    // Validar que las contraseñas coincidan
    if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden.");
      return false;
    }

    // Si todas las validaciones pasan, enviar el formulario mediante AJAX
    let formData = new FormData(registroForm);
    fetch("php/procesaregistro.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          mostrarMensaje(data.error);
        } else if (data.success) {
          mostrarMensaje(data.success, true);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  // Función para validar el formulario de ingreso
  function validarIngreso(event) {
    event.preventDefault();

    // Obtener los valores de los campos por id
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    // Validar campos vacíos
    if (username === "" || password === "") {
      alert("INGRESA LOS DATOS");
      return false;
    }

    // Validar longitud de usuario
    if (username.length < 8 || username.length > 16) {
      alert("Tu nombre de usuario debe tener entre 8 y 16 caracteres.");
      return false;
    }

    // Validar longitud de contraseña
    if (password.length < 6 || password.length > 16) {
      alert("Tu contraseña debe tener entre 6 y 16 caracteres.");
      return false;
    }

    // Si todas las validaciones pasan, enviar el formulario mediante AJAX
    let formData = new FormData(ingresoForm);
    fetch("php/procesaingreso.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          mostrarMensaje(data.error);
        } else if (data.success) {
          window.location.href = "indexpro.php";
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  // Agregar eventos de escucha a los formularios
  if (registroForm) {
    registroForm.addEventListener("submit", validarRegistro);
  }
  if (ingresoForm) {
    ingresoForm.addEventListener("submit", validarIngreso);
  }
});
