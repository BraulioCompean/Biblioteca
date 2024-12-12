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



// BOOK CARDS

const bookCards = document.querySelectorAll(".book-card")

const cacheInfoLibros = {} //Objeto para guardar la informacion de los libros temporalmente, esto para que no tarde tanto


// FUNCION PARA CARGAR CON LOS DATOS DEL LIBRO SELECCIONADO EL MODAL MOSTRAR LIBRO

function actualizarModalMostrarLibro(data) { //Obtenemos la informacion y se la asignamos al modal de msotrarLibro
    modalMostrarLibro_isbn.value = data.isbn;
    modalMostrarLibro_imagen.setAttribute("src", data.imagen);
    modalMostrarLibro_titulo.innerText = data.titulo;
    modalMostrarLibro_autor.innerText = `Por :  ${data.autor}`;
    modalMostrarLibro_editorial.innerText = `Editorial: ${data.editorial}`;
    modalMostrarLibro_categoria.innerText =`Categoria:  ${data.categoria}`;
    modalMostrarLibro_sinopsis.innerText = data.sinopsis;
    modalMostrarLibro.style.display = "flex";
}


bookCards.forEach((card) => { //Por cada carta de libro que exista, tendra cada una un event listener
    card.addEventListener("click", (event) => {
        const isbnCardBook = event.target.closest(".book-card").id; //Obtendra el isbn que usaremos para despues para buscar informacion de ese libro
        if (cacheInfoLibros[isbnCardBook]) { //Verifica si la informacion del libro ya existe en el objeto Cache
            actualizarModalMostrarLibro(cacheInfoLibros[isbnCardBook]); // Si ya existe, de ahi agarrara la informacion , por lo que es mas rapido que hacer un fetch
        } else {
            fetch(`../../db/info-libro.php?isbn=${isbnCardBook}`) //Si no esta en el objeto Cache, hara una solicitud a el archivo info-libro.php , mandandole como parametro el isbn del libro
                .then((response) => response.json())
                .then((data) => {
                    actualizarModalMostrarLibro(data); //Con la informacion que nos de el fetch, obtendremos la informacion y la acutalizaremos en el modal Mostra libro
                    cacheInfoLibros[isbnCardBook] = data; // A su vez ,guardaremos esta informacion en el objeto Cache
                })
                .catch((error) => {
                    console.error(
                        "Error al obtener datos de info-libro.php : ", //En caso de error mostraremos por consola del navegador
                        error
                    );
                });
        }
    });
});
// ------------------------------------------------------------------------------------------------
// MODAL RECOMENDAR LIBRO -> ELEMENTS
const modalRecomendarLibro = document.getElementById("modal-recomendar")
const modalRecomendarLibro_isbn = document.getElementById("isbn-recomendar-libro")
const openRecomendarLibro = document.getElementById("recomendar-libro-btn")

const formRecomendar = document.getElementById("form-recomendar")
const confirmarRecomendar = document.getElementById("confirmar-recomendar")
const recomendarRespuestaMensaje = document.getElementById("recomendar-respuesta-mensaje")



// FUNCION PARA ABRIR EL MODAL DE RECOMENDAR<
openRecomendarLibro.addEventListener("click",()=>{
    modalRecomendarLibro_isbn.value = modalMostrarLibro_isbn.value
    modalMostrarLibro.style.display = "none"
    modalRecomendarLibro.style.display = "flex"
})


