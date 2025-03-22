@include('header')
    <h1>Checkout con Mercado Pago</h1>
    
    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <button type="submit">Pagar con Mercado Pago</button>
    </form>

