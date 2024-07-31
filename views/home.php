<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/styles.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/custom.css">

    <style>
        /*Animation Scroll*/
        @keyframes show {
            from {
                opacity: 0;
                scale: 25%;
            }

            to {
                opacity: 1;
                scale: 100%;

            }
        }

        section{
            view-timeline: --section;
            view-timeline-axis: block;

            animation-timeline: --section;
            animation-name: show;

            animation-range: entry 25% cover 50%;
            animation-fill-mode: both;
        }
    </style>

</head>

<body class="d-flex h-100 text-center text-dark bg-light">

    <?php include dirname(__DIR__) . "../layouts/header.php" ?>

    <?php if (isset($_SESSION['user_id'])) : ?>

        <main id="main">

            <section id="scrollspyServices" class="py-5 py-xl-8 bsb-section-py-xxl-1">
                <div class="container mb-5 mb-md-6 mb-xl-10">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                            <h2 class="display-3 fw-bolder mb-4">Obtén las <br>mejores <mark class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span class="bsb-tpl-font-hw display-1 text-accent fw-normal">soluciones</span></mark> con nuestro sistema de cotizaciones.</h2>
                        </div>
                    </div>
                </div>

                <div class="container overflow-hidden">
                    <div class="row gy-5 gx-md-4 gy-lg-0 gx-xxl-5 justify-content-center">
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-yellow text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pie-chart" viewBox="0 0 16 16">
                                    <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Análisis de Ventas</h4>
                            <p class="mb-3 text-secondary">Ayudamos a entender tus datos de ventas para identificar oportunidades de mejora y crecimiento. Ofrecemos herramientas para analizar tus cotizaciones y facturas de manera efectiva.</p>
                            <a href="#!" class="fw-bold text-decoration-none link-primary">
                                Pronto
                            </a>
                        </div>
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-green text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                    <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Diseño de Cotizaciones</h4>
                            <p class="mb-3 text-secondary">Creamos plantillas de cotizaciones personalizadas que reflejan tu identidad y necesidades. Facilitamos la creación de cotizaciones atractivas y efectivas.</p>
                            <a href="#!" class="fw-bold text-decoration-none link-primary">
                                Crear Cotizacion
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-red text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                    <path d="M14 3h-1V2a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v1H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM3 2h10v1H3V2zm11 12H2V5h12v9zM3 6h10v7H3V6z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Gestión de Facturas</h4>
                            <p class="mb-3 text-secondary">Nuestro sistema permite gestionar tus facturas de manera eficiente, asegurando el cumplimiento de los requisitos fiscales y simplificando la administración de tus documentos.</p>
                            <a href="#!" class="fw-bold text-decoration-none link-primary">
                                Ver Facturas
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </main>

    <?php else : ?>
        <section id="scrollspyHero" class="bsb-hero-2 bsb-tpl-bg-blue py-5 py-xl-8 py-xxl-10">
            <div class="container overflow-hidden">
                <div class="row gy-3 gy-lg-0 align-items-lg-center justify-content-lg-between">
                    <div class="col-12 col-lg-6 order-1 order-lg-0">
                        <h1 class="display-3 fw-bolder mb-3">Ofrecemos <br><mark class="bsb-tpl-highlight bsb-tpl-highlight-blue"><span class="bsb-tpl-font-hw display-2 text-accent fw-normal">soluciones</span></mark> para gestionar tus cotizaciones de forma sencilla y económica.</h1>
                        <p class="fs-4 mb-5">Nuestro sistema está diseñado para facilitar la administración de cotizaciones y facturas, asegurando un proceso fluido y eficiente.</p>
                        <div class="d-grid gap-2 d-sm-flex">
                            <button type="button" class="btn btn-primary bsb-btn-3xl rounded-pill"><a href="/cotizaciones_app/views/auth/register.php" class="btn btn-inline-light">Regístrate</a></button>
                            <button type="button" class="btn btn-outline-primary bsb-btn-3xl rounded-pill"><a href="/cotizaciones_app/views/auth/login.php" class="btn btn-inline-primary bsb-btn-4xl rounded-pill">Iniciar sesión</a></button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 text-center">
                        <img class="img-fluid" src="/cotizaciones_app/assets/img/preview.png">
                    </div>
                </div>
            </div>
        </section>

        <main id="main">

            <section id="scrollspyServices" class=" section py-5 py-xl-8 bsb-section-py-xxl-1">
                <div class="container mb-5 mb-md-6 mb-xl-10">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                            <h2 class="display-3 fw-bolder mb-4">Obtén las <br>mejores <mark class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span class="bsb-tpl-font-hw display-1 text-accent fw-normal">soluciones</span></mark> con nuestro sistema de cotizaciones.</h2>
                        </div>
                    </div>
                </div>

                <div class="container overflow-hidden">
                    <div class="row gy-5 gx-md-4 gy-lg-0 gx-xxl-5 justify-content-center">
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-yellow text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pie-chart" viewBox="0 0 16 16">
                                    <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Análisis de Ventas</h4>
                            <p class="mb-3 text-secondary">Ayudamos a entender tus datos de ventas para identificar oportunidades de mejora y crecimiento. Ofrecemos herramientas para analizar tus cotizaciones y facturas de manera efectiva.</p>
                            <a href="/cotizaciones_app/views/errors/401.html" class="fw-bold text-decoration-none link-primary">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-green text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                    <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Diseño de Cotizaciones</h4>
                            <p class="mb-3 text-secondary">Creamos plantillas de cotizaciones personalizadas que reflejan tu identidad y necesidades. Facilitamos la creación de cotizaciones atractivas y efectivas.</p>
                            <a href="#!" class="fw-bold text-decoration-none link-primary">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-11 col-sm-6 col-lg-3">
                            <div class="badge bsb-tpl-bg-red text-primary p-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                    <path d="M14 3h-1V2a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v1H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM3 2h10v1H3V2zm11 12H2V5h12v9zM3 6h10v7H3V6z" />
                                </svg>
                            </div>
                            <h4 class="mb-3">Gestión de Facturas</h4>
                            <p class="mb-3 text-secondary">Nuestro sistema permite gestionar tus facturas de manera eficiente, asegurando el cumplimiento de los requisitos fiscales y simplificando la administración de tus documentos.</p>
                            <a href="#!" class="fw-bold text-decoration-none link-primary">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>


        </main>

    <?php endif; ?>


    <?php include dirname(__DIR__) . "../layouts/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>