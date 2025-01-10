function cambiarImagen(nuevaImagen) {
    const imagenDestacada = document.getElementById('imagen-destacada');
    imagenDestacada.style.opacity = 0; // Inicia la transición
    setTimeout(() => {
        imagenDestacada.src = nuevaImagen; // Cambia la imagen
        imagenDestacada.style.opacity = 1; // Termina la transición
    }, 300); // Tiempo en milisegundos para que coincida con el CSS
}
