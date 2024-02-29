<?php include('php/indexCreator.php');?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kocima | Cooking Recipe HTML Template</title>
  <link rel="shortcut icon" type="image/png" href="" >
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css" />
  <script src="js/uikit.js"></script>
  <script src="js/hiddenForm.js"></script>
</head>

<body>

<nav class="uk-navbar-container uk-letter-spacing-small">
  <div class="uk-container">
    <div class="uk-position-z-index" data-uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="index.php">La cuisine des Leroux</a>
        <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
          <li ><a href="index.php">Acceuil</a></li>
          <li class="uk-active"><a href="recipe.html">Recette</a></li>
          <li ><a href="search.html">Recherche</a></li>
          <li ><a href="contact.html">Contacts</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="uk-container">
  <div class="uk-border-rounded-large uk-background-top-center uk-background-cover 
    uk-background-norepeat uk-light uk-inline uk-overflow-hidden uk-width-1-1" 
    style="background-image: url(https://via.placeholder.com/1200x438.jpg);">
    <div class="uk-position-cover uk-header-overlay"></div>
    <div class="uk-position-relative" data-uk-grid>
      <div class="uk-width-1-2@m uk-flex uk-flex-middle">
        <div class="uk-padding-large uk-padding-remove-right">
          <h1 class="uk-heading-small uk-margin-remove-top">Choose from thousands of recipes</h1>
          <p class="uk-text-secondary">Appropriately integrate technically sound value with scalable infomediaries
            negotiate sustainable strategic theme areas</p>
          <a class="uk-text-secondary uk-text-600 uk-text-small hvr-forward" href="sign-up.html">Sign up today<span
            class="uk-margin-small-left" data-uk-icon="arrow-right"></span></a>
        </div>
      </div>
      <div class="uk-width-expand@m">
      </div>
    </div>
  </div>
</div>

<div class="uk-section uk-section-default">
  <div class="uk-container">
    <div data-uk-grid>
      <div class="uk-width-1-4@m sticky-container">
        <div data-uk-sticky="offset: 100; bottom: true; media: @m;">
        <h2>Recipes</h2>
          <ul class="uk-nav-default uk-nav-parent-icon uk-nav-filter uk-margin-medium-top" data-uk-nav>
            <li class="uk-parent uk-open">
              <a href="#">Dish Type</a>
              <ul class="uk-nav-sub">
                <li><a href="#">Appetizers & Snacks</a></li>
                <li><a href="#">Bread Recipes</a></li>
                <li><a href="#">Cake Recipes</a></li>
                <li><a href="#">Candy and Fudge</a></li>
                <li><a href="#">Casserole Recipes</a></li>
                <li><a href="#">Christmas Cookies</a></li>
                <li><a href="#">Cocktail Recipes</a></li>
                <li><a href="#">Main Dishes</a></li>
                <li><a href="#">Pasta Recipes</a></li>
                <li><a href="#">Pie Recipes</a></li>
                <li><a href="#">Sandwiches</a></li>
              </ul>
            </li>
            <li class="uk-parent">
              <a href="#">Meal Type</a>
              <ul class="uk-nav-sub">
                <li><a href="#">Breakfast and Brunch</a></li>
                <li><a href="#">Desserts</a></li>
                <li><a href="#">Dinners</a></li>
                <li><a href="#">Lunch</a></li>
              </ul>
            </li>
            <li class="uk-parent">
              <a href="#">Diet and Health</a>
              <ul class="uk-nav-sub">
                <li><a href="#">Diabetic</a></li>
                <li><a href="#">Gluten Free</a></li>
                <li><a href="#">High Fiber Recipes</a></li>
                <li><a href="#">Low Calorie</a></li>
              </ul>
            </li>
            <li class="uk-parent">
              <a href="#">World Cuisine</a>
              <ul class="uk-nav-sub">
                <li><a href="#">Chinese</a></li>
                <li><a href="#">Indian</a></li>
                <li><a href="#">Italian</a></li>
                <li><a href="#">Mexican</a></li>
              </ul>
            </li>
            <li class="uk-parent">
              <a href="#">Seasonal</a>
              <ul class="uk-nav-sub">
                <li><a href="#">Baby Shower</a></li>
                <li><a href="#">Birthday</a></li>
                <li><a href="#">Christmas</a></li>
                <li><a href="#">Halloween</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="uk-width-expand@m">
        <div data-uk-grid>
          <div class="uk-width-expand@m">
            <form class="uk-search uk-search-default uk-width-1-1">
              <span data-uk-search-icon></span>
              <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search" placeholder="Search for recipes...">
            </form>          
          </div>
          <!--<div class="uk-width-1-3@m uk-text-right@m uk-light">
            <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary">
              <option>Sort by: Latest</option>
              <option>Sort by: Top Rated</option>
              <option>Sort by: Trending</option>
            </select>
          </div>
        </div> -->      
        <div class="uk-child-width-1-2 uk-child-width-1-3@s" data-uk-grid>
          <?php panelGenerator($connexion); ?>
        </div>
        <div class="uk-margin-large-top uk-text-small">
          <ul class="uk-pagination uk-flex-center uk-text-500 uk-margin-remove" data-uk-margin>
            <li><a href="#"><span data-uk-pagination-previous></span></a></li>
            <li><a href="#">1</a></li>
            <li class="uk-active"><span>2</span></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><span data-uk-pagination-next></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<div class="uk-section uk-section-default">
  <div class="uk-container">
    <div data-uk-grid>
      <div class="uk-width-expand">
        <h2>Videos</h2>          
      </div>
      <div class="uk-width-1-3 uk-text-right uk-light">
        <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary">
          <option>Featured</option>
          <option>Top Rated</option>
          <option>Trending</option>
        </select>
      </div>
    </div>      
    <div class="uk-child-width-1-2 uk-child-width-1-4@s" data-uk-grid>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            <div class="uk-position-center">
              <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
            </div>
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
              <div class="uk-text-xsmall">by Thomas Haller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            <div class="uk-position-center">
              <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
            </div>
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
              <div class="uk-text-xsmall">by Thomas Haller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            <div class="uk-position-center">
              <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
            </div>
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
              <div class="uk-text-xsmall">by Thomas Haller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            <div class="uk-position-center">
              <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
            </div>
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
              <div class="uk-text-xsmall">by Thomas Haller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>      
    </div>
  </div>
