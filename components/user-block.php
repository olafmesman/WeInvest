<div class="user-block-wrap">
	<div class="user-block">

		<div class="user-block__company-logo">
			<img src="dist/assets/images/placeholder-logo.svg" alt="">
		</div>

		<div class="user-block__name-picture-wrap">
			<div>
				<h1 class="user-block__name"><?php echo $user['name']; ?></h1>
				<p class="user-block__title"><?php echo $user['email']; ?></p>
			</div>

			<img class="user-block__profile-picture" src="dist/assets/images/placeholder-logo.svg" alt="">
		</div>

		<p class="user-block__description">
            <?php echo $user['description']; ?>
		</p>

		<div class="user-block__video-wrap">
		<iframe class="user-block__video" src="<?php echo $user['pitch_url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>

	</div>
</div>
