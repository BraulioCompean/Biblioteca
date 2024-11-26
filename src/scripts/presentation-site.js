const background = document.getElementById("background-container")
const backgroundImages = [
    "https://is5-ssl.mzstatic.com/image/thumb/Publication128/v4/0f/de/d8/0fded8f3-e174-9078-4771-7097ce261b01/9788491813101.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication/v4/72/2f/1e/722f1e80-0cd4-d9b6-4010-1acb2a08fede/Homero_Ili_ada.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication123/v4/ab/e9/5d/abe95d87-f997-d6fe-c724-a1efc0e14e2b/TheMetamorphosis.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication116/v4/c3/36/5a/c3365a4c-c24e-2f4a-c0cc-d4615f5a16aa/0a0fdea0-aa5f-4c05-bce3-ec2e8b584ddf.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication125/v4/9b/5d/a0/9b5da023-830c-b2fb-7bf4-234f84d517ad/9780316032513.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication82/v4/f8/e2/ec/f8e2ec52-7c44-ca67-e870-204bed166212/9781101117996.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication116/v4/81/02/36/81023601-dc26-3213-5f31-31cfa6644dc9/9780593548059.d.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication111/v4/5a/23/10/5a231085-a455-131c-8e1b-8d1331f6e5de/9780062416216_marketingimage.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication122/v4/73/6f/ce/736fce80-e9bc-e529-b0ad-6a9491b8a4ce/9781781105849.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication122/v4/8a/d8/61/8ad861cd-9c83-512c-d13e-022e625ef4b6/9780547951973.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication116/v4/7a/44/22/7a4422b4-7a14-685d-4282-2883c6c14605/9780547761404.jpg/100000x100000-999.jpg",
    "https://is5-ssl.mzstatic.com/image/thumb/Publication114/v4/f5/22/17/f522178d-8aa0-66d8-be67-0345b0e2d29f/9780307806796.jpg/100000x100000-999.jpg"
]



function generateBook(){
    const book = document.createElement("div")
    book.classList.add("book")
    book.style.left = Math.random() * 800 + "px";
    // book.style.top = Math.random() * 100 + "px";
    const imgbook = document.createElement("img")
    imgbook.setAttribute("src",backgroundImages[Math.floor(Math.random() * backgroundImages.length)])
    imgbook.onload = () =>{
        book.appendChild(imgbook)
        background.appendChild(book)

        book.addEventListener("animationend",()=>{
            book.remove()
        })
    }



}

document.addEventListener("visibilitychange",()=>{
    if(!document.hidden){
        background.innerHTML = " "
    }
})



setInterval(generateBook,2000)




