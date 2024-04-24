<?php
/*
Template Name: Thank You
*/
get_header('inner');
?>
<?php
	while ( have_posts() ) : the_post();
		the_content();
		endwhile;
?>

<?php get_footer(); ?>