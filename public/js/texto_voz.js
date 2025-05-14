function leerTexto(elemento) {
    let texto = elemento.getAttribute("data-texto"); // Obtiene el texto del atributo
    let speech = new SpeechSynthesisUtterance();
    speech.text = texto;
    speech.lang = "es-ES"; // Español
    speech.rate = 1; // Velocidad normal
    speech.pitch = 1; // Tono normal
    window.speechSynthesis.speak(speech);
}
