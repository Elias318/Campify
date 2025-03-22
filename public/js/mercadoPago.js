const mp = new MercadoPago("{{env('MERCADO_PAGO_PUBLIC_KEY')}}");



document.getElementById('checkout-btn').addEventListener('clic"k', function() {
    const cantidad = parseInt(document.getElementById('quantity').value, 10);
    const nombre = document.getElementById('phone').value;
    const telefono = document.getElementById('phone').value;
    const direccion = document.getElementById('address').value;

    if (!cantidad || !telefono || !direccion) {
        Swal.fire({
            title: 'Error!',
            text: 'Por favor, completa todos los campos del formulario.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    const orderData = {
        product: [{
            id: document.getElementById('product_id').value,
            title: document.querySelector('.product-name').innerText,
            description: 'Descripción del producto', // Puedes ajustar esto si tienes más información
            currency_id: "USD",
            quantity: cantidad,
            unit_price: parseFloat(document.getElementById('product_price').value),
        }],
        name: nombre,
        surname: '', // Si tienes un campo de apellido, añádelo aquí
        email: '', // Agrega el correo electrónico si es necesario
        phone: telefono,
        address: direccion,
    };

    console.log('Datos del pedido:', orderData);

    fetch('/create-preference', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(orderData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(preference => {
            if (preference.error) {
                throw new Error(preference.error);
            }
            mp.checkout({
                preference: {
                    id: preference.id // Asegúrate de que esta línea sea correcta
                },
                autoOpen: true
            });
            console.log('Respuesta de la preferencia:', preference);
        })
        .catch(error => console.error('Error al crear la preferencia:', error));
});