<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-19 16:22:18
  from 'D:\xampp\htdocs\homebud\app\views\User.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6147479acb1c54_06092504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e8ebb11d04673bfb95b6d1c1571785c1240e16c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\User.tpl',
      1 => 1632061337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6147479acb1c54_06092504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11337243206147479ac94c50_91971826', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_11337243206147479ac94c50_91971826 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11337243206147479ac94c50_91971826',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  

    
    <div class="container">
                    <header class="major">
                        <h2>Rejestr użytkowników</h2>
                    </header>
               
    
<div class="table-wrapper">
    <table id="user" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>ID</th>
                <th>Nazwa</th>
		<th>Rola</th>
                <th>Data utworzenia</th>
                <th>Akcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["iduser"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["username"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["role"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["create_time"];?>
</td><td><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['d']->value['iduser'];?>
" >Edytuj</a><a class="abutton primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['d']->value['iduser'];?>
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
        <div class="col-6 col-12-xsmall"  style="padding-left: 28em">
             <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userNew" >Nowy</a>
        </div>
</div>
    
    </div>
 </div>
<?php
}
}
/* {/block 'content'} */
}
