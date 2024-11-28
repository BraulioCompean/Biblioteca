const recomendadosButton = document.getElementById("recommended-page")
const loginButton = document.getElementById("login-container")
const modal = document.getElementById("modal")
const bookCards = document.querySelectorAll(".book-card")
const addFavoritesBtn = document.getElementById("add-favorites-btn")
const recommendedBtn = document.getElementById("recommended-btn")


const recommendSvg = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg>'
const recommendSvgPressed = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-thumb-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 3a3 3 0 0 1 2.995 2.824l.005 .176v4h2a3 3 0 0 1 2.98 2.65l.015 .174l.005 .176l-.02 .196l-1.006 5.032c-.381 1.626 -1.502 2.796 -2.81 2.78l-.164 -.008h-8a1 1 0 0 1 -.993 -.883l-.007 -.117l.001 -9.536a1 1 0 0 1 .5 -.865a2.998 2.998 0 0 0 1.492 -2.397l.007 -.202v-1a3 3 0 0 1 3 -3z" /><path d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z" /></svg>'
const favoritesSvg = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>'
const favoritesSvgPressed = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" /></svg>'
window.addEventListener("click" ,function(event){
    if(event.target == modal){
        modal.style.display = "none"
    }
})


bookCards.forEach((element)=>{  //AGREGAMOS UN EVENT LISTENER A CADA ELEMENTO QUE TENGA LA CLASE book-card
    element.addEventListener("click",()=>{
        openModalWindow() //CADA VEZ QUE SE HAGA CLICK EN UN BOOK CARD SE ABRIRA EL MODAL
    })
})



function openRecommendedBooksPage () {
    window.location = './pages/recommended-books.html'
}
recomendadosButton.addEventListener("click",() =>{
   openRecommendedBooksPage()
})



function openLoginPage(){
    window.location = './pages/login.html'
}


loginButton.addEventListener("click",()=>{
    openLoginPage()
})


function openModalWindow(){
    modal.style.display = "flex"
}

recommendedBtn.addEventListener("click" ,()=>{
    if(recommendedBtn.textContent.trim() == "Recomendar"){
        recommendedBtn.innerHTML = recommendSvgPressed + "Recomendado"
        recommendedBtn.style.backgroundColor =  "rgb(7, 91, 16)"
        recommendedBtn.style.color = "white"
    }else{
        recommendedBtn.innerHTML = recommendSvg + "Recomendar"
        recommendedBtn.style.backgroundColor = "white"
        recommendedBtn.style.color = "black"
    }
})



addFavoritesBtn.addEventListener("click" ,()=>{
    if(addFavoritesBtn.textContent.trim() == "Agregar a Favoritos"){
        addFavoritesBtn.innerHTML = favoritesSvgPressed + "Agregado a Favoritos"
        addFavoritesBtn.style.backgroundColor =  "red"
        addFavoritesBtn.style.color = "white"
    }else{
        addFavoritesBtn.innerHTML = favoritesSvg + "Agregar a Favoritos"
        addFavoritesBtn.style.backgroundColor = "white"
        addFavoritesBtn.style.color = "black"
    }
})