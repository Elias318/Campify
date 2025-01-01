$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        contentType: "application/json",
    },
});

$(".btn_meGusta").on('click', function (event) {
    event.preventDefault();

    const productoId = $(this).data('producto-id');
    const button = $(this);

    $.ajax({
        url: 'me-gusta/toggle', 
        method: 'POST',
        data: JSON.stringify({
            producto_id: productoId,
        }),
        contentType: "application/json",
        success: function (response) {
            if (response.session) {
                if (response.like) {
                    button.addClass('active');
                } else {
                    button.removeClass('active');
                }
            } else {
                window.location.href = "/inicioSesion";
            }
        },
        error: function () {
            alert('Hubo un error.');
        }
    });
});

$(".btn_corazonRoto").on("click", function(event){
    event.preventDefault();

    const productoId = $(this).closest("form").find("input[name='producto_id']").val();
    const filaProducto = $(`.productoMegustas-${productoId}`);

    $.ajax({
        url: 'me-gusta/destroy',
        method: "DELETE",
        data: JSON.stringify({
            producto_id: productoId,
        }),
        contentType: "application/json",
        success: function(response) {
            console.log(response.message);
            filaProducto.remove();
        },
        error: function() {
            alert();
        }
    }
    )
})

