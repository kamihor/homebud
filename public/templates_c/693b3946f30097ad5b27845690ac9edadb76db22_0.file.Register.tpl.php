<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-13 22:36:50
  from 'D:\xampp\htdocs\homebud\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613fb662453921_16375857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '693b3946f30097ad5b27845690ac9edadb76db22' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\Register.tpl',
      1 => 1631565369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613fb662453921_16375857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1742446429613fb662446168_09225971', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_490832472613fb66244a475_20346329', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_1742446429613fb662446168_09225971 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1742446429613fb662446168_09225971',
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
/* {block 'content'} */
class Block_490832472613fb66244a475_20346329 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_490832472613fb66244a475_20346329',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  

<div class="table-wrapper" style="margin: 10em">
    <table id="register" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>L.p.</th>
                <th>Użytkownik</th>
		<th>Kwota</th>
		<th>Kategoria</th>
                <th>Opis</th>
		<th>Data</th>
                <th>Akcja</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["idtransaction"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["username"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["amount"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["description"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["createdate"];?>
</td><td><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" >Edytuj</a><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" >Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
    </div>

<?php
}
}
/* {/block 'content'} */
}
