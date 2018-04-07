<div class="user-block-wrap">
	<div class="user-block">
		<div class="user-block__company-logo feed-user-logo">
			<img src="<?php echo $user['icon_url'] ?>" alt="">
		</div>
		<div class="user-block__name-picture-wrap">
			<div>
				<h1 class="user-block__name"><?php echo $user['name']; ?></h1>
				<p class="user-block__title"><?php echo $user['email']; ?></p>
			</div>
			<img class="user-block__profile-picture" src="<?php echo $user['profile_url'] ?>" alt="">
		</div>
		<p class="user-block__description">
            <?php
            if (strlen($user['description']) > 175)
                echo substr($user['description'], 0, 170) . "...";
            else
                echo $user['description'];
            ?>
		</p>
    <button class="mdc-button" onClick="location.href='/profile/e/<?php echo $user['id'] ?>'">Go to profile</button>
	</div>
</div>
