<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <p>Un nuevo candidato ha enviado su CV para el puesto de 
            <span>
                @if($puesto == 1)
                    Sistemas
                @elseif($puesto == 2)
                    Reponedor
                @elseif($puesto == 2)
                    Caja
                @elseif($puesto == 2)
                    Marketing
                @else
                    Seguridad
                @endif
                ({{ $puesto }})
            </span>.
        </p>        
        <p><strong>Detalles del candidato:</strong></p>
        <ul>
            <li><strong>Nombre:</strong> {{ $nombre }} {{ $apellido }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Teléfono:</strong> {{ $telefono }}</li>
        </ul>
        <p>El CV del candidato está adjunto para su revisión.</p>
        <div class="cv-link">
            <p>Puedes descargar el CV aquí:</p>
            <a href="{{ $cvPath }}" target="_blank">Descargar CV</a>
        </div>
        <p>¡Esperamos que esta información sea de utilidad!</p>
        <div>
            Este mensaje fue enviado automáticamente desde el sistema de gestión de candidatos.
        </div>
    </div>
</body>
</html>
