$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        contentType: "application/json",
    },
});

$(".formAgregarProducto").submit(function (event) {
    event.preventDefault();

    const productoId = $(this).find("button").data("producto-id");

    console.log(productoId);

    $.ajax({
        url: "carrito/agregar/" + productoId,
        method: "POST",
        data: JSON.stringify({ producto_id: productoId }),
        success: function () {
            alert("Producto agregado al carrito");
        },
        error: function () {
            alert("Hubo un error.");
        },
    });
});

$(".btn_eliminar").on("click", function (e) {
    e.preventDefault();

    const productoId = $(this).data("producto-id");
    const filaProducto = $(`#producto-${productoId}`);

    $.ajax({
        url: "/carrito/eliminar",
        method: "DELETE",
        data: JSON.stringify({
            producto_id: productoId,
        }),
        contentType: "application/json",
        success: function (response) {
            alert(response.mensaje);
            filaProducto.remove();
        },
        error: function (response) {
            alert(response.error);
        },
    });
});

$(".btn_disminuir").on("click", function (e) {
    e.preventDefault();

    const productoId = $(this).data("producto-id");
    const cantidadContainer = $(this).siblings("p");
    const filaProducto = $(`#producto-${productoId}`);
    const precioProducto = parseInt(
        filaProducto.find(".precio-producto").text().replace("$", "")
    );
    const totalContainer = filaProducto.find(".total-producto");

    $.ajax({
        url: "/carrito/disminuir",
        method: "PATCH",
        data: JSON.stringify({
            producto_id: productoId,
        }),
        contentType: "application/json",
        success: function (response) {
            if (response.cantidad > 0) {
                cantidadContainer.text(response.cantidad);

                const nuevoTotal = precioProducto * response.cantidad;
                totalContainer.text(`$${nuevoTotal}`);
            } else {
                filaProducto.remove();
            }
        },
        error: function () {
            alert("Hubo un error al actualizar la cantidad.");
        },
    });
});


// Hace aparecer el titulo "Productos" de a una letra a la vez
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

// Hace el efecto de carga en el boton
document.addEventListener("DOMContentLoaded", () => {
    const botonFiltros = document.querySelector(".btn-filtros");

    if (botonFiltros) {
        botonFiltros.addEventListener("click", (e) => {
            // Mostrar el spinner y deshabilitar el botón
            botonFiltros.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Aplicando...
            `;
            botonFiltros.disabled = true;

            // Espera un tiempo breve antes de enviar el formulario
            setTimeout(() => {
                // Enviar el formulario
                botonFiltros.closest("form").submit();
            }, 500); 
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    // Función para calcular la suma total
    function calcularTotalGeneral() {
        let totalGeneral = 0;
        const totales = document.querySelectorAll('.total-producto'); // Selecciona todas las celdas de la columna "Total"
        
        // Itera sobre los valores y suma
        totales.forEach((total) => {
            const valor = parseFloat(total.textContent.replace('$', '')); // Elimina el símbolo "$" y convierte a número
            if (!isNaN(valor)) {
                totalGeneral += valor;
            }
        });
        
        // Actualiza el total general en la fila correspondiente
        const totalGeneralElemento = document.getElementById('total-general');
        totalGeneralElemento.textContent = `$${totalGeneral.toFixed(2)}`; // Formato con dos decimales
    }

    // Calcula el total general al cargar la página
    calcularTotalGeneral();

    // Opcional: recalcular cuando se actualicen los valores dinámicamente
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn_disminuir') || 
            event.target.classList.contains('btn_eliminar')) {
            setTimeout(calcularTotalGeneral, 100); // Recalcula después de que se modifiquen los valores
        }
    });
});
