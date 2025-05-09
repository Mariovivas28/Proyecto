// funciones_generales.js

/**
 * Redirige a otra pantalla.
 * @param {string} ruta - Ruta de la pantalla a la que se desea redirigir.
 */
function redirigir(ruta) {
    window.location.href = ruta;
}

/**
 * Muestra un mensaje de alerta.
 * @param {string} mensaje - Mensaje que se mostrará en la alerta.
 */
function mostrarAlerta(mensaje) {
    alert(mensaje);
}

/**
 * Solicita confirmación antes de realizar una acción.
 * @param {string} mensaje - Mensaje de confirmación.
 * @returns {boolean} - True si el usuario confirma, False si cancela.
 */
function confirmarAccion(mensaje) {
    return confirm(mensaje);
}