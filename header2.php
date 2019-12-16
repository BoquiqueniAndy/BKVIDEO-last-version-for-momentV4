<html>
  <div align="center">
    <h2 class="title is-4">Produits</h2>
  </div>
  <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
  </a>
  <div class="navbar-menu" id="navMenu">
    <nav class="navbar is-warning" role="navigation" aria-label="dropdown navigation">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php?action=ps3">
          PS3 &ensp;
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?action=New1">
            Nouveautés
          </a>
          <a class="navbar-item" href="index.php?action=RM1">
            Récents/Mémorables
          </a>
          <a class="navbar-item" href="index.php?action=OI1">
            Offres incroyables
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php?action=ps4">
          PS4 &ensp;
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?action=New2">
            Nouveautés
          </a>
          <a class="navbar-item" href="index.php?action=RM2">
            Récents/Mémorables
          </a>
          <a class="navbar-item" href="index.php?action=OI2">
            Offres incroyables
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php?action=pc">
          PC &ensp;
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?action=New3">
            Nouveautés
          </a>
          <a class="navbar-item" href="index.php?action=RM3">
            Récents/Mémorables
          </a>
          <a class="navbar-item" href="index.php?action=OI3">
            Offres incroyables
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php?action=xboxone">
          XBOX ONE &ensp;
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?action=New4">
            Nouveautés
          </a>
          <a class="navbar-item" href="index.php?action=RM4">
            Récents/Mémorables
          </a>
          <a class="navbar-item" href="index.php?action=OI4">
            Offres incroyables
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php?action=xbox360">
          XBOX 360 &ensp;
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?action=New5">
            Nouveautés
          </a>
          <a class="navbar-item" href="index.php?action=RM5">
            Récents/Mémorables
          </a>
          <a class="navbar-item" href="index.php?action=OI5">
            Offres incroyables
          </a>
        </div>
      </div>
  </nav>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {

    // Récupération de tous les éléments "navbar-burger
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Vérifier s'il y a des hamburgers navbar
    if ($navbarBurgers.length > 0) {

    //Ajouter un événement click sur chacun d'eux
    $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

        // Récupération de la cible à partir de l'attribut "data-target
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Commutation de la classe "is-active" à la fois sur le "navbar-burger" et sur le "navbar-menu".
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

        });
    });
    }

    });

    $(document).ready(function() {

    // Vérifier les événements de clics sur l'icône de la barre de navigation hamburger
    $(".navbar-burger").click(function() {

        // Commutation de la classe "is-active" à la fois sur le "navbar-burger" et sur le "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");

    });
    });
</script>

</html>