</div>
-->

<!--
<div class="uk-container">
  <div class="uk-background-primary uk-border-rounded-large uk-light">
    <div class="uk-width-3-4@m uk-margin-auto uk-padding-large">
      <div class="uk-text-center">
        <h2 class="uk-h2 uk-margin-remove">Be the first to know about the latest deals, receive new trending recipes &amp; more!</h2>
      </div>
      <div class="uk-margin-medium-top">
        <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true">
          <form>
            <div class="uk-grid-small" data-uk-grid>
              <div class="uk-width-1-1 uk-width-expand@s uk-first-column">
                <input type="email" placeholder="Email Address" class="uk-input uk-form-large uk-width-1-1 uk-border-pill">
              </div>
              <div class="uk-width-1-1 uk-width-auto@s">
                <input type="submit" value="Subscribe" class="uk-button uk-button-large uk-button-warning">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
	</div>
</div>
-->

<footer class="uk-section uk-section-default">
	<div class="uk-container uk-text-secondary uk-text-500">
		<div class="uk-child-width-1-2@s" data-uk-grid>
			<div>
				<a href="#" class="uk-logo">Kocina</a>
			</div>
			<div class="uk-flex uk-flex-middle uk-flex-right@s">
				<div data-uk-grid class="uk-child-width-auto uk-grid-small">
					<div>
						<a href="https://www.facebook.com/" data-uk-icon="icon: facebook; ratio: 0.8" class="uk-icon-button facebook" target="_blank"></a>
					</div>
					<div>
						<a href="https://www.instagram.com/" data-uk-icon="icon: instagram; ratio: 0.8" class="uk-icon-button instagram" target="_blank"></a>
					</div>
					<div>
						<a href="mailto:info@blacompany.com" data-uk-icon="icon: twitter; ratio: 0.8" class="uk-icon-button twitter" target="_blank"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Presentations</a></li>
					<li><a class="uk-link-text" href="#">Professionals</a></li>
					<li><a class="uk-link-text" href="#">Stores</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Webinars</a></li>
					<li><a class="uk-link-text" href="#">Workshops</a></li>
					<li><a class="uk-link-text" href="#">Local Meetups</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Our Initiatives</a></li>
					<li><a class="uk-link-text" href="#">Giving Back</a></li>
					<li><a class="uk-link-text" href="#">Communities</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Contact Form</a></li>
					<li><a class="uk-link-text" href="#">Work With Us</a></li>
					<li><a class="uk-link-text" href="#">Visit Us</a></li>
				</ul>
			</div>
		</div>
		<div class="uk-margin-medium-top uk-text-small uk-text-muted">				
			<div>Made by <a class="uk-link-muted" href="https://unbound.studio/" target="_blank">Unbound Studio</a> in Guatemala City.</div>
		</div>
	</div>
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index.html">Kocina</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li class="uk-active"><a href="index.html">Home</a></li>
      <li ><a href="recipe.html">Recipe</a></li>
      <li ><a href="search.html">Search</a></li>
      <li ><a href="contact.html">Contact</a></li>
      <li ><a href="sign-in.html">Sign In</a></li>
      <li ><a href="sign-up.html">Sign Up</a></li>
    </ul>
    <div class="uk-margin-medium-top">
      <a class="uk-button uk-width-1-1 uk-button-primary" href="sign-up.html">Sign Up</a>
    </div>
    <div class="uk-margin-medium-top uk-text-center">
      <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>