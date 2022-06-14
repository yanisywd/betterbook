const createFooter=()=>{
    let footer = document.querySelector('footer');
    footer.innerHTML=`   <div class="foot-cont">
    <div>
       <h2 class="logo">BetterBook </h2>
                                    
    </div>
<div class="foot-ul">
      <ul class="category">
       <li class="cat-title">Nos produits</li>
       <li> <a href="#" class="foot-link">par Category </a></li>
        <li> <a href="#" class="foot-link">Psychology</a></li>
        <li> <a href="#" class="foot-link">investisment </a></li> 
        <li> <a href="#" class="foot-link">Enfant </a></li>                 
      </ul>
         <ul class="category">
           <li class="cat-title">a propos</li>
            <li> <a href="#" class="foot-link">Badji Mokhtar Annaba</a></li>
          <li> <a href="#" class="foot-link">Departement-informatique</a></li>
   
       </ul>
       
</div>

</div>
<span class="ha">© 2022 BetterBook | All Rights Reserved.</span> `;
}
createFooter() ;     