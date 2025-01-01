@include('header')
    <div class = 'sobreNosotros mb-1'>
        <div class="filtroBorroso d-flex justify-content-evenly align-items-center">
                <div class="vectorIzq position-relative me-5 d-flex justify-content-center align-items-center">
                    <img class="vecTam opacity-75 ms-2 position-absolute" src="images/sobreNosotros/vector1.png" alt="vector" />
                    <img class="vecTam opacity-50 me-4 position-absolute" src="images/sobreNosotros/vector1.png" alt="vector" />    
                </div>
                <div class="vectorDer position-relative ms-5 d-flex justify-content-center align-items-center">
                    <img class="vecTam opacity-75 ms-2 position-absolute" src="images/sobreNosotros/vector2.png" alt="vector" />
                    <img class="vecTam opacity-50 me-4 position-absolute" src="images/sobreNosotros/vector2.png" alt="vector" />    
                </div>
           
            <h1 class="text-white fs-1 position-absolute">Sobre Nosotros</h1>
        </div>
    </div>
   
    <div class="conteiner-fluid contenedor-integrantes">
        <div id="introSobreNos" class="w-50 text-center mx-auto border-top border-4 mt-5 pb-5">
            <h2 class="fs-5 pt-3">Este proyecto es el resultado del aprendizaje, esfuerzo y trabajo en equipo de estudiantes del curso Full Stack. ¡Conoce a quienes lo hicieron posible!</h2>
        </div>
        <div class="row w-75 mx-auto perfil">
            <div class="col-sm-12 col-md-12 col-lg-6 pt-3 pb-1 mb-2 d-flex flex-column  justify-content-center align-items-center fade-in">
                <img class="fotoParticipante" src="images/perfilsebastian.jpeg" alt="fotoparticipante">
                <div class="info-itegragnte">
                    <h3 class="fs-5 mt-2 px-4">Sebastian Romero</h3>
                    <a href="https://www.linkedin.com/in/sebastian-romero1/">Linkedin</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 pt-3 pb-1 mb-2 d-flex flex-column  justify-content-center align-items-center fade-in">
                <img class="fotoParticipante" src="images/perfiljuan.jpeg" alt="fotoparticipante">
                <div class="info-itegragnte">
                    <h3 class="fs-5 mt-2 px-4">Juan Pablo Britos</h3>
                    <a href="https://www.linkedin.com/in/juan-pablo-britos/">Linkedin</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 pt-3 pb-1 mb-2 d-flex flex-column  justify-content-center align-items-center fade-in">
                <img class="fotoParticipante" src="images/1eli.2.png" alt="fotoparticipante">
                <div class="info-itegragnte">
                    <h3 class="fs-5 mt-2 px-4">Elías Olivencia</h3>
                    <a href="https://www.linkedin.com/in/elias-olivencia/">Linkedin</a>
                </div>
            </div>
        </div>
        
            
            
      

        
    </div>






@include('footer')