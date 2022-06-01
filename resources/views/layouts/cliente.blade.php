<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://use.fontawesome.com/c53c06c750.js"></script>
    <title>Covid</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="" width="150px" >
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="">Home</a></li>
                        <li><a href="">Productos</a></li>
                        <li><a href="">Ofertas</a></li>
                        <li><a href="">contacto</a></li>
                        
                    </ul>
                </nav>
                <img src="images/cart.png" alt="" width="30px" height="30px">
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div> 
            <div class="row">
                <div class="col-2">
                    <h1>Prueba Ahora <br> Un nuevo estilo</h1>
                    <p>El Código fair play de la FIFA abraza todos los principios deportivos, morales y éticos que defiende 
                        la FIFA, y por los cuales continuará 
                        luchando en el futuro, independientemente de las influencias y presiones que pueda afrontar.
                    </p>
                    <a href="" class="btn">Explorar Ahora &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!---------categorias------------->
    <div class="categorias">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img class="img-1" src="images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img class="img-2" src="images/category-2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img class="img-3" src="images/category-3.jpg" alt="">
                </div>
                
            </div>
        </div>
    </div>
    <!---------PRODUCTOS------------->
    <div class="small-container">
        <h2 class="titulo">Productos Destacados</h2>
        <div class="row">
            <div class="col-4">
                <img  class="productos-destacados" src="images/product-1.jpg">
                <h4>Camiseta Roja</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>150.00 Bs</p> 
            </div>
            <div class="col-4">
                <img class="productos-destacados" src="images/product-2.jpg">
                <h4>Zapatillas Negras</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>300.00 Bs</p>
            </div><div class="col-4">
                <img class="productos-destacados" src="images/product-3.jpg">
                <h4>Pantallo Gucci</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>150.00 Bs</p>
            </div><div class="col-4">
                <img class="productos-destacados" src="images/product-4.jpg">
                <h4>Camiseta Puma Azul Marino</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>200.00 Bs</p>
            </div>
        </div>
        <h2 class="titulo">Ultimos Productos</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/product-5.jpg" alt="">
                <h4>Zapatillas Jordan one</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>550.00 Bs</p> 
            </div>
            <div class="col-4">
                <img src="images/product-6.jpg" alt="">
                <h4>Camiseta Puma</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>200.00 Bs</p>
            </div><div class="col-4">
                <img src="images/product-7.jpg" alt="">
                <h4>Calcetines HRX</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>50.00 Bs</p>
            </div><div class="col-4">
                <img src="images/product-8.jpg" alt="">
                <h4>Reloj Fossil</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>450.00 Bs</p>
            </div>
            <div class="col-4">
                <img src="images/product-9.jpg" alt="">
                <h4>Reloj Fossil</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>350.00 Bs</p> 
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg" alt="">
                <h4>Zapatillas Negras</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>200.00 Bs</p>
            </div><div class="col-4">
                <img src="images/product-11.jpg" alt="">
                <h4>Zapatillas Gris</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>200.00 Bs</p>
            </div><div class="col-4">
                <img src="images/product-12.jpg" alt="">
                <h4>Buso Nike</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>250.00 Bs</p>
            </div>
        </div>
    </div>
    <!---------Ofertas---------->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" alt="" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Excusivamente habilitado en Fair Play</p>
                    <h1>Smart Band 4</h1>
                    <small>La pantalla a color llega a la Xiaomi Band. Año tras año el fabricante chino ha ido renovando su 'wearable' 
                        más popular, pero han necesitado cuatro generaciones para incorporar una pantalla AMOLED a color manteniendo al mismo 
                        tiempo su ajustado precio. Hemos estado probando la nueva 
                        pulsera cuantificadora durante las últimas semanas y aquí os traemos nuestro análisis de la Xiaomi Mi Band 4.
                    </small>
                    <a href="" class="btn">Compra Ahora &#8594</a>
                </div>
            </div>
        </div>
    </div>
    <!---------testimonio---------->
    <div class="testimonio">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Evans viceDecano 2021!!!
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <img src="images/user-1.png" alt="">
                    <h3>Cristian Soliz</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Vamos CSI
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <img src="images/user-2.png" alt="">
                    <h3>Oliver Carranza</h3>
                </div><div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Diablo Decano y Evans Vicedecano, vamos CSI
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <img src="images/user-3.jpg" alt="">
                    <h3>Erick Vidal</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="marcas">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-adidas-colores.jpg" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-hunder-colores.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-nike-colores.jpg" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-puma-colores.png" alt="">
                </div>
                
            </div>
        </div>
    </div>
    <!---Footer-->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Descarga nuestra App</h3>
                    <p>Descarga la App android y IOS en tu Smartphone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png" >
                        <img src="images/app-store.png" >
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png" >
                    <p>Nuestro proposito es hacer de forma sostenible el 
                        placer del deporte accesible al dinero. 
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Enlaces utiles</h3>
                    <ul>
                        <li>Cupones</li>
                        <li>Blogs</li>
                        <li>Unete al Afiliado </li>
                        <li>Politica de Devoluciones</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Redes Sociales</h3>
                    <ul>
                        <li><i class="fa fa-facebook"> </i></li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-youtube"></i></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="author"> author: Erick Vidal-2021</p>
        </div>
    </div>

    <!----js par toggle menu------->
    <script>
        var menu=document.getElementById("MenuItems");
        menu.style.maxHeight="0px";
        function menutoggle(){
            if(menu.style.maxHeight=="0px"){
                menu.style.maxHeight="200px";
            }
            else
            {
                menu.style.maxHeight="0px";
            }
        }
    </script>

</body>
</html>