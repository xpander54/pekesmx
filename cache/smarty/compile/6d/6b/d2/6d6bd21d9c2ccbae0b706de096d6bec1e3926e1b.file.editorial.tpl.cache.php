<?php /* Smarty version Smarty-3.1.14, created on 2014-06-18 13:28:06
         compiled from "/home/pekesmx/www/prestashop/modules/editorial/editorial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193332178353a1da36660f56-67630170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d6bd21d9c2ccbae0b706de096d6bec1e3926e1b' => 
    array (
      0 => '/home/pekesmx/www/prestashop/modules/editorial/editorial.tpl',
      1 => 1403062211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193332178353a1da36660f56-67630170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editorial' => 0,
    'homepage_logo' => 0,
    'image_path' => 0,
    'link' => 0,
    'image_width' => 0,
    'image_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53a1da3673ff98_20805471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a1da3673ff98_20805471')) {function content_53a1da3673ff98_20805471($_smarty_tpl) {?>

<!-- Module Editorial -->
<div id="editorial_block_center" class="editorial_block">
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_home_logo_link){?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['editorial']->value->body_home_logo_link, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo stripslashes(htmlspecialchars($_smarty_tpl->tpl_vars['editorial']->value->body_title, ENT_QUOTES, 'UTF-8', true));?>
"><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['homepage_logo']->value){?><img class="img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getMediaLink($_smarty_tpl->tpl_vars['image_path']->value), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo stripslashes(htmlspecialchars($_smarty_tpl->tpl_vars['editorial']->value->body_title, ENT_QUOTES, 'UTF-8', true));?>
" <?php if ($_smarty_tpl->tpl_vars['image_width']->value){?>width="<?php echo $_smarty_tpl->tpl_vars['image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['image_height']->value){?>height="<?php echo $_smarty_tpl->tpl_vars['image_height']->value;?>
" <?php }?>/><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_home_logo_link){?></a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_logo_subheading){?><p id="editorial_image_legend"><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_logo_subheading);?>
</p><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_title){?><h1><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_title);?>
</h1><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_subheading){?><h2><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_subheading);?>
</h2><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph){?><div class="rte"><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph);?>
</div><?php }?>
</div>
<!-- /Module Editorial -->
<?php }} ?>