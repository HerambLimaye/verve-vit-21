<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/error.css">
        <title>Error 500</title>
    </head>
    <body>
        <div id="start">
        <div id="layout">
            <div>
                <?php include 'navbar.php' ?>
                <div id="outer_container">
                    <div class="inner_container">
                        <div class="context">
                            <h3>Internal Server Error</h3>
                            <h1><span>5</span><span>0</span><span>0</span></h1>
                        </div>
                        <h2>Oops, something broke when loading the page you requested!</h2>
                        <a class="white" href="index">
                            <p><span class="bg"></span><span class="base"></span><span class="text">Go to Home</span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cursor"></div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>