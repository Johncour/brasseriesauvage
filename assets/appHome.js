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

    /**********  */

    let aWarning = document.getElementById("alcoholWarning");
    function aw(){
        aWarning.style.visibility = 'visible';}
    setTimeout(aw, 500);

    /********** listes des variables */

    const start = Date.now();
    let white = document.getElementById("white");
    let ok = document.getElementById("ok");
    let canetteArray = [];
    for( let i=1; i<5; i++){ 
        canetteArray.push(document.getElementById("canette"+i));}
    let eclat = document.getElementById("eclat");
    let brasserie = document.getElementById("brasserie");
    let brasseriePlus = document.getElementById("brasseriePlus");
    let sauvage = document.getElementById("sauvage");
    let sauvagePlus = document.getElementById("sauvagePlus");
    let titleArray = [];
    for( let i=2; i<6; i++){ 
        titleArray.push(document.getElementsByClassName("title"+i));}
    let marg = document.getElementsByClassName("marg");
    let button = document.getElementById('button');
    const canvas =  document.getElementById('canvas');
    let c = canvas.getContext('2d');
    let beer = document.getElementById('beer');
    let beerFoam = document.getElementById('beerFoam');
    let foamArray = [];
    for( let i=22; i<43; i++){ 
        foamArray.push(document.getElementById("foam"+i));}
    let h1 = document.getElementById("h1");
    let menu = document.getElementById("menu");

    let circleArray = [] ;
    let colors = ['rgb(252, 236, 158)'];
    let fontArray = ["'Just Another Hand', cursive", "'Alumni Sans', sans-serif", "'Chathura', sans-serif", "'Teko', sans-serif", "'Antonio', sans-serif", "'Big Shoulders Display', cursive", "'Amatic SC', cursive", "'Smooch Sans', sans-serif", "'Big Shoulders Text', cursive", "'Caveat', cursive", "'Big Shoulders Inline Display', cursive", "'Dorsa', sans-serif", "'Big Shoulders Stencil Display', cursive", "'Allan', cursive"];
    const resultArray = [];
    const resultArray2 = [];

    /**********  */

    ok.addEventListener( 'click', () => {

        /********** mouvement canette */

        eclat.style.width = '44%';
        for( let i=1; i<3; i++){ 
            canetteArray[i].style.width = '44%';}
        button.style.visibility = 'visible';
        aWarning.style.visibility = 'hidden';
        canetteArray[0].style.animation = 'rotate 0.5s linear forwards normal';
        eclat.style.animation = 'rotate 0.5s linear forwards normal';
        function loading2(){
            eclat.style.visibility = 'visible';
            aWarning.style.height = '0px';}
        setTimeout(loading2, 650);
        function loading5(){
            canetteArray[0].style.visibility = 'hidden';}
        setTimeout(loading5, 50);
        function loading3(){
            eclat.style.visibility = 'hidden';}
        setTimeout(loading3, 850);
        function loading4(){
            for( let i=1; i<4; i++){ 
                canetteArray[i].style.visibility = 'visible';}
        }
        setTimeout(loading4, 900);
        for( let i=1; i<4; i++){ 
            canetteArray[i].style.animation = 'rotate 0.5s linear forwards normal';}
        function loading(){
            white.style.animation = "white2 2s linear forwards normal" 
            menu.style.animation = "menuHide 2s linear forwards normal" }
        setTimeout(loading, 6000);

        /********** canvas bière */

        canvas.width = window.innerWidth ;
        canvas.height = window.innerHeight;
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth ;
            canvas.height = window.innerHeight;})
        class Circle {
            constructor(x,y,dx,dy,raduis,color) {
                this.x = 50;
                this.y = 50;
                this.dx = dx;
                this.dy = dy;
                this.raduis = raduis;
                this.color = color;}
            draw() {
                c.beginPath() ;
                c.arc(this.x,this.y,this.raduis,0,Math.PI * 2,false) ;
                c.fillStyle =  this.color ;
                c.fill() ;
                c.closePath() ;
                return this ;}
            update() {
                if((this.x + this.raduis) > window.innerWidth || (this.x - this.raduis < 0)) {
                    this.dx = -this.dx ;}
                if((this.y + this.raduis) > window.innerHeight || (this.y - this.raduis < 0)) {
                    this.dy = -this.dy ;}
                this.x += this.dx ;
                this.y += this.dy ;}
        }
        for(let i = 0 ; i < 1000 ; i++) {
            let raduis = Math.random() * 8 + 1;
            let x = Math.random() * (window.innerWidth - raduis * 2) + raduis;
            let y = Math.random() * (window.innerHeight - raduis * 2) + raduis;
            let dx = Math.random() * 32;
            let dy = Math.random() * 4;
            let color = colors [Math.floor(Math.random() * colors.length )];
            circleArray.push(new Circle(x,y,dx,dy,raduis,color));}

        function foam(){
            for( let i=0; i<21; i++){
                foamArray[i].classList.toggle("rr");}
        }
        setTimeout(foam, 1000);
        function foam2(){
            for( let i=0; i<21; i++){
                if( foamArray[i].classList  == "rr"){
                    foamArray[i].classList.replace("rr", "rr2");}
                function foam3(){
                    if( foamArray[i].classList  == "rr2"){
                        foamArray[i].classList.replace("rr2", "rr");}
                    h1.style.animation = 'opaTitle 1s linear forwards normal';}
                setTimeout(foam3, 3000);}
        }
        setInterval(foam2, 6000);

        /********** début animation */

        function animate() {
            let myReq =  requestAnimationFrame(animate) ;
            c.clearRect(0,0,window.innerWidth,window.innerHeight) ;
            circleArray.forEach(circle => {
                circle.draw().update();})
            canetteArray[3].style.animation = 'down2 0.2s linear forwards normal';}

        /********** functions du titre */

        function move1() {
            brasserie.classList.toggle("moveBra1");
            beer.style.animation = 'height 5s linear forwards normal';
            beerFoam.style.animation = 'height 5s linear forwards normal';}
        function move1Plus() {
            brasseriePlus.classList.toggle("moveBra2");
            canvas.style.animation = 'down3 10s linear forwards normal';}
        function move2() {
            brasserie.classList.replace("moveBra1", "moveBra3");  
            sauvage.classList.replace("sauvage", "sauvage2");}
        function move2Plus() {  
            brasseriePlus.classList.replace("moveBra2", "moveBra4");
            sauvagePlus.classList.replace("sauvage", "sauvage2");}
        function move3() {
            brasserie.classList.remove("brasserie");
            canetteArray[1].style.animation = 'top 2s linear forwards normal';
            function changeTitle(){
                for(const tit of titleArray[0]){
                    tit.classList.replace("title2", "changeTitle1");
                    tit.style.background ="rgb(0,0,0,0)";}
            }
            setInterval(changeTitle, 500);}
        function move3Plus() {
            brasseriePlus.classList.remove("brasserie");
            canetteArray[2].style.animation = 'top 2s linear forwards normal';
            function changeTitle(){
                for(const tit of titleArray[1]){
                    tit.classList.replace("title3", "changeTitle1");
                    tit.style.background ="rgb(0,0,0,0)";}
            }
            setInterval(changeTitle, 500);}
        function move4() {
            sauvage.classList.toggle("moveSau1");
            for(let mar of marg){
                mar.classList.add("margin");}
        }
        function move4Plus() {
            sauvagePlus.classList.toggle("moveSau2");}
        function move5() {  
            sauvage.classList.replace("moveSau1", "moveSau3");}
        function move5Plus() {  
            sauvagePlus.classList.replace("moveSau2", "moveSau4");}
        function move6() {
            sauvage.classList.remove("sauvage2");
            function changeTitle(){               
                for(const tit of titleArray[2]){
                    tit.classList.replace("title4", "changeTitle2");
                    tit.style.background ="rgb(0,0,0,0)";}
            }
            setInterval(changeTitle, 100);}
        function move6Plus() {
            sauvagePlus.classList.remove("sauvage2");
            for( let i=1; i<3; i++){ 
                canetteArray[i].style.animation = 'down 0.2s linear forwards normal';}  
            function changeTitle(){
                for(const tit of titleArray[3]){
                    tit.classList.replace("title5", "changeTitle2");
                    tit.style.background ="rgb(0,0,0,0)";}
            }
            function fontChange(){
                const millis = Date.now() - start;
                let result = Math.floor(millis / 1000);
                resultArray.push(result);
                function ani(){
                    for(let mar of marg){
                        mar.classList.replace("margin", "shake");}
                    for(let i=0; i<14; i++){
                        if(result == resultArray[i]){
                        sauvage.style.fontFamily = fontArray[i];
                        sauvagePlus.style.fontFamily = fontArray[i];}
                        if(result == resultArray[13]){
                            clearInterval(animation);
                            clearInterval(fontChange2);}
                    }
                }   
                function anim2(){
                    for(let mar of marg){
                        mar.classList.replace("shake", "margin");}
                }
                setTimeout(ani, 495);
                setTimeout(anim2, 2500);}
            function anim(){
                for(let mar of marg){
                    mar.classList.replace("margin", "shake");}
                function anim2(){
                    for(let mar of marg){
                        mar.classList.replace("shake", "margin");}
                }
                setTimeout(anim2, 475);}
            let animation = setInterval(anim, 5000); 
            setInterval(changeTitle, 100);        
            let fontChange2 = setInterval(fontChange, 5000);}

        /********** lancement des functions */

        function time(){
            const millis = Date.now() - start;
            let result = Math.floor(millis / 1000);
            resultArray2.push(result);
            for( let i=1; i<4; i++){ 
                canetteArray[i].style.transform = 'rotate(455deg)';
                canetteArray[i].style.left = '0';
                canetteArray[i].style.width = '10%';
                canetteArray[i].style.top = '200px';}
            if(result == resultArray2[0]){
                setTimeout(animate, 500);
                setTimeout(move1, 500);
                function changeBall(){
                    for(const tit of titleArray[0]){
                        tit.style.color ="rgb(0,0,0,1)";
                        tit.style.background ="rgb(0,0,0,1)";}}
                setTimeout(changeBall, 500);
                function changeBall2(){
                    for(const tit of titleArray[1]){
                        tit.style.color ="rgb(0,0,0,1)";
                        tit.style.background ="rgb(0,0,0,1)";}
                }
                setTimeout(changeBall2, 1500);
                setTimeout(move1Plus, 1500);
                setTimeout(move2, 1000);
                setTimeout(move2Plus, 2000);
                setTimeout(move3, 2500);
                setTimeout(move3Plus, 3000);
                setTimeout(move4, 2500);
                function changeBall3(){
                    for(const tit of titleArray[2]){
                        tit.style.color ="rgb(0,0,0,1)";
                        tit.style.background ="rgb(0,0,0,1)";}
                }
                setTimeout(changeBall3, 500);
                function changeBall4(){
                    for(const tit of titleArray[3]){
                        tit.style.color ="rgb(0,0,0,1)";
                        tit.style.background ="rgb(0,0,0,1)";}
                }
                setTimeout(changeBall4, 1500);
                setTimeout(move4Plus, 3500);
                setTimeout(move5, 3500);
                setTimeout(move5Plus, 4500);
                setTimeout(move6, 4500);
                setTimeout(move6Plus, 5500);} 
        }
        setTimeout(time, 600);
    })
})