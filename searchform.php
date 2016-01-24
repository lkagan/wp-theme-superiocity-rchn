<form action="/" method="get" class="search-form" id="search-form">
	<div class="title-bar">
		<h4>Search</h4>
		<i class="fa fa-close" id="search-close"></i>
	</div>
	<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="search..." />
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<input type="hidden" name="" value="" id="selected_value">
	<select name="search_value" id="search_value">
		<option value="">entire site</option>
		<option value="RCHN">episodes</option>
		<option value="review">reviews</option>
		<option value="tech-tips">tech tips</option>
	</select>
	<input value="Submit" type="submit" class="solid" alt="Search" />
</form>
