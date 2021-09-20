<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-18 16:31:42
  from 'D:\xampp\htdocs\homebud\app\views\UserEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6145f84eb399b9_97503433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '030caa8b81702187941480a3a11f428238e9f673' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\UserEdit.tpl',
      1 => 1631975491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6145f84eb399b9_97503433 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13942418926145f84eb21b05_84578188', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_13942418926145f84eb21b05_84578188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13942418926145f84eb21b05_84578188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  
    
        <div class="container">
                    <header class="major">
                        <h2>Dane użytkownika</h2>
                    </header>
                </div>

    <div class="container">
        <section>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post">
                <fieldset>
                <div class="form">
                    <h4>Nazwa</h4>
                    <input type="text" name="username" id="username" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->username;?>
" placeholder="Nazwa użytkownika" />
                    
                    <h4>Hasło</h4>
                    <input type="password"  name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
" placeholder="Hasło" />
                    
                    <h4>Rola</h4>
                    <select name="role" id="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
">        
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
			<option ><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</option>
                         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zapisz" class="primary" /></li>
                    </ul>
          
                </fieldset>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">    
            </form>
                    <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php
}
}
/* {/block 'content'} */
}
