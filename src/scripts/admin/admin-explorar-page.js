// ------------------------------------------------------------------------------------------------
// MODAL -> MOSTRAR LIBRO -> ELEMENTOS -> GENERAL PARA TODOS LOS USUARIOS

const modalMostrarLibro = document.getElementById("modal-libro");
const modalMostrarLibro_imagen = document.getElementById("modal-img-libro");
const modalMostrarLibro_titulo = document.getElementById("libro-titulo");
const modalMostrarLibro_autor = document.getElementById("libro-autor");
const modalMostrarLibro_editorial = document.getElementById("libro-editorial");
const modalMostrarLibro_categoria = document.getElementById("libro-categoria");
const modalMostrarLibro_sinopsis = document.getElementById("libro-sinopsis");

const modalMostrarLibro_isbn = document.getElementById("isbn-modal-mostrar-libro");


const botonesCategoria = document.querySelectorAll(".botones-categoria")

const librosContainer = document.getElementById("libros-container")
botonesCategoria.forEach((botonCategoria)=>{
    botonCategoria.addEventListener("click",(event)=>{
        const nombreCategoria = event.target.innerText;
        // console.log(event.target.innerText)
        librosContainer.innerHTML = ""
        fetch(`../../db/info-libro-categoria.php?categoria=${nombreCategoria}`)
            .then((response)=> response.json())
            .then((data)=>{
                console.log(data)
                data.forEach((libro) => {
                    librosContainer.innerHTML = librosContainer.innerHTML + `<div class="book-card" id = "${libro.isbn}">
                                    <img
                                        src="${libro.imagen}"
                                        alt=""
                                        class="img-book-card"
                                    />
                                    <div class="book-card-info-container">
                                        <h4 class="book-name">
                                            ${libro.titulo}
                                        </h4>
                                        <h5>' ${libro.autor}'</h5>
                                    </div>
                                </div>`
                });
            })
            .catch((error)=>{
                console.error(error)
            })
    })
})


// BOOK CARDS

const bookCards = document.querySelectorAll(".book-card")

const cacheInfoLibros = {}


// FUNCION PARA CARGAR CON LOS DATOS DEL LIBRO SELECCIONADO EL MODAL MOSTRAR LIBRO

function actualizarModalMostrarLibro(data) {
    modalMostrarLibro_isbn.value = data.isbn;
    modalMostrarLibro_imagen.setAttribute("src", data.imagen);
    modalMostrarLibro_titulo.innerText = data.titulo;
    modalMostrarLibro_autor.innerText = `Por :  ${data.autor}`;
    modalMostrarLibro_editorial.innerText = `Editorial: ${data.editorial}`;
    modalMostrarLibro_categoria.innerText =`Categoria:  ${data.categoria}`;
    modalMostrarLibro_sinopsis.innerText = data.sinopsis;
    modalMostrarLibro.style.display = "flex";
}


bookCards.forEach((card) => {
    card.addEventListener("click", (event) => {
        const isbnCardBook = event.target.closest(".book-card").id;
        if (cacheInfoLibros[isbnCardBook]) {
            actualizarModalMostrarLibro(cacheInfoLibros[isbnCardBook]);
        } else {
            fetch(`../../db/info-libro.php?isbn=${isbnCardBook}`)
                .then((response) => response.json())
                .then((data) => {
                    actualizarModalMostrarLibro(data);
                    cacheInfoLibros[isbnCardBook] = data;
                })
                .catch((error) => {
                    console.error(
                        "Error al obtener datos de info-libro.php : ",
                        error
                    );
                });
        }
    });
});
// ------------------------------------------------------------------------------------------------




window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro:
            modalMostrarLibro.style.display = "none";
            break;
        
    }
});
