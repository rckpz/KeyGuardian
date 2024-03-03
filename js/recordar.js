document.addEventListener("DOMContentLoaded", function () {
  const recordarBtn = document.querySelector(".recordar");
  const descripcionInput = document.getElementById("descripcion");
  const contrasenaGenerada = document.getElementById("contra");

  recordarBtn.addEventListener("click", function (event) {
    event.preventDefault();
    // Mostrar formulario emergente para ingresar descripción
    const descripcion = prompt(
      "Ingresa una descripción para recordar tu contraseña:"
    );
    if (descripcion !== null && descripcion.trim() !== "") {
      // Enviar datos al servidor para guardar en la base de datos
      const contrasena = contrasenaGenerada.textContent;
      guardarContrasena(descripcion, contrasena);
    }
  });

  function guardarContrasena(descripcion, contrasena) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/recordar.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onerror = function () {
      console.error("Error de red al enviar la solicitud.");
    };

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          // Aquí puedes realizar alguna acción adicional si la solicitud es exitosa.
        } else {
          console.error("Error en la solicitud: " + xhr.status);
        }
      }
    };

    try {
      const params =
        "descripcion=" +
        encodeURIComponent(descripcion) +
        "&contrasena=" +
        encodeURIComponent(contrasena);
      xhr.send(params);
    } catch (error) {
      console.error("Error al enviar la solicitud: " + error.message);
    }
  }
});
