<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-13 21:14:02
  from 'D:\xampp\htdocs\homebud\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613fa2faae5872_83941608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c18d3bdaf9032143db65d303bd16f75a647079ff' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\templates\\main.tpl',
      1 => 1631560357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613fa2faae5872_83941608 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
   
    <head>
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css"/>
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>

    
    <body class="is-preload">
        <div id="page-wrapper">


                    <header id="header">
                        
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_961736118613fa2faae49f6_10112379', 'header');
?>

                        
                    </header>
                    
                    
                    <div id="app_content" class="content">

                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1141902843613fa2faae5263_65941902', 'content');
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
/* {block 'header'} */
class Block_961736118613fa2faae49f6_10112379 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_961736118613fa2faae49f6_10112379',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'header'} */
/* {block 'content'} */
class Block_1141902843613fa2faae5263_65941902 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1141902843613fa2faae5263_65941902',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}