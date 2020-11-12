<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" onclick="$('#content').load('content.php');"> Barbearia Xavier</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-white" href="#portfolio">Portfólio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white"  onclick="$('#content').load('contato.php');">Contato</a>
      </li> 
    </ul>
  </div>  
</nav>