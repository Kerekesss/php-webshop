document.addEventListener("DOMContentLoaded", () => {
    const toggleFilter = document.querySelector(".toggleFilter");
    const closeFilter = document.querySelector(".closeFilter");
    const filterHidden = document.querySelector(".filterHidden");
    const productFilter = document.querySelector(".productFilter");

    toggleFilter.addEventListener("click", function () {
        toggleFilter.classList.toggle("is-active");
        closeFilter.classList.toggle("is-active");
        filterHidden.classList.toggle("is-active");
        productFilter.classList.toggle("is-active");
    });

    closeFilter.addEventListener("click", function () {
        toggleFilter.classList.remove("is-active");
        closeFilter.classList.remove("is-active");
        filterHidden.classList.remove("is-active");
        productFilter.classList.remove("is-active");
    });

});


document.addEventListener("DOMContentLoaded", () => {
    let i = 0;
    const h1Element = document.querySelector("#typeAn"); // Select the <h1> element
    const txt = h1Element ? h1Element.textContent : ""; // Get text from <h1>, or use empty string if not found
    let speed = 100; // The speed/duration of the effect in milliseconds

    function typeWriter() {
        if (!h1Element) {
            console.error("Element with ID 'typeAn' not found.");
            return;
        }

        if (i <= txt.length) {
            h1Element.textContent = txt.substring(0, i); // Update text without appending duplicates
            i++;
            setTimeout(typeWriter, speed);
        } else {
            // Reset the typing effect after finishing
            setTimeout(() => {
                h1Element.textContent = ""; // Clear the content
                i = 0; // Reset the counter
                typeWriter(); // Restart the typing effect
            }, 1000); // Pause for 1 second before restarting
        }
    }

    typeWriter(); // Start the typing effect


}); 


document.addEventListener("DOMContentLoaded", () => {


const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;
let intervalId = null;


initializeSlider();

function initializeSlider() {


    if(slides.length > 0){
        slides[slideIndex].classList.add("displaySlide");
        intervalId = setInterval(nextSlide, 5000);
    }
   

}
function showSlide(index) {


    if(index >= slides.length){
        slideIndex = 0;
    } 
    else if(index < 0){
        slideIndex = slides.length - 1;
    }

    slides.forEach(slide => {
        slide.classList.remove("displaySlide");
    });
    slides[slideIndex].classList.add("displaySlide");

}
function prevSlide() {
    clearInterval(intervalId);
    slideIndex--;
    showSlide(slideIndex);



}
function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);


}

document.querySelector(".prev").addEventListener("click", prevSlide);
document.querySelector(".next").addEventListener("click", nextSlide);

}); 



document.addEventListener("DOMContentLoaded", () => {

    const quantitySelects = document.querySelectorAll("#quantitySelect"); 
    quantitySelects.forEach((select) => {
        select.addEventListener("change", function () {
            const parentForm = this.closest(".updateQuantityForm"); 
            const updateButton = parentForm.querySelector(".updateButton"); 
            
            if (!updateButton.classList.contains("displayButton")) {
                updateButton.classList.add("displayButton");
            }
        });
    });
});



document.addEventListener("DOMContentLoaded", () => {
    const toggleMenu = document.querySelector(".toggleMenu");
    const closeMenu = document.querySelector(".closeMenu");
    const mobileMenu = document.querySelector(".mobileMenu");


    toggleMenu.addEventListener("click", function () {
        toggleMenu.classList.toggle("is-active");
        closeMenu.classList.toggle("is-active");
        mobileMenu.classList.toggle("is-active");
    });

    closeMenu.addEventListener("click", function () {
        toggleMenu.classList.remove("is-active");
        closeMenu.classList.remove("is-active");
        mobileMenu.classList.remove("is-active");
    });

});
