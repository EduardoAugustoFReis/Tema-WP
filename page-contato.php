<?php
// Template Name: Contato
get_header();

$id = get_the_ID();

// ================= DADOS =================
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

	<!-- MENSAGENS -->
	<?php if (!empty($_GET['success'])): ?>
		<div class="form-message success">
			Mensagem enviada com sucesso!
		</div>
	<?php endif; ?>

	<?php if (!empty($_GET['error'])): ?>
		<div class="form-message error">
			Erro ao enviar mensagem. Tente novamente.
		</div>
	<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<section class="contact-wrapper container">

				<!-- INTRO -->
				<div class="contact-intro">
					<h1><?php the_title(); ?></h1>

					<div class="contact-description">
						<?php the_content(); ?>
					</div>
				</div>

				<!-- CONTEÚDO -->
				<div class="contact-content">

					<!-- FORMULÁRIO -->
					<div class="contact-form">
						<h2><?php echo esc_html($form_titulo ?: 'Envie uma mensagem'); ?></h2>

						<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

							<input type="hidden" name="action" value="handle_contact_form">

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

							<!-- Anti-spam -->
							<input type="text" name="leaveblank" style="display:none">
							<input type="text" name="dontchange" value="http://" style="display:none">

							<p>
								<button type="submit">
									<?php echo esc_html($form_botao ?: 'Enviar'); ?>
								</button>
							</p>

						</form>
					</div>

					<!-- INFORMAÇÕES -->
					<div class="contact-info">
						<h2>Informações</h2>

						<?php if (!empty($telefone)): ?>
							<p><strong>Telefone:</strong> <?php echo esc_html($telefone); ?></p>
						<?php endif; ?>

						<?php if (!empty($email)): ?>
							<p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
						<?php endif; ?>

						<?php if (!empty($endereco) || !empty($cidade)): ?>
							<p>
								<strong>Endereço:</strong><br>
								<?php echo esc_html($endereco); ?><br>
								<?php echo esc_html($cidade); ?>
							</p>
						<?php endif; ?>

						<!-- REDES SOCIAIS -->
						<?php if (!empty($redes) && is_array($redes)): ?>
							<div class="contact-socials">
								<h3>Redes sociais</h3>
								<ul>
									<?php foreach ($redes as $rede): ?>
										<li>
											<a href="<?php echo esc_url($rede['url'] ?? '#'); ?>" target="_blank">

												<?php if (!empty($rede['icone'])): ?>
													<img
														src="<?php echo esc_url($rede['icone']); ?>"
														alt="<?php echo esc_attr($rede['nome'] ?? 'Rede social'); ?>">
												<?php else: ?>
													<?php echo esc_html($rede['nome'] ?? ''); ?>
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
				<?php if (!empty($mapa_link)): ?>
					<div class="contact-map">
						<h2>Localização</h2>

						<iframe
							src="<?php echo esc_url($mapa_link . '&output=embed'); ?>"
							width="100%"
							height="300"
							style="border:0; border-radius: 8px;"
							loading="lazy"></iframe>
					</div>
				<?php endif; ?>

			</section>

	<?php endwhile;
	endif; ?>

	<!-- SCRIPT UX -->
	<script>
		if (window.location.search.includes('success')) {
			const form = document.querySelector('.contact-form form');
			if (form) form.reset();

			// remove query string da URL
			window.history.replaceState({}, document.title, window.location.pathname);
		}
	</script>

</main>

<?php get_footer(); ?>