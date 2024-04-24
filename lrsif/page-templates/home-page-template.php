<?php
/*
Template Name: Home Page
*/

get_header('home');
?>
<?php
	while ( have_posts() ) : the_post();
		the_content();
		endwhile;
?>

<?php get_footer(); ?>