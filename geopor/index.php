
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
    <script>
        window.onscroll = function() { showScrollButton() };

        function showScrollButton() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollToTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollToTopBtn").style.display = "none";
        }
        }

        function scrollToTop() {
        document.body.scrollTop = 0; // Para navegadores Safari
        document.documentElement.scrollTop = 0; // Para navegadores Chrome, Firefox, IE y Opera
        }

        
        window.addEventListener('DOMContentLoaded', (event) => {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    const target = tab.dataset.target;

                    tabs.forEach((t) => {
                        t.classList.remove('active');
                    });

                    tab.classList.add('active');

                    tabContents.forEach((content) => {
                        content.classList.remove('active');
                        if (content.id === target) {
                            content.classList.add('active');
                        }
                    });
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a class="tab active" data-target="tab1" href="index.php#tab1">Inicio</a></li>
                <li><a class="tab" data-target="tab2" href="index.php#tab2">Acerca de</a></li>
                <li><a class="tab" data-target="tab3" href="visor.php">Geovisor</a></li>
                <li><a class="tab" data-target="tab4" href="index.php#tab4">Geoservicio</a></li>
                <li><a class="tab" data-target="tab5" href="index.php#tab5">Contacto</a></li>
            </ul>
        </nav>
        <!-- Resto del contenido del encabezado -->
        <selection class="textos-header">
            <h1>MUS</h1>
            <h2>A tu servicio y a tu alcance</h2>
        </selection>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,50.10 C182.47,152.83 349.20,-50.10 500.00,50.10 L500.00,150.33 L0.00,150.33 Z" style="stroke: none; fill: rgb(255, 255, 255);"></path></svg></div>
    </header>
    <main>
        <section id="tab1" class="tab-content active">
            <!-- Contenido de la pestaña Inicio -->
            <section class="contenedor sobre-nosotros">
                <h2 class="titulo"> ¿POR QUÉ ELEGIRNOS?</h2>
                <div class="contenedor-sobre-nosotros"> 
                    <img src="imagen/9.jpg" alt="" class="imagen-about-us">
                    <div class="contenido-textos">
                        <h3><span>1</span>Experiencia y conocimiento a tu servicio</h3>
                        <p> Nuestro equipo de expertos en electricidad y mecánica cuenta con años de experiencia y profundos conocimientos en el campo. Estamos comprometidos en brindar un servicio confiable, eficiente y seguro para satisfacer todas tus necesidades de reparación, mantenimiento e instalación. ¡Confía en nosotros para mantener tus sistemas en perfecto funcionamiento!</p>
                        <h3><span>2</span>Profesionales comprometidos con la excelencia</h3>
                        <p>En nuestra empresa, nos enorgullece contar con un equipo de profesionales altamente calificados y comprometidos con la excelencia en cada trabajo que realizamos. Nuestros técnicos especializados están dedicados a brindar un servicio de calidad superior, enfocándose en resolver tus problemas eléctricos y mecánicos de manera eficaz. Confía en nosotros para obtener resultados impecables y duraderos.</p>
                        <h3><span>3</span>Atención personalizada y soluciones a medida</h3>
                        <p>Reconocemos que cada cliente tiene necesidades únicas, por lo que nos esforzamos en brindar una atención personalizada y soluciones a medida. Nos tomamos el tiempo para entender tus requerimientos y ofrecerte opciones adaptadas a tu situación específica. Ya sea un problema eléctrico o mecánico, nuestro equipo se encargará de encontrar la mejor solución para ti, proporcionando un servicio confiable y satisfactorio. Tu tranquilidad y satisfacción son nuestra prioridad.</p>
                    </div>
            </div> 
            </section>
            <section class="clientes contenedor">
                <h2 class="titulo"> LO QUE DICEN NUESTROS CLIENTES </h2>
                <div class="cards">
                    <div class="card">
                        <img src="imagen/10.jpg" alt="">
                        <div class="contenido-texto-card">
                            <h4>Laura González</h4>
                            <p>"El servicio de reparación eléctrica que recibí de esta empresa fue excepcional. El técnico fue puntual, amable y resolvió el problema de manera rápida y eficiente. Recomiendo ampliamente sus servicios."</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="imagen/11.jpg" alt="">
                        <div class="contenido-texto-card">
                            <h4>Carlos Rodríguez</h4>
                            <p>"Estoy muy satisfecho con el trabajo de mantenimiento mecánico realizado por esta empresa. El equipo mostró un alto nivel de conocimiento y profesionalismo. Mi vehículo funciona mejor que nunca. Definitivamente los volveré a llamar en caso de necesitar servicios similares."</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section id="tab2" class="tab-content">
            <!-- Contenido de la pestaña Acerca de -->

            <section class="clientes contenedor">
                <h2 class="titulo"> Quienes somos </h2>
                <div class="cards1">
                    <div class="card1">
                        <img src="imagen/13.jpeg" alt="">
                        <div class="contenido-texto-card1">
                            <h4>Santiago Cusi Romero</h4>
                            <p>Como CEO de nuestra empresa, mi principal función es liderar y dirigir a nuestro equipo de profesionales altamente capacitados en electricidad y mecánica. Mi objetivo es garantizar la excelencia en cada proyecto, brindando soluciones eficientes y satisfactorias a nuestros clientes.</p>
                        </div>
                    </div>
                    <div class="card1">
                        <img src="imagen/15.jpeg" alt="">
                        <div class="contenido-texto-card1">
                            <h4>Juan David Delgado</h4>
                            <p>Como CEO de nuestra empresa, mi papel principal es liderar y guiar a nuestro talentoso equipo, mi enfoque está en garantizar la satisfacción del cliente, fomentar la excelencia en cada proyecto y establecer relaciones sólidas con nuestros clientes y la comunidad. </p>
                        </div>
                    </div>
                    <div class="card1">
                        <img src="imagen/14.jpeg" alt="">
                        <div class="contenido-texto-card1">
                            <h4>Andres Balanta</h4>
                            <p>Como Gerente de Análisis en nuestra empresa, mi rol consiste en liderar el equipo encargado de recopilar, analizar y interpretar datos clave para impulsar la toma de decisiones estratégicas.Mi objetivo es optimizar los procesos internos, identificar oportunidades de mejora y ofrecer recomendaciones basadas en datos para maximizar la eficiencia y el rendimiento de la empresa.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <section id="tab3" class="tab-content">
            <!-- Contenido de la pestaña Geovisor -->
        </section>

        <section id="tab4" class="tab-content">
            <!-- Contenido de la pestaña Geoservicio -->
        </section>

        <section id="tab5" class="tab-content">
            <section id="contacto" class="contact-section">
                <h2 class="section-title">Contacto</h2>
                <p>¡Estamos aquí para ayudarte! Si tienes alguna pregunta o necesitas nuestros servicios, no dudes en ponerte en contacto con nosotros.</p>
                <br>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <p>Teléfono: <a href="tel:+123456789">+12 345 6789</a></p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <p>Email: <a href="mailto:info@tunombredeempresa.com">cusig.mus@correoempresa.com</a></p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Dirección: Calle 1 # 54- 43, Cali, Colombia</p>
                    </div>
                </div>
                <div class="contact-form">
                    <h3>Envíanos un mensaje</h3>
                    <form>
                        <input type="text" placeholder="Nombre" required>
                        <input type="email" placeholder="Correo electrónico" required>
                        <textarea placeholder="Mensaje" required></textarea>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </section>            
        </section>
    </main>

    <footer>
        <!-- Contenido del pie de página -->
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Telefono</h4>
                <p> 23432432 </p>
                <br>
                <p>3242323</p>
                <br>
                <p>4747233</p>
            </div>
            <div class="content-foo">
                <h4>Correo</h4>
                <p> santiagocusi@hotmail.com </p>
                <br>
                <p>juandaviddelgado@hotmail.com</p>
                <br>
                <p>andresbalanta@hotmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Cargo</h4>
                <p> CEO </p>
                <br>
                <p>CEO</p>
                <br>
                <p>Gerente de analisis </p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; CUSIG | Santiago Cusi - Juan Delgado - Andres Balanta </h2>
    </footer>
<button id="scrollToTopBtn" onclick="scrollToTop()">&#8679; Subir</button>
</body>
</html>