<form action="/" method="get" class="search-form" id="search-form">
	<div class="title-bar">
		<h4>Search</h4>
		<i class="fa fa-close" id="search-close"></i>
	</div>
	<input type="search..." name="s" value="<?php the_search_query(); ?>" placeholder="search" />
	<!-- Look into $wp_query object for all possible variables of this hidden field -->
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<select name="category_name">
		<option value="">entire site</option>
		<option>episodes</option>
		<option>diggin' in</option>
		<option>reviews</option>
		<option>tech tips</option>
	</select>
	<input value="Submit" type="submit" class="solid" alt="Search" />
</form>
