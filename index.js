const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev-btn");
const nextbtn = document.querySelector(".next-btn");
const upbtn = document.querySelector(".up");
const downbtn = document.querySelector(".down");
const verticalSlides = document.querySelectorAll(".vertislides");
const activePage = window.location.pathname;
const navlinks = document.querySelectorAll(".items");
navlinks.forEach(element => {
    if(element.href.includes(`${activePage}`)){
        element.classList.add('active')
    }
});
console.log(navlinks.href);
let counter = 0;
nextbtn.addEventListener('click',function(){
    counter++;
    carousel();
})
slides.forEach(function(slide,index){
    slide.style.left = `${index*100}%`;
});

verticalSlides.forEach(function(slide,index){
    slide.style.left = `${index*100}%`;
});

prevBtn.addEventListener('click',function(){
    counter--;
    carousel();
})

upbtn.addEventListener('click',function(){
    counter--;
    vertical();
})
downbtn.addEventListener('click',function(){
    counter++;
    vertical();
})

var xhr = new XMLHttpRequest();
xhr.open("POST")

function carousel(){
    if(counter === slides.length){
        counter = 0;
    }
    if(counter < 0){
        counter = slides.length - 1;
    }
    slides.forEach(function(slide){
        slide.style.transform = `translateX(-${counter * 100}%)`;
    })
}
function vertical(){
    if(counter === verticalSlides.length){
        counter = 0;
    }
    if(counter < 0){
        counter = verticalSlides.length - 1;
    }
    verticalSlides.forEach(function(slide){
        slide.style.transform = `translateY(-${counter * 100}%)`;
    })
}