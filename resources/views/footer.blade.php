    <!-- /////////////////////////////////////////
         //               FOOTER               //
        /////////////////////////////////////////-->    
        <footer class="footer py-4">
            <div class="container text-center">
                <!-- Redes Sociales -->
                <div class="social-icons mb-3">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
    
                <!-- Enlaces Rápidos -->
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="#">Términos y Condiciones</a> | 
                        <a href="#">Política de Privacidad</a> | 
                        <a href="#">Ayuda</a>
                    </div>
                </div>
    
                <!-- Información de Contacto -->
                <div class="row">
                    <div class="col-12">
                        <p class="mb-1">Tel: <a href="tel:+123456789">+1 234 567 89</a></p>
                        <p>Email: <a href="mailto:contacto@ejemplo.com">contacto@ejemplo.com</a></p>
                        <p>&copy; 2024 Campify. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
    
        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        {{-- <!-- Scripts de Carrousel-->
        <script src="{{ secure_asset('/js/carrousel.js') }}"></script>

        <!-- Scripts de Carrito-->
        <script src="{{ secure_asset('/js/scriptsCarrito.js') }}"></script>

        <!-- Scripts de MeGustas-->
        <script src="{{ secure_asset('/js/scriptsMeGustas.js') }}"></script>

        <!-- Animaciones con JS -->
        <script src="{{ secure_asset('js/animaciones.js') }}"></script>

        <!-- Vista producto JS -->
        <script src="{{ secure_asset('js/vistaproducto.js') }}"></script> --}}

         <!-- Scripts de Carrousel-->
         <script src="{{asset('/js/carrousel.js') }}"></script>

         <!-- Scripts de Carrito-->
         <script src="{{asset('/js/scriptsCarrito.js') }}"></script>
 
         <!-- Scripts de MeGustas-->
         <script src="{{asset('/js/scriptsMeGustas.js') }}"></script>
 
         <!-- Animaciones con JS -->
         <script src="{{asset('js/animaciones.js') }}"></script>
 
         <!-- Vista producto JS -->
         <script src="{{asset('js/vistaproducto.js') }}"></script>
         <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>


    </body>
    
</html>