<?php 
// Template Name: Sobre
get_header(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php include(TEMPLATEPATH . "/inc/introducao.php"); ?>

	<section class="missao_sobre container animar-interno">
		<div class="grid-10">
			<h2 class="subtitulo-interno">História, Missão e Visão</h2>
			<p>Quando iniciamos a Bikcraft queriamos apenas um produto que adoraríamos utilizar...</p>
			<p>Conheça os nossos produtos, pergunte para os nossos clientes...</p>
		</div>

		<div class="grid-6">
			<h2 class="subtitulo-interno">Valores</h2>
			<ul>
				<li>- Qualidade no processo com</li>
				<li>- Foco no cliente sem perder a</li>
				<li>- Diversão, preservando a</li>
				<li>- Natureza com sustentabilidade</li>
			</ul>
		</div>

		<div class="grid-16 foto-equipe">
			<img src="<?php echo get_template_directory_uri(); ?>/img/equipe-bikcraft.jpg" alt="Equipe Bikcraft">
		</div>
	</section>

	<section class="qualidade container">
		<h2 class="subtitulo">Qualidade</h2>
		<img src="<?php echo get_template_directory_uri(); ?>/img/bikcraft-qualidade.png" alt="Bikcraft">

		<ul class="qualidade_lista">
			<li class="grid-1-3">
				<h3>Durabilidade</h3>
				<p>Sólida como pedra, leve como o vento...</p>
			</li>
			<li class="grid-1-3">
				<h3>Design</h3>
				<p>Feitas sob medida para o melhor conforto...</p>
			</li>
			<li class="grid-1-3">
				<h3>Sustentabilidade</h3>
				<p>Além de ajudar a cuidar do meio ambiente...</p>
			</li>
		</ul>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>