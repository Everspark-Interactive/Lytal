<?php
/*
Template Name: Attorneys Page Template
*/

get_header('inner');
?>
<?php
	while ( have_posts() ) : the_post();
		the_content();
		endwhile;
?>
<?php get_footer(); ?>