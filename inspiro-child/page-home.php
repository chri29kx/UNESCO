<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

<div class="inner-wrap">
	<div id="primary" class="content-area">

<?php endif ?>

		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End the loop.
			?>

		</main><!-- #main -->
		<script>
			
			document.addEventListener("DOMContentLoaded", ()=>{
			// const header = document.getElementById("site-navigation"); //Definerer en konstant til "header"
			
			window.onscroll = function () {
  scrollFunction();
}; //Når der scrolles på vinduet skal funktionen starte
			})
			


function scrollFunction() {
	console.log("hej");
	const header = document.getElementById("site-navigation"); //Definerer en konstant til "header"
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    //Hvis der er scrolled mere end 40px ->
	console.log("hej2");
    header.classList.add("scrolled"); //Får headeren classen "scrolled", som giver den en background-color
  } else {
    header.classList.remove("scrolled"); // Hvis ikke der er scrolled mere end 40px fra toppen fjernes classen
	console.log("hej3");
  }
}

		</script>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<?php
get_footer();
