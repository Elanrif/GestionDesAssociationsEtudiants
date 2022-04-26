
let img__slider = document.getElementsByClassName('img__slider') ;

let etape = 0 ; 

let nbr__image = img__slider.length ;

let precedent = document.querySelector('.precedent') ; 
let suivant = document.querySelector('.suivant') ; 

function enleverActiveImages()  { 

    for(let i = 0 ; i< nbr__image ; i++)
    { 
        img__slider[i].classList.remove('active') ;
    }
}

suivant.addEventListener('click', function() { 
    etape++ ; 
    if(etape >= nbr__image){ 
        etape = 0 ; 
    }
    enleverActiveImages() ; 
    img__slider[etape].classList.add('active') ; 
})

precedent.addEventListener('click' , function() { 
    etape-- ; 
    if(etape < 0 ) { 
        etape = nbr__image - 1 ; 
    }
    enleverActiveImages() ; 
    img__slider[etape].classList.add('active') ; 
})


setInterval(function() { 

     etape++;
     if (etape >= nbr__image) {
         etape = 0;
     }
     enleverActiveImages();
     img__slider[etape].classList.add("active"); 

},5000)
