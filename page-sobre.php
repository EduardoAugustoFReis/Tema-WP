<?php
// Template Name: Sobre
get_header();
?>

<main class="sobre">

	<?php if (have_posts()) : while (have_posts()) : the_post();

			$id = get_the_ID();

			// ================= DADOS =================
			$titulo_historia   = get_post_meta($id, 'titulo_historia', true);
			$titulo_valores    = get_post_meta($id, 'titulo_valores', true);
			$titulo_qualidade  = get_post_meta($id, 'titulo_qualidade', true);

			$historia = get_post_meta($id, 'historia', true);
			$missao   = get_post_meta($id, 'missao', true);
			$visao    = get_post_meta($id, 'visao', true);

			$valores = get_post_meta($id, 'valores', true);

			$imagem = get_post_meta($id, 'imagem_equipe', true);

			$imagem_qualidade = get_post_meta($id, 'imagem_qualidade', true);
			$itens = get_post_meta($id, 'qualidade_itens', true);
	?>

			<!-- HERO -->
			<section class="sobre-hero">
				<div class="container">

					<h1><?php the_title(); ?></h1>

					<div class="sobre-content">
						<?php the_content(); ?>
					</div>

				</div>
			</section>

			<!-- HISTÓRIA -->
			<?php if (!empty($titulo_historia) || !empty($historia) || !empty($missao) || !empty($visao)) : ?>
				<section class="sobre-historia section">
					<div class="container">

						<?php if (!empty($titulo_historia)) : ?>
							<h2><?php echo esc_html($titulo_historia); ?></h2>
						<?php endif; ?>

						<?php if (!empty($historia)) : ?>
							<p><?php echo esc_html($historia); ?></p>
						<?php endif; ?>

						<?php if (!empty($missao)) : ?>
							<p><?php echo esc_html($missao); ?></p>
						<?php endif; ?>

						<?php if (!empty($visao)) : ?>
							<p><?php echo esc_html($visao); ?></p>
						<?php endif; ?>

					</div>
				</section>
			<?php endif; ?>

			<!-- VALORES -->
			<?php if (!empty($valores) && is_array($valores)) : ?>
				<section class="sobre-valores section">
					<div class="container">

						<?php if (!empty($titulo_valores)) : ?>
							<h2><?php echo esc_html($titulo_valores); ?></h2>
						<?php endif; ?>

						<ul>
							<?php foreach ($valores as $valor) : ?>
								<li><?php echo esc_html($valor); ?></li>
							<?php endforeach; ?>
						</ul>

					</div>
				</section>
			<?php endif; ?>

			<!-- EQUIPE -->
			<?php if (!empty($imagem)) : ?>
				<section class="sobre-equipe section">
					<div class="container">
						<img
							src="<?php echo esc_url($imagem); ?>"
							alt="Equipe da empresa">
					</div>
				</section>
			<?php endif; ?>

			<!-- QUALIDADE -->
			<?php if (!empty($itens) || !empty($imagem_qualidade) || !empty($titulo_qualidade)) : ?>
				<section class="sobre-qualidade section">
					<div class="container">

						<?php if (!empty($imagem_qualidade)) : ?>
							<div class="qualidade-img">
								<img
									src="<?php echo esc_url($imagem_qualidade); ?>"
									alt="Qualidade">
							</div>
						<?php endif; ?>

						<div class="qualidade-content">

							<?php if (!empty($titulo_qualidade)) : ?>
								<h2><?php echo esc_html($titulo_qualidade); ?></h2>
							<?php endif; ?>

							<?php if (!empty($itens) && is_array($itens)) : ?>
								<ul>
									<?php foreach ($itens as $item) : ?>
										<li>

											<?php if (!empty($item['titulo'])) : ?>
												<h3><?php echo esc_html($item['titulo']); ?></h3>
											<?php endif; ?>

											<?php if (!empty($item['descricao'])) : ?>
												<p><?php echo esc_html($item['descricao']); ?></p>
											<?php endif; ?>

										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

						</div>

					</div>
				</section>
			<?php endif; ?>

	<?php endwhile;
	endif; ?>

</main>

<?php get_footer(); ?>