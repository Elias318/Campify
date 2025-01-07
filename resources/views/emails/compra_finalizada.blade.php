<!DOCTYPE html>
<html lang="en">
    <head>
        
    
    <style>
        .email-container {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}
.email-wrapper {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.email-header {
    color: #4CAF50;
    font-size: 24px;
    text-align: center;
}
.email-paragraph {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
}
.email-product-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.email-product-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}
.email-product-item:last-child {
    border-bottom: none;
}
.email-product-name {
    font-weight: bold;
}
.email-total {
    font-size: 18px;
    font-weight: bold;
    text-align: right;
    margin-top: 20px;
    color: #4CAF50;
}
.email-footer {
    margin-top: 30px;
    text-align: center;
    font-size: 14px;
    color: #777;
}
    </style>
    </head>
    <body class="email-container">
        <div class="email-wrapper">
            <h1 class="email-header">¡Gracias por tu compra, {{ $usuario['nombre_factura'] }}!</h1>
    
            <p class="email-paragraph">Hemos recibido tu pedido con los siguientes productos:</p>
    
            <ul class="email-product-list">
                @foreach ($productos as $producto)
                    <li class="email-product-item">
                        <span class="email-product-name">{{ $producto['nombre'] }}</span> - 
                        Cantidad: {{ $producto['cantidad'] }} - 
                        Precio: ${{ $producto['precio'] }}
                    </li>
                @endforeach
            </ul>
    
            <div class="email-total">Total: ${{ array_sum(array_map(fn($p) => $p['cantidad'] * $p['precio'], $productos)) }}</div>
    
            <p class="email-paragraph">Nos pondremos en contacto contigo pronto. Si tienes alguna consulta, no dudes en responder este correo.</p>
        </div>
    
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
        </div>
    </body>
    
</html>





