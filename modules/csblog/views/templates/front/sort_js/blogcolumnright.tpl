<!-- Blog categories -->{if $CS_SHOW_BLOCK_CATEGORY == 1 && ($CS_DISPLAY_CATEGORY == 'blogright' || $CS_DISPLAY_CATEGORY == 'blogleftright')}	<div class="block blog_categories_right" id="blog_categories_right">		{include file="./contents/blockcategories.tpl"}	</div>{/if}<!-- /Blog categories --><!-- Lastest post -->{if $CS_SHOW_BLOCK_LASTEST == 1 && ($DISPLAY_LASTEST_POST == 'blogright' || $DISPLAY_LASTEST_POST == 'blogleftright')}	<div class="block blog_lastest_posts_right" id="blog_lastest_posts_right">		{include file="./contents/blocklastestposts.tpl"}	</div>{/if}<!-- /Lastest post --><!-- /Blog current comment -->{if isset($blockcomments) && ($position == 'blogright' || $position == 'blogleftright')}	<div class="block blog_comments_right" id="blog_comments_right">		{include file="./contents/blockcomments.tpl"}	</div>{/if}<!-- /Blog current comment --><!-- Blog tags -->{if $CS_SHOW_BLOCK_TAG == 1 && ($CS_DISPLAY_TAG == 'blogright' || $CS_DISPLAY_TAG == 'blogleftright')}	<div class="block blog_tags_right" id="blog_tags_right">		{include file="./contents/blocktags.tpl"}	</div>{/if}<!-- /Blog tags -->