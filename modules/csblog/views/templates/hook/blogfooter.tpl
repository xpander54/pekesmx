<!-- Blog categories -->{if $CS_SHOW_BLOCK_CATEGORY == 1 && $CS_DISPLAY_CATEGORY == 'footer'}	<div class="block blog_categories_footer" id="blog_categories_footer">		{include file="./contents/blockcategories.tpl"}	</div>{/if}<!-- /Blog categories --><!-- Lastest post -->{if $CS_SHOW_BLOCK_LASTEST == 1 && $DISPLAY_LASTEST_POST == 'footer'}	<div class="block blog_lastest_posts_footer" id="blog_lastest_posts_footer">		{include file="./contents/blocklastestposts.tpl"}	</div>{/if}<!-- /Lastest post --><!-- /Blog current comment -->{if isset($blockcomments) && $position == 'footer'}	<div class="block blog_comments_footer" id="blog_comments_footer">		{include file="./contents/blockcomments.tpl"}	</div>{/if}<!-- /Blog current comment --><!-- Blog tags -->{if $CS_SHOW_BLOCK_TAG == 1 && $CS_DISPLAY_TAG == 'footer'}	<div class="block blog_tags_footer" id="blog_tags_footer">		{include file="./contents/blocktags.tpl"}	</div>{/if}<!-- /Blog tags -->