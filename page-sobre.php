<?php
// Template Name: Sobre
get_header();
?>

<main class="sobre">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- HERO -->
			<section class="sobre-hero">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<div class="sobre-content">
						<?php the_content(); ?>
					</div>
				</div>
			</section>

			<?php
			$titulo_historia   = get_post_meta(get_the_ID(), 'titulo_historia', true);
			$titulo_valores    = get_post_meta(get_the_ID(), 'titulo_valores', true);
			$titulo_qualidade  = get_post_meta(get_the_ID(), 'titulo_qualidade', true);

			$historia = get_post_meta(get_the_ID(), 'historia', true);
			$missao   = get_post_meta(get_the_ID(), 'missao', true);
			$visao    = get_post_meta(get_the_ID(), 'visao', true);

			$valores = get_post_meta(get_the_ID(), 'valores', true);

			$imagem = get_post_meta(get_the_ID(), 'imagem_equipe', true);

			$imagem_qualidade = get_post_meta(get_the_ID(), 'imagem_qualidade', true);
			$itens = get_post_meta(get_the_ID(), 'qualidade_itens', true);
			?>

			<!-- HISTÓRIA -->
			<section class="sobre-historia section">
				<div class="container">

					<?php if ($titulo_historia): ?>
						<h2><?php echo esc_html($titulo_historia); ?></h2>
					<?php endif; ?>

					<?php if ($historia): ?>
						<p><?php echo esc_html($historia); ?></p>
					<?php endif; ?>

					<?php if ($missao): ?>
						<p><?php echo esc_html($missao); ?></p>
					<?php endif; ?>

					<?php if ($visao): ?>
						<p><?php echo esc_html($visao); ?></p>
					<?php endif; ?>

				</div>
			</section>

			<!-- VALORES -->
			<section class="sobre-valores section">
				<div class="container">

					<?php if ($titulo_valores): ?>
						<h2><?php echo esc_html($titulo_valores); ?></h2>
					<?php endif; ?>

					<ul>
						<?php if ($valores) :
							foreach ($valores as $valor) : ?>
								<li><?php echo esc_html($valor); ?></li>
						<?php endforeach;
						endif; ?>
					</ul>

				</div>
			</section>

			<!-- EQUIPE -->
			<section class="sobre-equipe section">
				<div class="container">
					<?php if ($imagem): ?>
						<img src="<?php echo esc_url($imagem); ?>" alt="Equipe">
					<?php endif; ?>
				</div>
			</section>

			<!-- QUALIDADE -->
			<section class="sobre-qualidade section">
				<div class="container">

					<div class="qualidade-img">
						<?php if ($imagem_qualidade): ?>
							<img src="<?php echo esc_url($imagem_qualidade); ?>" alt="Qualidade">
						<?php endif; ?>
					</div>

					<div class="qualidade-content">

						<?php if ($titulo_qualidade): ?>
							<h2><?php echo esc_html($titulo_qualidade); ?></h2>
						<?php endif; ?>

						<ul>
							<?php if ($itens) :
								foreach ($itens as $item) : ?>
									<li>
										<?php if (!empty($item['titulo'])): ?>
											<h3><?php echo esc_html($item['titulo']); ?></h3>
										<?php endif; ?>

										<?php if (!empty($item['descricao'])): ?>
											<p><?php echo esc_html($item['descricao']); ?></p>
										<?php endif; ?>
									</li>
							<?php endforeach;
							endif; ?>
						</ul>

					</div>

				</div>
			</section>

	<?php endwhile;
	endif; ?>

</main>

<?php get_footer(); ?>