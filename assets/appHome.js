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

    if(document.getElementsByClassName('non')[0]){
        
        /********** listes des variables */

        let aWarning = document.getElementById("alcoholWarning");
        let white = document.getElementById("white");
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
        let bubble = document.getElementsByClassName("bubble");
        let bubble2 = document.getElementsByClassName("bubble2");
        let body = document.querySelector("body");
        let imgHover = document.getElementsByClassName("imgHover");
        let fTop = document.getElementById("fTop");
        let fTop2 = document.getElementById("fTop2");

        window.addEventListener('scroll', function(e) {
            let scroll = window.scrollY;
            if(scroll > 500){
                console.log("hello");
                fTop2.style.visibility = 'hidden';
            }
        })
        function vTitle(){
            for( let i=0; i<4; i++){ 
                canetteArray[i].style.display = 'none';
                canetteArray[i].style.transition = 'none';  
                for(const tit of titleArray[i]){
                    if(i < 2){
                        tit.classList.replace("title"+(i+2), "changeTitle1");
                        tit.style.animation = "letterVisible1 0s linear forwards normal";
                        tit.style.background ="rgb(0,0,0,0)";}
                    if(i > 1){
                        tit.classList.replace("title"+(i+2), "changeTitle2");
                        tit.style.animation ="letterVisible2 0s linear forwards normal";
                        tit.style.background ="rgb(0,0,0,0)";}
                }
            } 
        }
        setInterval(vTitle, 1);
        for( let i=1; i<3; i++){ 
            canetteArray[i].style.width = '44%';}
        button.style.visibility = 'visible';
        aWarning.style.visibility = 'hidden';
        eclat.style.visibility = 'visible';
        aWarning.style.height = '0px';
        eclat.style.visibility = 'hidden';
        white.style.animation = "white2 0s linear forwards"; 
        menu.style.transition = "all 0s";
        menu.style.opacity = 1;
        menuImg.style.visibility = "visible";
        fTop.style.visibility = 'visible';
        if(document.getElementsByClassName('down')[0]){
            fTop2.style.visibility = 'visible';}
        fTop2.addEventListener( 'click', () => {
            fTop2.style.visibility = 'hidden';})
       
        function foam(){
            for( let i=0; i<21; i++){
                foamArray[i].classList.toggle("fM");                            
                h1.style.animation = 'opaTitle 1s linear forwards';
                menu.style.opacity = 1;}
        }
        setTimeout(foam, 1000);
        function foam2(){
            for( let i=0; i<21; i++){
                if( foamArray[i].classList  == "fM"){
                    foamArray[i].classList.replace("fM", "fM2");}
                function foam3(){
                    if( foamArray[i].classList  == "fM2"){
                        foamArray[i].classList.replace("fM2", "fM");}
                }
                setTimeout(foam3, 3000);}
        }
        setInterval(foam2, 6000);
        beer.style.animation = 'moveUp 0s linear forwards';
        beerFoam.style.animation = 'moveUp 0s linear forwards';
        canvas.style.animation = 'down3 0s linear forwards';
        brasserie.classList.replace("brasserie", "moveBra3");  
        brasseriePlus.classList.replace("brasserie", "moveBra4");
        for(let mar of marg){
            mar.classList.add("margin");
            mar.style.animation = "margin 0s linear forwards normal";
        }
        sauvage.classList.replace("sauvage", "moveSau3");
        sauvagePlus.classList.replace("sauvage", "moveSau4");
        sauvagePlus.classList.remove("sauvage2");
        brasserie.style.animation = 'rebond3 0s linear forwards normal';
        brasseriePlus.style.animation = 'rebond4 0s linear forwards normal';
        sauvage.style.animation = 'rebond7 0s linear forwards normal, rotateTitle 0s linear forwards normal';
        sauvagePlus.style.animation = 'rebond8 0s linear forwards normal, rotateTitle 0s linear forwards normal'
        for( let bub of bubble){
            bub.style.visibility = "hidden";
        }
        for( let bub2 of bubble2){
            bub2.style.visibility = "visible";
        }
        body.style.background = "linear-gradient(white, rgb(237, 175, 50, 0.5))";
        for( let i=0; i<imgHover.length; i++){
            imgHover[i].addEventListener( 'click', (event) =>{
                if(imgHover[i].style.width == '100%'){
                    if (window.matchMedia("(max-width: 600px)").matches) {
                        imgHover[i].style.position = "relative";
                        imgHover[i].style.zIndex = 1;
                        imgHover[i].style.width = '70px';
                        imgHover[i].style.margin = '13px';
                        imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                    }else if (window.matchMedia("(max-width: 800px)").matches) {
                        imgHover[i].style.position = "relative";
                        imgHover[i].style.zIndex = 1;
                        imgHover[i].style.width = '94px';
                        imgHover[i].style.margin = '13px';
                        imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                    } else if (window.matchMedia("(max-width: 1000px)").matches) {
                        imgHover[i].style.position = "relative";
                        imgHover[i].style.zIndex = 1;
                        imgHover[i].style.width = '107px';
                        imgHover[i].style.margin = '13px';
                        imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                    } else {
                        imgHover[i].style.position = "relative";
                        imgHover[i].style.zIndex = 1;
                        imgHover[i].style.width = '12%';
                        imgHover[i].style.margin = '13px';
                        imgHover[i].style.border = "4px solid rgb(246, 97, 15)";}
                }else{
                    if (window.matchMedia("(max-width: 600px)").matches) {
                        imgHover[i].style.position = "absolute";
                        imgHover[i].style.zIndex = 10;
                        imgHover[i].style.width = '100%';
                        imgHover[i].style.margin = '0 auto';
                        imgHover[i].style.borderWidth = "10px 10px";
                        imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                        imgHover[i].style.borderStyle = "solid";
                        imgHover[i].style.bottom = 0;
                    }else if (window.matchMedia("(max-width: 800px)").matches) {
                        imgHover[i].style.position = "absolute";
                        imgHover[i].style.zIndex = 10;
                        imgHover[i].style.width = '100%';
                        imgHover[i].style.margin = '0 auto';
                        imgHover[i].style.borderWidth = "40px 120px";
                        imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                        imgHover[i].style.borderStyle = "solid";
                        imgHover[i].style.bottom = 0;
                    }else if (window.matchMedia("(max-width: 1000px)").matches) {
                        imgHover[i].style.position = "absolute";
                        imgHover[i].style.zIndex = 10;
                        imgHover[i].style.width = '100%';
                        imgHover[i].style.margin = '0 auto';
                        imgHover[i].style.borderWidth = "80px 200px";
                        imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                        imgHover[i].style.borderStyle = "solid";
                        imgHover[i].style.bottom = 0;
                    }else{
                        imgHover[i].style.position = "absolute";
                        imgHover[i].style.zIndex = 10;
                        imgHover[i].style.width = '100%';
                        imgHover[i].style.margin = '0 auto';
                        imgHover[i].style.borderWidth = "100px 250px";
                        imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                        imgHover[i].style.borderStyle = "solid";
                        imgHover[i].style.bottom = 0;}
                }
            })
        }
        }
    else{
        let canetteArray = [];
        for( let i=1; i<5; i++){ 
            canetteArray.push(document.getElementById("canette"+i));}
        
        let aWarning = document.getElementById("alcoholWarning");
        function aw(){
            aWarning.style.visibility = 'visible';
            canetteArray[0].style.visibility = 'visible';
            canetteArray[0].style.width = '44%';}
        setTimeout(aw, 500);

        /********** listes des variables */

        const start = Date.now();
        let white = document.getElementById("white");
        let ok = document.getElementById("ok");
        let fTop = document.getElementById("fTop");
        let fTop2 = document.getElementById("fTop2");
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
        let menuImg = document.getElementById("menuImg");
        let menu = document.getElementById("menu");
        let bubble2 = document.getElementsByClassName("bubble2");
        let body = document.querySelector("body");
        let imgHover = document.getElementsByClassName("imgHover");
        let downActu = document.getElementsByClassName("downActu");

        let circleArray = [] ;
        let colors = ['rgb(252, 236, 158)'];
        let fontArray = ["'Just Another Hand', cursive", "'Alumni Sans', sans-serif", "'Chathura', sans-serif", "'Teko', sans-serif", "'Antonio', sans-serif", "'Big Shoulders Display', cursive", "'Amatic SC', cursive", "'Smooch Sans', sans-serif", "'Big Shoulders Text', cursive", "'Caveat', cursive", "'Big Shoulders Inline Display', cursive", "'Dorsa', sans-serif", "'Big Shoulders Stencil Display', cursive", "'Allan', cursive"];
        const resultArray = [];
        const resultArray2 = [];

        /**********  */
        
        downActu[0].style.visibility = "hidden";
        downActu[0].style.position = "fixed";

        ok.addEventListener( 'click', () => {

            /********** mouvement canette */
            for( let bub2 of bubble2){
                bub2.style.visibility = "hidden";
            }
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
                white.style.animation = "white2 2s linear forwards normal"; 
                menu.style.animation = "menuHide 2s linear forwards normal";
                menuImg.style.visibility = "visible";
                downActu[0].style.visibility = "visible";
                downActu[0].style.position = "relative";}
            setTimeout(loading, 6000);
            for( let i=0; i<imgHover.length; i++){
                imgHover[i].addEventListener( 'click', (event) =>{
                    if(imgHover[i].style.width == '100%'){
                        if (window.matchMedia("(max-width: 600px)").matches) {
                            imgHover[i].style.position = "relative";
                            imgHover[i].style.zIndex = 1;
                            imgHover[i].style.width = '70px';
                            imgHover[i].style.margin = '13px';
                            imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                        }else if (window.matchMedia("(max-width: 800px)").matches) {
                            imgHover[i].style.position = "relative";
                            imgHover[i].style.zIndex = 1;
                            imgHover[i].style.width = '94px';
                            imgHover[i].style.margin = '13px';
                            imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                        } else if (window.matchMedia("(max-width: 1000px)").matches) {
                            imgHover[i].style.position = "relative";
                            imgHover[i].style.zIndex = 1;
                            imgHover[i].style.width = '107px';
                            imgHover[i].style.margin = '13px';
                            imgHover[i].style.border = "4px solid rgb(246, 97, 15)";
                        } else {
                            imgHover[i].style.position = "relative";
                            imgHover[i].style.zIndex = 1;
                            imgHover[i].style.width = '12%';
                            imgHover[i].style.margin = '13px';
                            imgHover[i].style.border = "4px solid rgb(246, 97, 15)";}
                    }else{
                        if (window.matchMedia("(max-width: 600px)").matches) {
                            imgHover[i].style.position = "absolute";
                            imgHover[i].style.zIndex = 10;
                            imgHover[i].style.width = '100%';
                            imgHover[i].style.margin = '0 auto';
                            imgHover[i].style.borderWidth = "10px 10px";
                            imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                            imgHover[i].style.borderStyle = "solid";
                            imgHover[i].style.bottom = 0;
                        }else if (window.matchMedia("(max-width: 800px)").matches) {
                            imgHover[i].style.position = "absolute";
                            imgHover[i].style.zIndex = 10;
                            imgHover[i].style.width = '100%';
                            imgHover[i].style.margin = '0 auto';
                            imgHover[i].style.borderWidth = "40px 120px";
                            imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                            imgHover[i].style.borderStyle = "solid";
                            imgHover[i].style.bottom = 0;
                        }else if (window.matchMedia("(max-width: 1000px)").matches) {
                            imgHover[i].style.position = "absolute";
                            imgHover[i].style.zIndex = 10;
                            imgHover[i].style.width = '100%';
                            imgHover[i].style.margin = '0 auto';
                            imgHover[i].style.borderWidth = "80px 200px";
                            imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                            imgHover[i].style.borderStyle = "solid";
                            imgHover[i].style.bottom = 0;
                        }else{
                            imgHover[i].style.position = "absolute";
                            imgHover[i].style.zIndex = 10;
                            imgHover[i].style.width = '100%';
                            imgHover[i].style.margin = '0 auto';
                            imgHover[i].style.borderWidth = "100px 250px";
                            imgHover[i].style.borderColor = "rgb(246, 97, 15, 0.5)";
                            imgHover[i].style.borderStyle = "solid";
                            imgHover[i].style.bottom = 0;}
                    }
                })
            }

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
                    foamArray[i].classList.toggle("fM");}
            }
            setTimeout(foam, 1000);
            function foam2(){
                for( let i=0; i<21; i++){
                    if( foamArray[i].classList  == "fM"){
                        foamArray[i].classList.replace("fM", "fM2");}
                    function foam3(){
                        if( foamArray[i].classList  == "fM2"){
                            foamArray[i].classList.replace("fM2", "fM");}
                        h1.style.animation = 'opaTitle 1s linear forwards normal';}
                    setTimeout(foam3, 3000);}
            }
            setInterval(foam2, 6000);

            /********** début animation */

            function animate() {
                let myReq =  requestAnimationFrame(animate) ;
                c.clearRect(0,0,window.innerWidth,window.innerHeight);
                circleArray.forEach(circle => {
                    circle.draw().update();})
                canetteArray[3].style.animation = 'down2 0.2s linear forwards normal';}

            /********** functions du titre */

            function move1() {
                brasserie.classList.toggle("moveBra1");
                beer.style.animation = 'moveUp 5s linear forwards normal';
                beerFoam.style.animation = 'moveUp 5s linear forwards normal';}
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
                let fontChange2 = setInterval(fontChange, 5000);
                body.style.background = "linear-gradient(white, rgb(237, 175, 50, 0.5))";
                fTop.style.visibility = 'visible';
                fTop2.style.visibility = 'visible';
                fTop2.addEventListener( 'click', () => {
                    fTop2.style.visibility = 'hidden';
                })
                window.addEventListener('scroll', function(e) {
                    let scroll = window.scrollY;
                    if(scroll > 500){
                        console.log("hello");
                        fTop2.style.visibility = 'hidden';
                    }
                })
            }

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
    }        
})