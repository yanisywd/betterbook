const createNav = () => {
    let nav = document.querySelector(".navbar");
    nav.innerHTML = `<div class="nav">
  
              
              <a href="demo.php" class='websitename'><h1>BetterBook </h1></a>
  
              <div class="nav-items">
              <form method="GET" action="search.php">
                 
                  <div class="search">
                  
                      <input type="search" name="s" class="search-box" placeholder="enter le nom d'un livre !">
                       <input type="submit" class="search-btn" value="recherche"> 
                      
                  </div>
                  </form>
                  <button class="button1 button5"><a href="ajouter_produit.php" class='nvprod'> Nouveaux Produit</a></button>
                  <a href="pannier.php"><img src="pannier.png" alt=""></a>
                 
              </div>
          </div>
          <ul class="links-container">
          <li class="link-item"><a href="#" class="link">Dark</a></li>
              <div>
	               <input type="checkbox" class="checkbox" id="chk" />
	               <label class="label" for="chk">
		         <div class="ball"></div>
	              </label>
              </div>
              <li class="link-item"><a href="#" class="link">Light</a></li>
              <li class="link-item"><a href="#" class="link"></a></li>
              <li class="link-item"><a href="#" class="link"> </a></li>
              <li class="link-item"><a href="#" class="link"> </a></li>
              <li class="link-item"><a href="#" class="link"> </a></li>
  
          </ul>
      `;
  };
  createNav();
  const chk = document.getElementById('chk');

  chk.addEventListener('change', () => {
	document.body.classList.toggle('light');
});
