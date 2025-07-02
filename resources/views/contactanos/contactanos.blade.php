<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            cursor: pointer;
            transition: transform 0.3s;
            width: 50px;
            height: 50px;
        }

        .whatsapp-float img {
            width: 100%;
            height: 100%;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        /* Contact Section Styles */
        .contact__content {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact__content h5 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .contact__address ul {
            list-style-type: none;
            padding-left: 0;
        }

        .contact__address li {
            margin-bottom: 15px;
            color: #777;
            font-size: 16px;
        }

        .contact__address li h6 {
            font-weight: bold;
            color: #e01907;
        }

        .contact__address i {
            margin-right: 10px;
            color: #e01907;
        }

        .contact__form input,
        .contact__form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .contact__form button {
            padding: 15px 30px;
            background-color: #e01907;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact__form button:hover {
            background-color: #e01907;
        }

        .contact__map {
            margin-top: 30px;
            border-radius: 10px;
        }

        /* Redes sociales iconos */
        .footer__social {
            margin-top: 20px;
            display: flex;
            gap: 25px;
            font-size: 35px;
            justify-content: center;
        }

        .footer__social a {
            color: #555;
            transition: color 0.3s;
            display: inline-block;
            padding: 10px;
        }

        .footer__social a:hover {
            color: #e01907;
            transform: scale(1.2);
        }

        /* Layout en formato horizontal */
        .contact-section {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-section .col-lg-6 {
            flex: 1;
            width: 48%;
        }

        /* Estilos para el mapa */
        .contact__map iframe {
            width: 90%;
            height: 800px;
            border-radius: 10px;
        }

        .contact__header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f7f4f4;
            /* Rojo suave */
            padding: 1px;
            border-radius: 8px;
            margin-bottom: 20px;
            
        }

        .contact__header img {
    width: 200px; /* Puedes ajustar el tamaño según necesites */
    height: auto;
}

        .contact__icon {
            width: 100px;
            /* Ajusta el tamaño de la imagen */
            height: 100px;
            /* Ajusta el tamaño de la imagen */
            object-fit: contain;
        }
    </style>
</head>
   
<body>
   
@extends('layouts.app')
@section('content')

 
    <section class="contact spad">
        <div class="container">
            <div class="contact-section">
                <div class="col-lg-6">
                    <div class="contact__content">
                        <!-- Borde y la imagen como icono encima de la sección de información de contacto -->
                        <div class="contact__header">
                            <img src="imagenes/logo.png" alt="Icono de Contacto" class="contact__icon" /> <!-- Aquí va tu imagen -->
                        </div>

                        <div class="contact__address">
                            <h5>Contacto info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker-alt"></i> Dirección</h6>
                                    <p>Caracas 498, Ica 11002</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone-alt"></i> Teléfono</h6>
                                    <p>985748483 | 125-668-886</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Soporte</h6>
                                    <p>boticamyryan@gmail.com</p>
                                </li>
                            </ul>
                        </div>

                        <div class="contact__form">
                            <h5>Enviar mensaje</h5>
                            <form action="#">
                                <input type="text" placeholder="Nombre">
                                <input type="email" placeholder="Email">
                              
                                <textarea placeholder="Mensaje"></textarea>
                                <button type="submit" class="site-btn">Enviar mensaje</button>
                            </form>
                        </div>

                        <div class="footer__social">
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5044.068751925154!2d-75.7056514938535!3d-14.036814810441033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9111033b8b9d0279%3A0xceb84290babbfbda!2sBOTICA%20MYRYAN!5e0!3m2!1ses-419!2spe!4v1749044707979!5m2!1ses-419!2spe"
                            height="780" style="border:0" allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- WhatsApp Button -->
    <a href="https://wa.me/1234567890" class="whatsapp-float" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1022px-WhatsApp.svg.png" alt="WhatsApp">
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @endsection
</body>

</html>