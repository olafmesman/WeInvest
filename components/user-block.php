<div class="user-block-wrap">
	<div class="user-block">

		<div class="user-block__company-logo">
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
            <?php echo $user['description']; ?>
		</p>
        <?php if (!fetch_record("SELECT * FROM matches WHERE entrepreneurs_id = ".$user['id']." AND investors_id = ".$_SESSION['user_id'])): ?>
        <form action="/logic/match.php" method="POST">
            <input type="hidden" name="entrepreneur_id" value="<?php echo $user['id'] ?>" />
            <input type="hidden" name="url" value="<?php echo $request_uri[0] ?>" />
    		<button class="mdc-button mdc-button-margin margin-bottom">SEND MATCHING REQUEST</button>
        </form>
        <?php elseif (fetch_record("SELECT status FROM matches WHERE entrepreneurs_id = ".$user['id']." AND investors_id = ".$_SESSION['user_id'])['status'] == 0): ?>
            <form action="/logic/match.php" method="POST">
                <input type="hidden" name="entrepreneur_id" value="<?php echo $user['id'] ?>" />
                <input type="hidden" name="url" value="<?php echo $request_uri[0] ?>" />
        		<button class="mdc-button mdc-button-margin margin-bottom">ACCEPT MATCH</button>
            </form>
        <?php else: ?>
            <form action="/logic/match.php" method="POST">
                <input type="hidden" name="entrepreneur_id" value="<?php echo $user['id'] ?>" />
                <input type="hidden" name="url" value="<?php echo $request_uri[0] ?>" />
        		<button class="mdc-button mdc-button-margin margin-bottom">REMOVE MATCH</button>
            </form>
        <?php endif; ?>


		<div class="user-block__video-wrap">
		<iframe class="user-block__video" src="<?php echo $user['pitch_url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>

	</div>
</div>
