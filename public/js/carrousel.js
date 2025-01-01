const track = document.querySelector('.custom-carousel-track');
const slides = Array.from(track.children);
const prevButton = document.querySelector('.custom-carousel-btn.prev');
const nextButton = document.querySelector('.custom-carousel-btn.next');

let slideWidth = slides[0].getBoundingClientRect().width;

// Función para establecer la posición de cada slide
const setSlidePosition = () => {
    slides.forEach((slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    });
};

// Ajustar posiciones de las slides al cargar y al cambiar el tamaño de la ventana
window.addEventListener('resize', () => {
    slideWidth = slides[0].getBoundingClientRect().width;
    setSlidePosition();
});
setSlidePosition();

// Función para mover al siguiente slide (loop infinito)
const moveToNextSlide = () => {
    const firstSlide = slides[0];

    // Mover la pista para mostrar el siguiente slide
    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform = `translateX(-${slideWidth}px)`;

    // Después de la animación, mover el primer slide al final
    track.addEventListener(
        'transitionend',
        () => {
            track.style.transition = 'none';
            track.style.transform = 'translateX(0)';
            track.appendChild(firstSlide);

            // Actualizar la lista de slides para que refleje los cambios
            const updatedSlides = Array.from(track.children);
            slides.splice(0, slides.length, ...updatedSlides);
        },
        { once: true }
    );
};

// Función para mover al slide anterior (loop infinito)
const moveToPrevSlide = () => {
    const lastSlide = slides[slides.length - 1];

    // Mover el último slide al principio
    track.style.transition = 'none';
    track.insertBefore(lastSlide, slides[0]);

    // Forzar el cambio visual inmediatamente
    track.style.transform = `translateX(-${slideWidth}px)`;

    // Ahora aplicar animación de regreso
    setTimeout(() => {
        track.style.transition = 'transform 0.5s ease-in-out';
        track.style.transform = 'translateX(0)';
    }, 0);

    // Actualizar la lista de slides para que refleje los cambios
    const updatedSlides = Array.from(track.children);
    slides.splice(0, slides.length, ...updatedSlides);
};

// Event listeners para los botones
nextButton.addEventListener('click', moveToNextSlide);
prevButton.addEventListener('click', moveToPrevSlide);

// Movimiento automático del carrusel cada 3 segundos
const autoMove = setInterval(moveToNextSlide, 3000);

// Detener la animación automática al hacer clic en los botones
let userInteracted = false;
const resetAutoMove = () => {
    if (!userInteracted) {
        userInteracted = true;
        clearInterval(autoMove);
        setTimeout(() => {
            userInteracted = false;
            setInterval(moveToNextSlide, 6000);
        }, 1000); // Reiniciar el auto-movimiento después de 1 segundo de interacción
    }
};

nextButton.addEventListener('click', resetAutoMove);
prevButton.addEventListener('click', resetAutoMove);
