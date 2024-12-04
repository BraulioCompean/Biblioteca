const añadirBtn = document.getElementById("agregar")
const eliminarBtn = document.getElementById("eliminar")
const modalAddBook = document.getElementById("modal-add-book")
const modalDeleteBook = document.getElementById("modal-delete-book")
const buscarLibroDeleteBtn = document.getElementById("buscar-libro-delete-btn")
const modalShowInfoDeleteBook = document.getElementById("modal-show-info-delete-book")
eliminarBtn.addEventListener("click",()=>{
    modalDeleteBook.style.display = "flex"
})
añadirBtn.addEventListener("click",()=>{
    modalAddBook.style.display = "flex"
})
window.addEventListener("click" ,function(event){
    if(event.target === modalAddBook){
        modalAddBook.style.display =  "none"
    }
    if(event.target === modalDeleteBook){
        modalDeleteBook.style.display =  "none"
    }
    if(event.target  === modalShowInfoDeleteBook){
        modalShowInfoDeleteBook.style.display = "none"
    }
})

buscarLibroDeleteBtn.addEventListener("click",()=>{
    modalDeleteBook.style.display = "none"
    modalShowInfoDeleteBook.style.display = "flex"
})