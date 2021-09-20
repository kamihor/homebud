<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-18 16:31:40
  from 'D:\xampp\htdocs\homebud\app\views\CategoryEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6145f84c310f04_00509435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc5fa8f3668c6200a3dd294d81cbbc543cd05380' => 
    array (
      0 => 'D:\\xampp\\htdocs\\homebud\\app\\views\\CategoryEdit.tpl',
      1 => 1631975456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6145f84c310f04_00509435 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3649121866145f84c303211_72225173', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_3649121866145f84c303211_72225173 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3649121866145f84c303211_72225173',
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
categorySave" method="post">
                <fieldset>
                <div class="form">
                    <h4>Nazwa</h4>
                    <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" placeholder="Nazwa" />
                    
                    <h4>Oczekiwana kwota</h4>
                    <input type="text"  name="expectedamount" id="expectedamount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->expectedamount;?>
" placeholder="Oczekiwana kwota" />
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
