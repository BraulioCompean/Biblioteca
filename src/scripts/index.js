const recomendadosButton = document.getElementById("recommended-page")
const loginButton = document.getElementById("login-container")

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
