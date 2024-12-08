// MODAL -> MOSTRAR LIBRO -> ELEMENTOS

const modalMostrarLibro = document.getElementById("modal-libro");
const modalMostrarLibro_imagen = document.getElementById("modal-img-libro");
const modalMostrarLibro_titulo = document.getElementById("libro-titulo");
const modalMostrarLibro_autor = document.getElementById("libro-autor");
const modalMostrarLibro_editorial = document.getElementById("libro-editorial");
const modalMostrarLibro_categoria = document.getElementById("libro-categoria");
const modalMostrarLibro_sinopsis = document.getElementById("libro-sinopsis");

const modalMostrarLibro_isbn = document.getElementById("isbn-modal-mostrar-libro");


// BOTON PARA ABRIR EL MODAL DE TRAMITAR PRESTAMO

const openTramitarPrestamo = document.getElementById("tramitar-prestamo-btn")


openTramitarPrestamo.addEventListener("click",()=>{
    modalTramitarPrestamo_fechaDevolcion.min = new Date().toISOString().split("T")[0];
    modalTramitarPrestamo_isbn.value = modalMostrarLibro_isbn.value
    modalTramitarPrestamo_imagenLibro.setAttribute("src",modalMostrarLibro_imagen.src)
    modalTramitarPrestamo_titulo.innerText = modalMostrarLibro_titulo.innerText;
    modalTramitarPrestamo_autor.innerText = modalMostrarLibro_autor.innerText;
    modalTramitarPrestamo.style.display = "flex"
    modalMostrarLibro.style.display = "none"

})
// OBTENEMOS TODAS LAS CARDS DE LOS LIBROS

const bookCards = document.querySelectorAll(".book-card")
// OBJETO PARA ALMACENAR LOS DATOS DE LOS LIBROS TEMPORALMENTE, ESTO PARA MEJROAR EL RENDIMIENTO
const cacheInfoLibros = {}


// FUNCION PARA ACTUALIZAR LOS DATOS DEL MODAL MOSTRAR LIBRO CON LOS DATOS DEL LIBRO SELECCIONADO

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

// LE AGREGAMOS UN EVENTLISTENER A CADA BOOK CARD PARA QUE CUANDO SE DE CLICK, TE CARGUE EL MODAL MOSTRAR LIBRO CON SUS RESPECTIVOS DATOS
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


// MODAL -> PRESTAMO -> ELEMENTOS
const modalTramitarPrestamo = document.getElementById("modal-prestamo");
const modalTramitarPrestamo_fechaDevolcion = document.getElementById("fecha-esperada-entrega-input");
const modalTramitarPrestamo_imagenLibro = document.getElementById("imagen-libro-prestamo");
const modalTramitarPrestamo_autor = document.getElementById("autor-libro-prestamo");
const modalTramitarPrestamo_titulo = document.getElementById("titulo-libro-prestamo");

const modalTramitarPrestamo_isbn = document.getElementById("isbn-prestamo-libro")



const confirmarPrestamoBtn = document.getElementById("confirmar-prestamo-btn")



const formPrestamo = document.getElementById("form-prestamo");
const dataContainer = document.getElementById("data-container");
const mensajeResultadoPrestamo = document.getElementById("mensaje-container-prestamo");


confirmarPrestamoBtn.addEventListener("click", async (event) => {
    event.preventDefault();
    const formDatos = new FormData(formPrestamo);
    if(!modalTramitarPrestamo_fechaDevolcion){
        mensajeResultadoPrestamo.style.display = "flex";
        mensajeResultadoPrestamo.innerHTML = `<h4 style="color: red;">Por favor, selecciona una fecha de devolución.</h4>`;
        formPrestamo.style.display = "none"
        return;
    }
    try {
        const response = await fetch("../../db/procesar-prestamo.php", {
            method: "POST",
            body: formDatos,
        });

        if (!response.ok) {
            throw new Error(`Error!: ${response.status}`);
        }

        const data = await response.json();
        formPrestamo.style.display = "none";

        if (data.exito) {
            mensajeResultadoPrestamo.style.display = "flex"
            mensajeResultadoPrestamo.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            mensajeResultadoPrestamo.style.display = "flex"
            mensajeResultadoPrestamo.innerHTML = `<h4 style="color: red;">${data.error}</h4>`;
        }
    } catch (error) {
        console.error("Error al procesar el prestamo: ", error);
        formPrestamo.style.display = "none";
        mensajeResultadoPrestamo.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;
    }
});



window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro:
            modalMostrarLibro.style.display = "none";
        
            break;
        case modalTramitarPrestamo:
            modalTramitarPrestamo.style.display = "none"
            formPrestamo.style.display = "flex";
            mensajeResultadoPrestamo.style.display = "none"
            mensajeResultadoPrestamo.innerHTML = ""
            break
        }
});
