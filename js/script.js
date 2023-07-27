const navbar = document.querySelector(".navbar");
const navbarOffsetTop = navbar.offsetTop;
const sections =document.querySelectorAll('section');
const navbarlinks = document.querySelectorAll('.navbar-link')

// Scroll Mouse
window.addEventListener("scroll",()=>{
    mainFn();
});// Scroll Mouse

const mainFn = () => {
    // Sticky
    if(window.pageYOffset>= navbarOffsetTop){
        navbar.classList.add("sticky")
    }else{
        navbar.classList.remove("sticky");
    }// Sticky

    // Navigation Hover While Scrolling
    sections.forEach((section,i)=>{
        if(window.pageYOffset >= section.offsetTop - 10){
            navbarlinks.forEach(navbarlinks =>{
                navbarlinks.classList.remove("change")
            });
            navbarlinks[i].classList.add("change");
        }
    });// Navigation Hover While Scrolling
}
mainFn();

// changing size of window the page will reload (Progress Bar)
window.addEventListener('resize', ()=> {
    window.location.reload();
});// changing size of window the page will reload (Progress Bar)

