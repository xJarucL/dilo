
function filtrarCartas() {
    let input = document.getElementById("search").value.toLowerCase();
    let cartas = document.querySelectorAll(".carta.noticia");

    cartas.forEach(carta => {
        let texto = carta.innerText.toLowerCase();
        carta.style.display = texto.startsWith(input) ? "block" : "none";
    });
}
