<!DOCTYPE html>
<html>
<?php include 'components/head.php'; ?>
<header class="mdc-top-app-bar">
  <div class="mdc-top-app-bar__row">
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
      <nav id="icon-text-tab-bar" class="mdc-tab-bar mdc-tab-bar--icons-with-text">
        <img class="logo" src="assets/we_invest-2.png"/>
      </nav>
    </section>
    <section id="iconSection" class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
      <nav id="icon-text-tab-bar" class="mdc-tab-bar mdc-tab-bar--icons-with-text">
        <a class="mdc-tab mdc-tab--with-icon-and-text" href="#login">
          <i class="material-icons mdc-tab__icon" aria-hidden="true">person</i>
          <span class="mdc-tab__icon-text">Login</span>
        </a>
        <span class="mdc-tab-bar__indicator"></span>
      </nav>
    </section>
  </div>
</header>
<body>
  <div class="general-wrapper">
    <div class="components">
      <div class="description">
        <h1>WeInvest</h1>
        <p>Your investment matchmaking machine providing first-mover digital and trusted access to opportunity-driven entrepreneurs in new markets.</p>
      </div>
      <div class="register">
        <div class="register-column">
          <a href="/register/investor">Investor</a>
          <p>As an investor you will be able to connect entrepreneurs that match your preferences.</p>
        </div>
        <div class="register-column">
          <a class="mdc-tab"><i class="material-icons mdc-tab__icon icon-black">swap horiz</i></a>
        </div>
        <div class="register-column">
          <a href="/register/entrepreneur">Entrepreneur</a>
          <p>As an entrepreneur you will be able to promote your business and build relationships with investors to attract funding.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
