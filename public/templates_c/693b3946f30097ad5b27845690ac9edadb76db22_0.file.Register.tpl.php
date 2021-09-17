<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-17 18:22:15
  from 'D:\xampp\htdocs\homebud\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6144c0b78051c1_66997834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '693b3946f30097ad5b27845690ac9edadb76db22' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\Register.tpl',
      1 => 1631895723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6144c0b78051c1_66997834 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18299424166144c0b77d7a79_44574222', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16876834906144c0b77df989_31799914', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_18299424166144c0b77d7a79_44574222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_18299424166144c0b77d7a79_44574222',
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
class Block_16876834906144c0b77df989_31799914 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16876834906144c0b77df989_31799914',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  

    
    <div class="container">
                    <header class="major">
                        <h2>Rejestr transakcji</h2>
                    </header>
                </div>
    
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
transactionEdit/<?php echo $_smarty_tpl->tpl_vars['d']->value['idtransaction'];?>
" >Edytuj</a><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionDelete/<?php echo $_smarty_tpl->tpl_vars['d']->value['idtransaction'];?>
" >Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<div class="row">
        <div class="col-6 col-12-xsmall">
            <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div class="col-6 col-12-xsmall"  style="padding-left: 30em">
             <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionNew" >Nowa</a>
        </div>
</div>
    
    </div>

<?php
}
}
/* {/block 'content'} */
}
