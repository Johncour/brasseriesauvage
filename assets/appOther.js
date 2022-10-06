/*
* Welcome to your app's main JavaScript file!
*
* We recommend including the built version of this JavaScript file
* (and its CSS file) in your base layout (base.html.twig).
*/

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

/********** chargement de la page js */

window.addEventListener('load', (event) => {

    let button = document.getElementById("button");
    let button3 = document.getElementsByClassName("button");
    let h1 = document.getElementById("h1");
    let stockBeer1 = document.getElementById("stockBeer1");
    let price1 = document.getElementById("price1");
    let basket1 = document.getElementById("basket1");
    let valuePrice1 = document.getElementById("valuePrice1");
    let valuePResult1 = document.getElementById("valuePResult1");
    let body = document.querySelector("body");
    let allBasket = document.getElementById('allBasket');
    let footer = document.getElementById('footer');
    let menuImg = document.getElementById('menuImg');
    let fTop = document.getElementById('fTop');
    let arrow2 = document.getElementsByClassName("arrow2");
    let hide = document.getElementsByClassName("hide");
    let homeImg = document.getElementsByClassName("homeImg");

    button.style.textAlign = "center";
    button.style.left = "32%";
    button.style.visibility = "visible";
    button.style.top = "-131px";
    button.style.display = "flex";
    button.style.width = "25%";
    button3[0].style.display = "none";
    for( let i=1; i<3; i++){ 
        button3[i].style.margin = "10px 5px";
        button3[i].style.fontSize = "0.7em";
        button3[i].style.transition = "all 0s";
        button3[i].style.boxShadow = "none";
        button3[i].style.transition = "none";
        button3[i].style.borderRadius = "0";
        button3[i].style.border = "1px solid rgb(246, 97, 15)";}
    h1.style.animation = 'none';
    h1.style.opacity = 1;
    menu.style.opacity = 1;
    menu.style.transition = "none 0s";
    menuImg.style.visibility = "visible";
    body.style.background = "linear-gradient(white, rgb(237, 175, 50, 0.5))";
    body.style.paddingBottom = "0";
    footer.style.marginTop = 0;
    fTop.style.visibility = 'visible';
    for( let i=0; i<2; i++){
        homeImg[i].style.display = "none";}
    for(const arr of arrow2){
        arr.classList.replace("arrow2", "arrow");}
    for(const hid of hide){
        hid.classList.replace("hide", "vHidden");}

    if(valuePrice1){
        valuePResult1.innerHTML = valuePrice1.value;}

    if(stockBeer1){
    stockBeer1.addEventListener("click", (event) => {
        let resultPrice = stockBeer1.value * price1.value;
        valuePResult1.innerHTML = resultPrice + "€";
    })}

    if(basket1){
    basket1.addEventListener("click", (event) => {

        // console.log(stockBeer1.value);
    })}
})