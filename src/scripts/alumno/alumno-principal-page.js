// BOOK CARDS
const bookCards = document.querySelectorAll(".book-card");

// MODAL -> SHOW BOOK -> ELEMENTS

const modalShowBook = document.getElementById("modal-show-book");
const modalShowBookImg = document.getElementById("modal-book-img");
const modalShowBookTitle = document.getElementById("book-title");
const modalShowBookAuthor = document.getElementById("book-author");
const modalShowBookEditorial = document.getElementById("book-editorial");
const modalShowBookCategory = document.getElementById("book-category");
const modalShowBookSynopsis = document.getElementById("book-synopsis");

const isbnModalBook = document.getElementById("isbn-book-modal");



//MODAL -> SHOW BOOK -BUTTONS
const tramitarPrestamoBtn = document.getElementById("tramitar-prestamo-btn")


tramitarPrestamoBtn.addEventListener("click",()=>{
    // const isbnLibro = document.getElementById("isbn-book-modal").value
    modalShowBook.style.display = "none"
    modalPrestamo.style.display = "flex"

    modalFechaPrestamoInput.valueAsDate = new Date();
    modalFechaEsperadaEntregaInput.min = new Date().toISOString().split('T')[0]
    
    moadlImgPrestamoBook.setAttribute("src",modalShowBookImg.src)
    modalAuthorPrestamoBook.innerText = modalShowBookAuthor.innerText
    modalTitlePrestamoBook.innerText = modalShowBookTitle.innerText
    

})



// MODAL -> MODAL PRESTAMO - ELEMENTS

const modalPrestamo = document.getElementById("modal-prestamo")
const modalFechaPrestamoInput = document.getElementById("fecha-prestamo")
const modalFechaEsperadaEntregaInput = document.getElementById("fecha-esperada-entrega-input")
const moadlImgPrestamoBook = document.getElementById("img-book-prestamo")
const modalAuthorPrestamoBook = document.getElementById("author-book-prestamo")
const modalTitlePrestamoBook = document.getElementById("title-book-prestamo")

// BOOK CARDS ADD EVENT LISTENER

const cacheInfoBooks = {};

// SALIDAS DE MODALS
window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalShowBook:
            modalShowBook.style.display = "none";
            break;
        case modalPrestamo:
            modalPrestamo.style.display = "none"
            formPrestamo.style.display = "flex"
            break;
    }
});
//
bookCards.forEach((card) => {
    card.addEventListener("click", (event) => {
        const isbnCardBook = event.target.closest(".book-card").id;
        if (cacheInfoBooks[isbnCardBook]) {
            updateModalShowBook(cacheInfoBooks[isbnCardBook]);
        } else {
            fetch(`../../db/info-libro.php?isbn=${isbnCardBook}`)
                .then((response) => response.json())
                .then((data) => {
                    updateModalShowBook(data);
                    cacheInfoBooks[isbnCardBook] = data;
                }).catch((error)=>{
                    console.error("Error al obtener datos de info-libro.php : ", error)
                })
        }
    });
});

//

function updateModalShowBook(data) {
    isbnModalBook.value = data.isbn;
    modalShowBookImg.setAttribute("src", data.imagen);
    modalShowBookTitle.innerText = data.titulo;
    modalShowBookAuthor.innerText = data.autor;
    modalShowBookEditorial.innerText = data.editorial;
    modalShowBookCategory.innerText = data.categoria;
    modalShowBookSynopsis.innerText = data.sinopsis;
    modalShowBook.style.display = "flex";
    
}




//FORM PRESTAMO 

const formPrestamo = document.getElementById("form-prestamo")
const confirmarPrestamoBtn= document.getElementById("confirmar-prestamo-btn")
const dataContainer = document.getElementById("data-container")
const mensajeResultadoPrestamo = document.getElementById("mensaje-resultado")
confirmarPrestamoBtn.addEventListener("click",async (event) =>{
    event.preventDefault();
    const formDatos  = new FormData(formPrestamo)

    try{
        const response = await fetch("../../db/procesar-prestamo.php",{
            method: "POST",
            body: formDatos
        })

        if(!response.ok){
            throw new Error(`Error!: ${response.status}`)
        }
        
        const data = await response.json()
        formPrestamo.style.display = "none"

        if(data.exito){
            mensajeResultadoPrestamo.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`
        }else{
            mensajeResultadoPrestamo.innerHTML = `<h4 style="color: red;">${data.error}</h4>`
        }
    }catch(error){
        console.error("Error al procesar el prestamo: ", error)
        formPrestamo.style.display = "none";
        mensajeResultadoPrestamo.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`
    }
})