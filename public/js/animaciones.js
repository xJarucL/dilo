document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector("nav");

    // Aparece la barra con animación al cargar la página
    setTimeout(() => {
        nav.style.top = "0";
    }, 300);

    // Efecto de sombra animada cuando el usuario baja
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            nav.classList.add("scroll-shadow");
        } else {
            nav.classList.remove("scroll-shadow");
        }
    });
});
