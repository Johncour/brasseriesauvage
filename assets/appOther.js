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

    let h1 = document.getElementById("h1");
    let menu = document.getElementById("menu");

    menu.style.animation = "menuHide 2s linear forwards normal";
    h1.style.animation = 'opaTitle 1s linear forwards normal';
})