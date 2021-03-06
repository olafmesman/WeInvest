<html>
<?php include 'components/head.php'; ?>
<body>
<?php include 'components/header.php'; ?>
<main>
	<body>
	  <div class="general-wrapper-feed">
	    <div class="component-wrapper-feed">
		    <h1>Your exclusive peer-group</h1>
		    <p>Here you can see the entrepreneurs that fit your criteria</p>
				<button class="mdc-button mdc-button-no-margin" onClick='location.href="/match-making-machine"'>Edit</button>
		  </div>
		 </div>
	</body>
    <?php
    foreach(fetch_all("SELECT ep.logo_url as icon_url, ep.profile_picture_url as profile_url, e.id as id, CONCAT(e.first_name, ' ', e.last_name) as name, e.email as email, ep.description as description, ep.pitch_url as pitch_url FROM entrepreneurs as e JOIN entrepreneur_profiles as ep ON e.id = ep.id") as &$user) {
        include 'components/feed-user-block.php';
    }
    ?>

</main>

<script src="/dist/app.js"></script>
</body>
</html>