// FUNCION PARA EL BOTON DE CONFIRMAR RECOMENDACION PARA HACER LA SOLICITUD AL ARCHIVO RECOMENDAR.PHP
confirmarRecomendar.addEventListener("click",async (event)=>{
    event.preventDefault(); 
    const formDatos = new FormData(formRecomendar) //Crearemos un formData , el cual lo llenaremos con el formulario de Recomendar (formRecomendar)
    try {
        const response = await fetch("../../db/recomendar.php",{ //Haremos una solicitud al archivo recomendar.php 
            method: "POST", //Con un metodo POST 
            body: formDatos // Y el formulario que enviaremos
        })
        if(!response.ok){ //Retorna un Booleano indicando el estado de la respuesta
            const errorText = await response.text(); //En caso de que la respuesta no fuera exitosa, obtendremos su mensaje
            console.error(errorText) //Y lo imprimiremos en consola
            throw new Error(`Error!: ${response.status}`) //A su vez generaremos un Error, mandando el status de la respuesta, dicho error sera atrapado mas abajo con catch
        }

        const data = await response.json(); //Si todo funciono correctamente, obtendra la respuesta y la convertira en json , guardandola en la variable data
        console.log(data) //La podemos imprimir en consola para ver lo que contiene (opcional)
        formRecomendar.style.display = "none"; //Pondremos invisible el formulario de recomendar
        if(data.exito){ //Si en la respuesta, en el clave de exito, es True
            recomendarRespuestaMensaje.style.display = "flex" //Pondra visible la respuesta
            recomendarRespuestaMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>` //Y le concatenaras como HTML el valor de la clave mensaje de la respuesta

        }else{//De otra forma, si en la clave exito fuera False
            recomendarRespuestaMensaje.style.display = "flex" //Pondras visible la respuesta
            recomendarRespuestaMensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;//Y agregaras como HTML el valor de la clave mensaje de la respuesta
        }
    } catch (Error) {
        console.error("Error al recomendar el libro: ",Error) //Para otra clase de errores el catch se encargara de atraparlos
        formRecomendar.style.display = "none"; //De igual forma , ponemos el formulario de recomendar en invisible
        recomendarRespuestaMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al intentar recomendar el libro.</h4>`//Y mostramos el siguiente mensaje
    }
})

// ------------------------------------------------------------------------------------------------



// ------------------------------------------------------------------------------------------------
// MODAL PRESTAMO -> ELEMETNS

const openTramitarPrestamo = document.getElementById("tramitar-prestamo-btn")

const modalTramitarLibro = document.getElementById("modal-prestamo")
const modalTramitarLibro_imagen = document.getElementById("imagen-libro-prestamo")
const modalTramitarLibro_titulo = document.getElementById("titulo-libro-prestamo")
const modalTramitarLibro_autor = document.getElementById("autor-libro-prestamo")
const modalTramitarLibro_fechaEsperadaEntrega = document.getElementById("fecha-esperada-entrega-input")

const modalTramitarLibro_resultadoMensaje = document.getElementById("mensaje-resultado-prestamo")
const modalTramitarLibro_isbn = document.getElementById("isbn-prestamo-libro");

openTramitarPrestamo.addEventListener("click",()=>{
    modalTramitarLibro_imagen.setAttribute("src",modalMostrarLibro_imagen.src)
    modalTramitarLibro_titulo.innerText = modalMostrarLibro_titulo.innerText
    modalTramitarLibro_autor.innerText = modalMostrarLibro_autor.innerText
    modalTramitarLibro_fechaEsperadaEntrega.min= new Date().toISOString().split("T")[0]
    modalTramitarLibro_isbn.value = modalMostrarLibro_isbn.value

    modalMostrarLibro.style.display = "none"
    modalTramitarLibro.style.display = "flex"
})


const confirmarPrestamo = document.getElementById("confirmar-prestamo-btn")
const formPrestamo = document.getElementById("form-prestamo")
confirmarPrestamo.addEventListener("click",async (event)=>{

    event.preventDefault();
    const formDatos = new FormData(formPrestamo)

    try{
        const response = await fetch("../../db/procesar-prestamo.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
 
        const data = await response.json();
        formPrestamo.style.display = "none";

        if (data.exito) {
            modalTramitarLibro_resultadoMensaje.style.display = "flex"
            modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            modalTramitarLibro_resultadoMensaje.style.display = "flex"
            modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: red;">${data.error}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formPrestamo.style.display = "none";
        modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }

})


// ------------------------------------------------------------------------------------------------
// SALIDAS DE LOS MODAL
window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro: //EN CASO DE QUE HAYAS DADO CLICK EN EL MODAL MOSTRAR LIBRO
            modalMostrarLibro.style.display = "none"; //CERRARA EL MODAL MOSTRAR LIBRO
            break;
        case modalRecomendarLibro://EN CASO DE QUE HAYAS DADO CLICK EN EL MODAL RECOMENDAR LIBRO
            modalRecomendarLibro.style.display = "none" //CERRARA EL MODAL RECOMENDAR LIBRO
            formRecomendar.style.display = "flex" //HABILITARA NUEVAMENTE EL FORMULARIO RECOMENDAR PARA QUE ESTE DISPONIBLE CUANDO SE ABRA OTRA VEZ
            recomendarRespuestaMensaje.style.display = "none" //EL MENSAJE DE RESPUESTA LO OCULTARA
            recomendarRespuestaMensaje.innerHTML = "" // Y BORRARA LA INFO DE ESE MENSAJE
            break;
        case modalTramitarLibro: //EN CASO DE QUE HAYAS DADO CLICK EN EL MODAL TRAMITAR LIBRO
            modalTramitarLibro.style.display = "none" //CERRARA EL MODAL TRAMITAR LIBRO
            formPrestamo.style.display = "flex" // HABILITARA NUEVAMENTE EL FORMULARIO PRESTAMO
            modalTramitarLibro_resultadoMensaje = "none" // HABILITARA 
            modalTramitarLibro_resultadoMensaje.innerHTML = "" // BORRARA EL CONTENIDO DEL MENSAJE 
            break;
        
    }
});
