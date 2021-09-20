<!doctype html>
<html lang="pl">
   
    <head>
        <title>Budżet domowy</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css"/>
        <noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
    </head>

    
    <body class="is-preload">
        <div id="page-wrapper">
            <header id="header"> 
                <nav id="nav">
                
                
                    <div class="row">
                        <div class="col">
                            <ul class="alt">
                                <li style="white-space: nowrap;">
                                    <a href="{$conf->action_url}register" >Transakcje</a>
                                </li>
                                <li style="white-space: nowrap;">
                                    <a href="{$conf->action_url}categoryCalc" >Kategorie</a>
                                </li>
                                {if $user->role eq "admin"}
                                    <li style="white-space: nowrap;">
                                        <a href="{$conf->action_url}userDisplay" >Użytkownicy</a>
                                    </li>
                                {/if}
                            </ul>
                        </div>
                
                        <div class="col-1" >
                            <ul>
                                <li style="white-space: nowrap;">
                                    <span style="white-space: nowrap;">Zalogowano: {$user->login}</span>
                                </li>
                                <li style="white-space: nowrap;">
                                    <a class="button primary" href="{$conf->action_url}logout" >wyloguj</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                
        
        
                </nav>
            
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

