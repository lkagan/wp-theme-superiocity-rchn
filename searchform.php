<form action="/" method="get" class="search-form" id="search-form">
	<div class="title-bar">
		<h4>Search</h4>
		<i class="fa fa-close" id="search-close"></i>
	</div>
	<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="search..." />
	<input type="hidden" value="post" name="post_type"  />
	<input type="hidden" name="" value="" class="selected_value">
	<?php $selected_search_val = empty( $_REQUEST['search_value'] ) ? '' : $_REQUEST['search_value']; ?>
	<select name="search_value" >
		<option value="">entire site</option>
		<option value="RCHN" <?= $selected_search_val == 'RCHN' ? 'selected' : ''; ?>>episodes</option>
		<option value="review" <?= $selected_search_val == 'review' ? 'selected' : ''; ?>>reviews</option>
		<option value="tech-tips" <?= $selected_search_val == 'tech-tips' ? 'selected' : ''; ?>>tech tips</option>
	</select>
	<input value="Submit" type="submit" class="solid" alt="Search" />
</form>
