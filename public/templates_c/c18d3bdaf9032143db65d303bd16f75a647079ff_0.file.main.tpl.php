<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-20 21:42:04
  from 'D:\xampp\htdocs\homebud\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6148e40c296846_08813203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c18d3bdaf9032143db65d303bd16f75a647079ff' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\templates\\main.tpl',
      1 => 1632166777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6148e40c296846_08813203 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
   
    <head>
        <title>Budżet domowy</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css"/>
        <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/noscript.css" /></noscript>
    </head>

    
    <body class="is-preload">
        <div id="page-wrapper">
            <header id="header"> 
                <nav id="nav">
                
                
                    <div class="row">
                        <div class="col">
                            <ul class="alt">
                                <li style="white-space: nowrap;">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register" >Transakcje</a>
                                </li>
                                <li style="white-space: nowrap;">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
categoryCalc" >Kategorie</a>
                                </li>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                                    <li style="white-space: nowrap;">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDisplay" >Użytkownicy</a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                
                        <div class="col-1" >
                            <ul>
                                <li style="white-space: nowrap;">
                                    <span style="white-space: nowrap;">Zalogowano: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</span>
                                </li>
                                <li style="white-space: nowrap;">
                                    <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" >wyloguj</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                
        
        
                </nav>
            
            </header>
                     
                    
            <div id="app_content" class="content">
                
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5750532796148e40c294c68_23645925', 'content');
?>


            </div>

                       
            <footer id="footer">
                <ul class="copyright">
                    Autor: Kamil Horzela
                    <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                </ul> 
            </footer>


        </div>
                    
        <!-- Scripts -->
	<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>
                    
    </body>
</html>

<?php }
/* {block 'content'} */
class Block_5750532796148e40c294c68_23645925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5750532796148e40c294c68_23645925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
