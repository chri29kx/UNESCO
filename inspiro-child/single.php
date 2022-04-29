<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main container-fluid" role="main">

	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		$previous_post = get_previous_post();

		if ( $previous_post ) {
			$prev_image     = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), 'inspiro-featured-image' );
			$previous_cover = '';

			if ( $prev_image && isset( $prev_image[0] ) ) {
				$previous_cover = '<div class="previous-cover" style="background-image: url(' . esc_url( $prev_image[0] ) . ')"></div>';

				echo '<div class="previous-post-cover">';

				the_post_navigation(
					array(
						'prev_text' => '<div class="previous-info">' . $previous_cover . '<div class="previous-content"><span class="screen-reader-text">' . __( 'Previous Post', 'inspiro' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'inspiro' ) . '</span> <span class="nav-title">%title</span></div></div>',
						'next_text' => '',
					)
				);

				echo '</div><!-- .previous-post-cover -->';
			}
		}
	endwhile; // End the loop.
	?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

				<article id="singleview_artikel">
					
					<section class="flexsection">
							
							<img src="" alt="" class="billede">
							<div>
							<h1 id="entrytittel"></h1>
							<div class="gulbox">
					<div class="content_gulbox">
					<h4 class="fokus"></h4>
					<h4 class="uddannelsestrin"></h4>
					<h4 class="skolenavn"></h4>
					<h4 class="kontaktperson"></h4>
					</div>
				</div>
				</div>
					</section>
				
				
		
					<h3 class="formaal_h3"></h3>
					<p class="formaal"></p>
				
				
				<div>
					<h3 class="beskrivelseprojekt"></h3>
					<p class="beskrivelse_af_projekt"></p>
				</div>
				
					<section id="elev_larer_content">
					<div class="gulbox">
					<h3 class="tillarne"></h3>
					<p class="larene"></p>
					</div>
					<div class="gulbox">
					<h3 class="tileleven"></h3>
					<p class="eleven"></p>
					</div>
					</section>
				</article>
			</main>

<script> 

let maal;
const dbUrl = "https://mgoltermann.dk/kea/09_CMS/unesco-wp/wp-json/wp/v2/projekt/"+<?php echo get_the_ID()?>;


async function getJson() {
	const data = await fetch (dbUrl);
maal = await data.json();
visMaal(); 
}

//vis data om retten

function visMaal(){
	document.querySelector("#entrytittel").textContent = maal.title.rendered;
	document.querySelector(".fokus").textContent = "Fokusområde: " + maal.fokus;
	document.querySelector(".uddannelsestrin").textContent = "Uddannelsestrin: " + maal.uddannelsestrin;
	document.querySelector(".skolenavn").textContent = "Skolenavn: " + maal.skolenavn;
	document.querySelector(".kontaktperson").textContent = "Kontaktperson: " + maal.kontaktperson;
	document.querySelector(".billede").src = maal.billede.guid;
	document.querySelector(".formaal_h3").textContent = "Formål:";
	document.querySelector(".formaal").textContent = maal.formaal;
	document.querySelector(".beskrivelseprojekt").textContent = "Projekt beskrivelse:";
	document.querySelector(".beskrivelse_af_projekt").textContent = maal.beskrivelse_af_projekt;
	document.querySelector(".tillarne").textContent = "Til lærene:";
	document.querySelector(".larene").textContent = maal.til_laarerne;
	document.querySelector(".tileleven").textContent = "Til eleven:";
	document.querySelector(".eleven").textContent = maal.til_eleven;
}
getJson();
</script>
</section>


	


</main><!-- #main -->

<?php
get_footer();
