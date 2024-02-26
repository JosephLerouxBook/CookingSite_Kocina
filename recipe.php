<?php include('php/connexion.php');?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La cuisine des Leroux</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png" >
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css" />
  <script src="js/uikit.js"></script>
</head>

<body>
<div>
</div>
<nav class="uk-navbar-container uk-letter-spacing-small">
  <div class="uk-container">
    <div class="uk-position-z-index" data-uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="index.html">La cuisine des Leroux</a>
        <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
          <li ><a href="index.html">Home</a></li>
          <li class="uk-active"><a href="recipe.html">Recipe</a></li>
          <li ><a href="search.html">Search</a></li>
          <li ><a href="contact.html">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="uk-container">
  <div data-uk-grid>
    <div class="uk-width-1-2@s">
      <div><img class="uk-border-rounded-large" src="<?php echo $img ?>" 
        alt="Image alt"></div>
    </div>
    <div class="uk-width-expand@s uk-flex uk-flex-middle">
      <div>
        <h1><?php echo $nomRecette; ?></h1>
        <p><?php echo $description;?></p>
        <div class="uk-margin-medium-top uk-child-width-expand uk-text-center uk-grid-divider" data-uk-grid>
          <div>
            <span data-uk-icon="icon: clock; ratio: 1.4"></span>
            <h5 class="uk-text-500 uk-margin-small-top uk-margin-remove-bottom">Temps de préparation</h5>
            <span class="uk-text-small"><?php echo $activeTime;?>min</span>
          </div>
          <div>
            <span data-uk-icon="icon: future; ratio: 1.4"></span>
            <h5 class="uk-text-500 uk-margin-small-top uk-margin-remove-bottom">Temps total</h5>
            <span class="uk-text-small"><?php echo $totalTime;?>mins</span>
          </div>
          <div>
            <span data-uk-icon="icon: users; ratio: 1.4"></span>
            <h5 class="uk-text-500 uk-margin-small-top uk-margin-remove-bottom">Nombre de personnes</h5>
            <span class="uk-text-small"><?php echo $nbrPersonne;?> personnes</</span>
          </div>
        </div>
        <hr>
        <div data-uk-grid>
          <div class="uk-width-auto@s uk-text-small">
            <p class="uk-margin-small-top uk-margin-remove-bottom">Created by <a href="#"><?php echo $fullname;?></a></p>
            <span class="uk-text-muted">21 recipes</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small">
    <div class="uk-grid-large" data-uk-grid>
      <div class="uk-width-expand@m">
        <div class="uk-article">
          <h3>Comment faire ?</h3>
          <?php etapesCreator($connexion);?>
          
          <hr class="uk-margin-medium-top uk-margin-large-bottom">
          
        </div>
      </div>
      <div class="uk-width-1-3@m">
        <h3>Ingredients</h3>
        <ul class="uk-list uk-list-large uk-list-divider uk-margin-medium-top">
          <?php ingredientCreator($connexion)?>
        </ul>
        <h3 class="uk-margin-large-top">Tags</h3>
        <div class="uk-margin-medium-top" data-uk-margin>
          <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">dinner</span></a>
          <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">casserole</span></a>
          <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">party</span></a>
          <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">meat</span></a>          
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<div class="uk-section uk-section-muted">
  <div class="uk-container">
    <h3>Other Recipes You May Like</h3>
    <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-margin-medium-top" data-uk-grid>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chef John's Turkey Sloppy Joes</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">5.0</span>
                <span>(73)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by John Keller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Brown Sugar Meatloaf</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.0</span>
                <span>(94)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Danial Caleem</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Awesome Slow Cooker Pot Roast</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">4.5</span>
                <span>(153)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Janet Small</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Broiled Tilapia Parmesan</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">5.0</span>
                <span>(524)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Aleaxa Dorchest</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Baked Teriyaki Chicken</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">4.6</span>
                <span>(404)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Ben Kaller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Zesty Slow Cooker Chicken</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.9</span>
                <span>(629)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Sam Brown</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Rosemary Ranch Chicken Kabobs</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.6</span>
                <span>(149)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Theresa Samuel</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Slow Cooker Pulled Pork</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">2.9</span>
                <span>(309)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Adam Brown</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      
    </div>
  </div>
</div>

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
  -->
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index.html">Kocina</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li ><a href="index.html">Home</a></li>
      <li class="uk-active"><a href="recipe.html">Recipe</a></li>
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