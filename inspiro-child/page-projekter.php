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

get_header();
?>
			<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="textalligncenter">
			<h1>Projekter indsendt fra UNESCO verdensmålsskoler</h1>
			<p>Projekterne er alle med udgangspunkt i FNs 17 verdensmål og kan bruges som inspiration og motivation samt udgøre grundlaget for eksempelvis skoleprojekter, undersøgelser eller lignende.</p>
			<h2 id="overskrift">Filtrer verdensmål:</h2>
			</div>
			<button id="filterValg">Vælg et verdensmål ↓</button>
			<nav id="filtrering"></nav>
			<section id="maal-oversigt"></section>
			

			<template>
				<article>
					<h3></h3>
					<img src="" alt="">
					<p class="formaal"></p>
					<p class="teaser"></p>
					<p class="pris"></p>
				</article>
			</template>
<script>

let maal;
let categories;
let filterMaal = "alle";


const url = "https://mgoltermann.dk/kea/09_CMS/unesco-wp/wp-json/wp/v2/projekt?per_page=100";
const catUrl = "https://mgoltermann.dk/kea/09_CMS/unesco-wp/wp-json/wp/v2/categories?per_page=100";


const liste = document.querySelector("#maal-oversigt");
const skabelon = document.querySelector("template");
// let filterMaal = "alle"
document.querySelector("DOMContentLoaded", start)




function start(){
	getJson();
}
			async function getJson() {
			let response = await fetch(url);
			let catdata = await fetch(catUrl);
			maal = await response.json();
			categories = await catdata.json();
			console.log(categories);
			visMaal();
			document.querySelector("#filterValg").addEventListener("click", opretKnapper)
			// opretKnapper();
		}
		function opretKnapper(){
			document.querySelector("#filterValg").removeEventListener("click", opretKnapper)
				document.querySelector("#filtrering").innerHTML = `<button data-maal="alle">Vis alle projekter</button>`
			categories.forEach(cat =>{
				
			document.querySelector("#filtrering").innerHTML += `<button class="filter" data-maal="${cat.id}">${cat.name}</button>`
			})
			addEventListenersToButtons();
		}

		function addEventListenersToButtons(){
	document.querySelectorAll("#filtrering button").forEach(elm =>{
		elm.addEventListener("click", filtrering);
	})
};
		function filtrering(){
			filterMaal = this.dataset.maal;
			console.log(filterMaal)
document.querySelector("#filtrering").innerHTML = "";
document.querySelector("#filterValg").addEventListener("click", opretKnapper)

			visMaal();
		}

		function visMaal() {
			console.log(maal);
		}
		getJson();

		function visMaal(){
			console.log(maal);
			let temp = document.querySelector("template");
			let container = document.querySelector("#maal-oversigt");
			container.innerHTML = "";
			maal.forEach(maal => {
				if ( filterMaal == "alle" || maal.categories.includes(parseInt(filterMaal))){
				const klon = skabelon.cloneNode(true).content;
				klon.querySelector("h3").textContent = maal.title.rendered;
				// klon.querySelector(".formaal").textContent = maal.formaal;
				klon.querySelector("img").src = maal.billede.guid;
				klon.querySelector(".teaser").textContent = maal.teaser_tekst;
				klon.querySelector("article").addEventListener("click", () => {location.href=maal.link;})
				liste.appendChild(klon);
				}
			})
		}

</script>


<?php



get_footer();
