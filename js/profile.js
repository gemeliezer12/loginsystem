const profileBtn = document.querySelector(".profile");
const options = document.querySelector(".options");

profileBtn.addEventListener("click", function(){
    options.classList.toggle("hide");
    profileBtn.classList.toggle("hide")
});