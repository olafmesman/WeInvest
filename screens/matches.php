<html>
<?php include 'components/head.php'; ?>
<body>
<?php include 'components/header.php'; ?>
<main>
	<body>
        <div class="general-wrapper-feed">
            <div class="component-wrapper-feed">
		        <h1>Your matches</h1>
		    </div>
		</div>

            <div class="general-wrapper-feed">
                <div class="component-wrapper-feed">
    		        <h2>Connected</h2>
    		    </div>
    		</div>
         <?php
         foreach(fetch_all("SELECT ep.logo_url as icon_url, ep.profile_picture_url as profile_url, e.id as id, CONCAT(e.first_name, ' ', e.last_name) as name, e.email as email, ep.description as description, ep.pitch_url as pitch_url FROM
         entrepreneurs as e JOIN entrepreneur_profiles as ep ON e.id = ep.id JOIN matches as m ON e.id = m.entrepreneurs_id WHERE m.status = 1 AND m.investors_id = " . $_SESSION['user_id']) as &$user) {
             include 'components/feed-user-block.php';
         }
         ?>
             <div class="general-wrapper-feed">
                 <div class="component-wrapper-feed">
     		        <h2>Pending</h2>
     		    </div>
     		</div>
         <?php
         foreach(fetch_all("SELECT ep.logo_url as icon_url, ep.profile_picture_url as profile_url, e.id as id, CONCAT(e.first_name, ' ', e.last_name) as name, e.email as email, ep.description as description, ep.pitch_url as pitch_url FROM
         entrepreneurs as e JOIN entrepreneur_profiles as ep ON e.id = ep.id JOIN matches as m ON e.id = m.entrepreneurs_id WHERE m.status = 0 AND m.investors_id = " . $_SESSION['user_id']) as &$user) {
             include 'components/feed-user-block.php';
         }
         ?>
	</body>

</main>

<script src="/dist/app.js"></script>
</body>
</html>
