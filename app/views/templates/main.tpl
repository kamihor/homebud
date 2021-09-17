<!doctype html>
<html lang="pl">
   
    <head>
        <title>{$page_title|default:"Tytuł domyślny"}</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css"/>
        <noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>

    </head>

    
    <body class="is-preload">
        <div id="page-wrapper">


                    <header id="header">
                        
                        {block name=header}  {/block}
                        
                    </header>
                    
                    
                    <div id="app_content" class="content">

                        {block name=content} Domyślna treść zawartości .... {/block}

                    </div>

                       
                    <footer id="footer">
                        <ul class="copyright">
                            Autor: Kamil Horzela
                            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul> 
                    </footer>


            </div>
                    
                    <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
                    
    </body>
</html>

