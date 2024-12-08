// MODAL -> MOSTRAR LIBRO -> ELEMENTOS

const modalMostrarLibro = document.getElementById("modal-libro");
const modalMostrarLibro_imagen = document.getElementById("modal-img-libro");
const modalMostrarLibro_titulo = document.getElementById("libro-titulo");
const modalMostrarLibro_autor = document.getElementById("libro-autor");
const modalMostrarLibro_editorial = document.getElementById("libro-editorial");
const modalMostrarLibro_categoria = document.getElementById("libro-categoria");
const modalMostrarLibro_sinopsis = document.getElementById("libro-sinopsis");

const modalMostrarLibro_isbn = document.getElementById("isbn-modal-mostrar-libro");



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



// BOTON PARA ABRIR EL MODAL DE TRAMITAR LIBRO
const openTramitarPrestamo = document.getElementById("tramitar-prestamo-btn")


// ELEMENTOS DEL MODAL TRAMITAR PRESTAMO
const modalTramitarLibro = document.getElementById("modal-prestamo")

const modalTramitarPrestamo_imagen = document.getElementById("imagen-libro-prestamo")
const modalTramitarPrestamo_titulo = document.getElementById("titulo-libro-prestamo")
const modalTramitarPrestamo_autor = document.getElementById("autor-libro-prestamo")
const modalTramitarLibro_fechaEsperadaEntrega = document.getElementById("fecha-esperada-entrega-input")

// FUNCION PARA CARGAR EL MODAL DE TRAMITAR LIBRO Y ACTUALIZAR CON LOS DATOS DEL LIBRO A TRAMITAR
openTramitarPrestamo.addEventListener("click",()=>{
    modalTramitarLibro_fechaEsperadaEntrega.min = new Date().toISOString().split("T")[0]
    modalTramitarPrestamo_imagen.setAttribute("src",modalMostrarLibro_imagen.src)
    modalTramitarPrestamo_titulo.innerText = modalMostrarLibro_titulo.innerText
    modalTramitarPrestamo_autor.innerText = modalMostrarLibro_autor.innerText
    modalMostrarLibro.style.display = "none"
    modalTramitarLibro.style.display = "flex"
})


// BOTON PARA CONFIRMAR EL PRESTAMO DEL LIBRO
const confirmarPrestamoBtn = document.getElementById("confirmar-prestamo-btn")

const formPrestamo = document.getElementById("form-prestamo")
// CONTENEDOR PARA MOSTRAR UN MENSAJE DE EXITO O ERROR AL CONFIRMAR EL PRESTAMO
const mensajeContainerPrestamo = document.getElementById("mensaje-container-prestamo") 

// FUNCION PARA HACER EL ENVIO DEL FORMULARIO A PROCESAR-PRESTAMO.PHP
confirmarPrestamoBtn.addEventListener("click", async (event) => {
    event.preventDefault();
    const formDatos = new FormData(formPrestamo);
    
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
            mensajeContainerPrestamo.style.display = "flex"
            mensajeContainerPrestamo.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            mensajeContainerPrestamo.style.display = "flex"
            mensajeContainerPrestamo.innerHTML = `<h4 style="color: red;">${data.error}</h4>`;
        }
    } catch (error) {
        console.error("Error al procesar el prestamo: ", error);
        formPrestamo.style.display = "none";
        mensajeContainerPrestamo.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;
    }
});


// EVENTO PARA CERRAR LOS MODALS AL CLICKEAR FUERA DE ELLOS

window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro:
            modalMostrarLibro.style.display = "none";
            break;
        case modalTramitarLibro:
            modalTramitarLibro.style.display = "none"
            formPrestamo.style.display = "flex"
            mensajeContainerPrestamo.style.display = "none"
            mensajeContainerPrestamo.innerHTML = ""
            break;
    }
});