<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-13 21:19:22
  from 'D:\xampp\htdocs\homebud\app\views\Hello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613fa43a32f202_00511282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b200f4a8fd99effaaa4aa227fc0216d5f7287cdf' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\Hello.tpl',
      1 => 1631560759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613fa43a32f202_00511282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1314949022613fa43a32bd60_55535910', 'header');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_1314949022613fa43a32bd60_55535910 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1314949022613fa43a32bd60_55535910',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
    <header id="header">
            <h1 style="white-space: nowrap;">
                
            </h1>
            
            <nav id="nav">
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
        
    </nav>
            
    </header>


<?php
}
}
/* {/block 'header'} */
}
