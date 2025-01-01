// Animacion para los integrantes (aparecen mas tarde)
/*document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.perfilsm');

    elements.forEach((el, index) => {
        setTimeout(() => {
            el.style.opacity = 1;
            el.style.transform = 'translateY(0)';
        }, index * 300); // Retraso en la aparición de cada elemento
    });
});
*/

// Efecto para que los vectores se muevan cuando scrolleamos
window.addEventListener('scroll', function () {
    const vectorIzq = document.querySelector('.vectorIzq');
    const vectorDer = document.querySelector('.vectorDer');
    const scrollY = window.scrollY;

    vectorIzq.style.transform = `translateY(${scrollY * 0.2}px)`;
    vectorDer.style.transform = `translateY(${scrollY * -0.2}px)`;
});


// Animacion para que a medida que escrolleamos carguen las cosas
document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1, // Ajusta este valor para cambiar el momento de la animación
    });

    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(el => observer.observe(el));
});


// efecto de toque de boton enviar en el form de "trabaja con nosotros"
document.querySelector(".boton-enviar").addEventListener("click", (e) => {
    const button = e.currentTarget;
    const rect = button.getBoundingClientRect();
    const circle = document.createElement("span");
    const diameter = Math.max(rect.width, rect.height);
    const radius = diameter / 2;

    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `${e.clientX - rect.left - radius}px`;
    circle.style.top = `${e.clientY - rect.top - radius}px`;
    circle.classList.add("ripple");

    const ripple = button.querySelector(".ripple");
    if (ripple) ripple.remove();

    button.appendChild(circle);
});



// Animacion sobre un titulo para que cargue como maquina de escribir (h-o-l-a)
/*
document.addEventListener('DOMContentLoaded', function () {
    const text = "Productos";
    const target = document.querySelector('.productos-titulo');
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            target.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 100);
        }
    }

    typeWriter();
});
*/