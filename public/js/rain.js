document.addEventListener('DOMContentLoaded', () => {
    const rainContainer = document.getElementById('rain');
    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'.split('');
    const numberOfDrops = 100; // Número de gotas de letras a generar

    function createRaindrop() {
        const letter = letters[Math.floor(Math.random() * letters.length)];
        const raindrop = document.createElement('span');
        raindrop.classList.add('raindrop');
        raindrop.innerText = letter;

        // Establece una posición inicial aleatoria en el eje X
        const randomX = Math.floor(Math.random() * window.innerWidth);
        raindrop.style.left = `${randomX}px`;

        // Añade la animación con un retardo aleatorio para que la lluvia se vea más natural
        raindrop.style.animationDuration = `${Math.random() * 3 + 3}s`; // Duración entre 2s y 4s

        // Añadir la gota al contenedor de la lluvia
        rainContainer.appendChild(raindrop);

        // Eliminar la gota después de que termine la animación para no sobrecargar el DOM
        raindrop.addEventListener('animationend', () => {
            raindrop.remove();
        });
    }

    // Generar gotas de letras en intervalos
    setInterval(createRaindrop, 900); // Cada 100ms crea una nueva gota
});
