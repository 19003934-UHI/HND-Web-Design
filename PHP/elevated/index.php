<!--
    Name: Peter Pasieka
    Course: HND Computing Science
    Since: 21/04/2021
    Website Name: The Local Theatre
    Version: V1
-->

<!-- This file serves as the index page for users-->
<?php 
    // Kicks the user out if not logged in
    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
        {
            header("location:../../HTML/index.html");
            exit;
        }

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <title> The Local Theatre </title>

        <link rel = "stylesheet" type = "text/css" media = "screen" href = "../../CSS/style_desktop.css">
        <link rel = "stylesheet" type = "text/css" media = "screen" href = "../../CSS/style_ipad.css">
        <link rel = "stylesheet" type = "text/css" media = "screen" href = "../../CSS/style_iphone.css">
    </head>

    <body>

        <div class ="hero-image">
            <div class="hero-text">
                <h1> The Local Theatre </h1>
            </div>
        </div>

        <ul>
            <li><a href="index.php"> Home </a></li>
            <li><a href="contact.php"> Contact Us </a></li>
            <li><a href="blog-index.php"> Blog </a></li>
            <li style = "float:right"><a href="myaccount.php"> My Account </a></li>
        </ul>
    
    

        <div class ="block-left">
            <div class ="container">

                <h2> A brief overview </h2>

                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In varius risus velit, sed lacinia dolor gravida vel. Maecenas eget mattis sem. Donec 
                    scelerisque lectus vitae pretium pharetra. Phasellus tincidunt suscipit lorem, a pulvinar arcu aliquam et. Proin sodales ullamcorper diam, 
                    quis gravida velit tempus sit amet. Maecenas tincidunt varius ligula, id suscipit sem efficitur in. Sed eleifend porttitor mi, sit amet elementum 
                    est accumsan non. Quisque ut magna ipsum. Integer pharetra finibus purus. Quisque faucibus quam nibh, eu blandit odio accumsan in. Duis
                    non sem at augue vulputate sollicitudin. Suspendisse sagittis nisl sed ante finibus, venenatis scelerisque justo pellentesque. Integer 
                    tincidunt accumsan ipsum, eu gravida diam vulputate in. Donec quis orci sit amet nisi mollis pretium non id urna. Donec euismod sit amet 
                    turpis quis ultricies.
                    Aliquam accumsan mauris nec purus laoreet rutrum. Morbi non nibh id nunc hendrerit mollis at pretium elit. Nunc sed lacus congue, iaculis 
                    purus non, efficitur arcu. Morbi gravida sapien lectus, semper bibendum sapien convallis vel. Nunc efficitur nulla a neque facilisis aliquam. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in sagittis nisi. Duis mollis, sem sed placerat vulputate, risus arcu semper 
                    neque, eu blandit neque dolor vel ex. Curabitur ut viverra odio. Cras tincidunt turpis id purus dignissim laoreet. Ut arcu nunc, gravida sed 
                    imperdiet ut, tempus a ex. Phasellus ac nulla hendrerit, dapibus est eget, tempor elit. Nullam mollis diam a molestie facilisis. Morbi lacinia, 
                    libero vel lobortis egestas, mi lacus consectetur tortor, in cursus eros justo eu leo. Integer fringilla, mi at bibendum sodales, est risus pretium
                    mi, et condimentum velit mi eget lorem.
                    In hac habitasse platea dictumst. Nam eleifend pulvinar libero eget consectetur. Pellentesque vehicula tortor id justo dapibus, a elementum 
                    ligula dapibus. Suspendisse in iaculis ex, ut aliquam nunc. Integer condimentum, velit eget sodales ultricies, diam quam ultrices nulla, vitae 
                    pharetra nunc nisi ac odio. Sed sem ipsum, convallis convallis justo ac, pharetra fermentum nibh. Nunc tincidunt blandit elementum. Nullam 
                    et cursus lacus. Donec lacinia est at tempor consectetur. </p>

                    
            </div>
            <video-container>
                        
                    </video-container>
        </div>
            
    </body>



</html>