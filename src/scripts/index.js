const recomendadosButton = document.getElementById("recommended-page")
const loginButton = document.getElementById("login-container")
const modal = document.getElementById("modal")
const bookCards = document.querySelectorAll(".book-card")



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