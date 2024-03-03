$(document).ready(function () {
  // Función para cargar el historial de contraseñas al cargar la página
  cargarHistorial();

  // Función para copiar contraseña al portapapeles
  $(document).on("click", ".copiar", function () {
    var contrasena = $(this).data("contrasena");
    var textarea = $("<textarea>").val(contrasena).appendTo("body").select();
    document.execCommand("copy");
    textarea.remove();
    alert("Contraseña copiada al portapapeles.");
  });

  // Función para eliminar contraseña
  $(document).on("click", ".eliminar", function () {
    var idContraseña = $(this).data("id");
    if (confirm("¿Estás seguro de que quieres eliminar esta contraseña?")) {
      $.ajax({
        url: "php/eliminar.php",
        type: "POST",
        data: { id: idContraseña },
        success: function (response) {
          alert(response);
          // Recargar la lista de contraseñas después de eliminar
          cargarHistorial();
        },
        error: function (xhr, status, error) {
          alert("Error al eliminar la contraseña: " + error);
        },
      });
    }
  });

  // Función para cargar el historial de contraseñas desde el servidor
  function cargarHistorial() {
    $.ajax({
      url: "php/obtener_historial.php",
      type: "GET",
      success: function (response) {
        $("#contraseñas").html(response);
      },
      error: function (xhr, status, error) {
        alert("Error al cargar el historial de contraseñas: " + error);
      },
    });
  }
});
