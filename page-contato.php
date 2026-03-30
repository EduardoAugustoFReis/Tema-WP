<?php
// Template Name: Contato
get_header();

$id = get_the_ID();

$telefone = get_post_meta($id, 'contato_telefone', true);
$email = get_post_meta($id, 'contato_email', true);
$endereco = get_post_meta($id, 'contato_endereco', true);
$cidade = get_post_meta($id, 'contato_cidade', true);
$redes = get_post_meta($id, 'contato_redes', true);

$form_titulo = get_post_meta($id, 'contato_form_titulo', true);
$form_botao = get_post_meta($id, 'contato_form_botao', true);

$mapa_link = get_post_meta($id, 'contato_mapa_link', true);

?>

<main>
	<?php if (isset($_GET['success'])): ?>
		<div class="form-message success">
			Mensagem enviada com sucesso!
		</div>
	<?php endif; ?>

	<?php if (isset($_GET['error'])): ?>
		<div class="form-message error">
			Erro ao enviar mensagem. Tente novamente.
		</div>
	<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="contact-wrapper container">
				<!-- INTRODUÇÃO -->
				<div class="contact-intro">
					<h1><?php the_title(); ?></h1>
					<div>
						<?php the_content(); ?>
					</div>
				</div>

				<!-- CONTATO -->
				<div class="contact-content">

					<!-- FORMULÁRIO -->
					<div class="contact-form">
						<h2><?php echo esc_html($form_titulo ?: 'Envie uma mensagem'); ?></h2>

						<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
							<input type="hidden" name="action" value="contato_form">

							<?php wp_nonce_field('contato_form_action', 'contato_form_nonce'); ?>

							<p>
								<label for="nome">Nome</label><br>
								<input id="nome" name="nome" type="text" required>
							</p>

							<p>
								<label for="email">E-mail</label><br>
								<input id="email" name="email" type="email" required>
							</p>

							<p>
								<label for="telefone">Telefone</label><br>
								<input id="telefone" name="telefone" type="text">
							</p>

							<p>
								<label for="mensagem">Mensagem</label><br>
								<textarea name="mensagem" id="mensagem" rows="5" required></textarea>
							</p>

							<!-- anti-spam -->
							<input type="text" name="leaveblank" style="display:none">
							<input type="text" name="dontchange" value="http://" style="display:none">

							<p>
								<button type="submit"><?php echo esc_html($form_botao ?: 'Enviar'); ?></button>
							</p>

						</form>
					</div>

					<!-- INFORMAÇÕES -->
					<div class="contact-info">
						<h2>Informações</h2>

						<?php if ($telefone): ?>
							<p><strong>Telefone:</strong> <?php echo esc_html($telefone); ?></p>
						<?php endif; ?>

						<?php if ($email): ?>
							<p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
						<?php endif; ?>

						<?php if ($endereco || $cidade): ?>
							<p>
								<strong>Endereço:</strong><br>
								<?php echo esc_html($endereco); ?><br>
								<?php echo esc_html($cidade); ?>
							</p>
						<?php endif; ?>

						<?php if ($redes): ?>
							<div class="contact-socials">
								<h3>Redes sociais</h3>
								<ul>
									<?php foreach ($redes as $rede): ?>
										<li>
											<a href="<?php echo esc_url($rede['url']); ?>" target="_blank">
												<?php if (!empty($rede['icone'])): ?>
													<img src="<?php echo esc_url($rede['icone']); ?>" alt="">
												<?php else: ?>
													<?php echo esc_html($rede['nome']); ?>
												<?php endif; ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

					</div>

				</div>

				<!-- MAPA -->
				<div class="contact-map">
					<h2>Localização</h2>

					<?php if ($mapa_link): ?>
						<iframe
							src="<?php echo esc_url($mapa_link . '&output=embed'); ?>"
							width="100%"
							height="300"
							style="border:0; border-radius: 8px;"
							loading="lazy">
						</iframe>
					<?php endif; ?>
				</div>
			</section>

	<?php endwhile;
	endif; ?>

	<script>
		if (window.location.search.includes('success')) {
			const form = document.querySelector('.contact-form form');
			if (form) form.reset();
		}
	</script>

</main>

<?php get_footer(); ?>