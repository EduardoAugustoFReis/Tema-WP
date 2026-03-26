<?php 
// Template Name: Portifolio
get_header(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php include(TEMPLATEPATH . "/inc/introducao.php"); ?>

	<section class="container animar-interno">
		<ul class="rslides">
			<li>
				<blockquote class="quote_clientes">
					<p>“Pedalar sempre foi a minha paixão, o que o pessoal da Bikcraft fez foi intensificar o meu amor por esta atividade. Recomendo à todos que amo.”</p>
					<cite>Barbara Moss</cite>
				</blockquote>
			</li>

			<li>
				<blockquote class="quote_clientes">
					<p>“Nada melhor do que dar um rolê com a minha Bikcraft na orla. Essa é a minha companheira mais fiel.”</p>
					<cite>Jhony Rato</cite>
				</blockquote>
			</li>

			<li>
				<blockquote class="quote_clientes">
					<p>“Aqueles que ainda não possuem uma Bikcraft, não sabem o que estão perdendo.”</p>
					<cite>Bernardo</cite>
				</blockquote>
			</li>
		</ul>
	</section>

	<section class="portfolio">
		<div class="container">
			<ul class="portfolio_lista rslides_portfolio">

				<li>
					<div class="grid-8">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/retro.jpg" alt="Bicicleta Retrô">
					</div>
					<div class="grid-8">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/passeio.jpg" alt="Bicicleta Passeio">
					</div>
					<div class="grid-16">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/esporte.jpg" alt="Bicicleta Esporte">
					</div>
				</li>

				<li>
					<div class="grid-8">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/passeio.jpg" alt="Bicicleta Passeio">
					</div>
					<div class="grid-8">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/retro.jpg" alt="Bicicleta Retrô">
					</div>
					<div class="grid-16">
						<img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/esporte.jpg" alt="Bicicleta Esporte">
					</div>
				</li>

			</ul>
		</div>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>