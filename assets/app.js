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

window.addEventListener('load', (event) => {
    // let aWarning = document.getElementById("alcoholWarning");
    // function aw(){
    //     aWarning.style.visibility = 'visible';
    // }
    // setTimeout(aw, 1500);

    // const canvas =  document.querySelector('#canvas');
    let brasserie = document.getElementById("brasserie");
    let brasseriePlus = document.getElementById("brasseriePlus");
    let title = document.getElementsByClassName("title");
    let title3 = document.getElementsByClassName("title3");
    let title4 = document.getElementsByClassName("title");
    let title5 = document.getElementsByClassName("title3");
    let sauvage = document.getElementById("sauvage");
    let sauvagePlus = document.getElementById("sauvagePlus");
    let square = document.getElementById("square");
    let canette = document.getElementById("canette");

    // canvas.width = window.innerWidth ;
    // canvas.height = window.innerHeight ;
    canette.style.transform = 'rotate(360deg)';

    // window.addEventListener('resize', () => {
    //     canvas.width = window.innerWidth ;
    //     canvas.height = window.innerHeight ;
    // })
    // let c = canvas.getContext('2d') ;

    // class Circle {
    //     constructor(x,y,dx,dy,raduis,color) {
    //         this.x = 40;
    //         this.y = 40;
    //         this.dx = dx;
    //         this.dy = dy;
    //         this.raduis = raduis;
    //         this.color = color;
    //     }
    //     draw() {
    //         c.beginPath() ;
    //         c.arc(this.x,this.y,this.raduis,0,Math.PI * 2,false) ;
    //         c.fillStyle =  this.color ;
    //         c.fill() ;
    //         c.closePath() ;
    //         return this ;
    //     }
    //     update() {
    //         if((this.x + this.raduis) > window.innerWidth || (this.x - this.raduis < 0)) {
    //             this.dx = -this.dx ;
    //         }
    //         if((this.y + this.raduis) > window.innerHeight || (this.y - this.raduis < 0)) {
    //             this.dy = -this.dy ;
    //         }
    //         this.x += this.dx ;
    //         this.y += this.dy ;
    //     }
    //     reverse() {
    //         if(this.dx > 0 || this.dx < 0 ) {
    //             this.dx *= -1 ;
    //         }
    //         if(this.dy > 0 || this.dy < 0 ) {
    //             this.dy *= -1 ;
    //         }
    //         return this ;
    //     }
    //     zoom() {
    //         this.raduis += 5 ;
    //     }
    // }

    // function getDistance(x1,x2,y1,y2) {
    //     let distance = Math.sqrt(Math.pow(x2 - x1 ,  2) + Math.pow(y2 - y1 ,2)) ;
    //     return distance ;
    // }

    // let c2 = new Circle(canvas.width - 40,canvas.height / 2 , 2  , 0 , 40);
    // let c1 = new Circle(40,canvas.height / 2 , 2 , 0 , 40);

    // let mouse = {
    //     x: undefined,
    //     y: undefined
    // }

    // window.addEventListener('mousemove' , event => {
    //     mouse.x = event.x ;
    //     mouse.y = event.y ;
    // }) ;

    // function mouseOverObj(x,y,raduis) {
    //     return mouse.x - x > 0 && mouse.x - x < raduis && mouse.y - y > 0  && mouse.y - y < raduis ;
    // }

    // let circleArray = [] ;
    // let colors = [
    //     'blue',
    //     'red' ,
    //     'black',
    //     'deeppink',
    //     'orange',
    //     'pink',
    // ]

    // for(let i = 0 ; i < 200 ; i++) {
    //     let raduis = Math.random() * 10 + 1;
    //     let x = Math.random() * (window.innerWidth - raduis * 2) + raduis ;
    //     let y = Math.random() * (window.innerHeight - raduis * 2) + raduis ;
    //     let dx = Math.random() * 4 ;
    //     let dy = Math.random() * 4 ;
    //     let color = colors [Math.floor(Math.random() * colors.length )] ;
    //     circleArray.push(new Circle(x,y,dx,dy,raduis,color)) ;
    // }

    // function animate() {
    //     let myReq =  requestAnimationFrame(animate) ;
    //     c.clearRect(0,0,window.innerWidth,window.innerHeight) ;

    //     circleArray.forEach(circle => {
    //         circle.draw().update();
    //     })
    // }

    function move1() {
        brasserie.classList.toggle("moveLeft");
        sauvage.classList.replace("sauvage", "sauvage2");
    }
    function move1Plus() {
        brasseriePlus.classList.toggle("moveLeftPlus");
        sauvagePlus.classList.replace("sauvage", "sauvage2");
    }
    function move2() {  
        brasserie.classList.replace("moveLeft", "left2");   
    }
    function move2Plus() {  
        brasseriePlus.classList.replace("moveLeftPlus", "left2Plus");   
    }
    function move3() {
        brasserie.classList.remove("brasserie");
        function changeTitle(){
            for(const tit of title){
                tit.classList.replace("title", "titlePlus");
                tit.style.background ="rgb(0,0,0,0)";
            }
        }
        setInterval(changeTitle, 1000);
    }
    function move3Plus() {
        brasseriePlus.classList.remove("brasserie");
        function changeTitle(){
            for(const tit of title3){
                tit.classList.replace("title3", "titlePlus");
                tit.style.background ="rgb(0,0,0,0)";
            }
        }
        setInterval(changeTitle, 1000);
    }
    function move4() {
        sauvage.classList.toggle("moveLeft2");
    }
    function move4Plus() {
        sauvagePlus.classList.toggle("moveLeft2Plus");
    }
    function move5() {  
        sauvage.classList.replace("moveLeft2", "left3");   
    }
    function move5Plus() {  
        sauvagePlus.classList.replace("moveLeft2Plus", "left3Plus");   
    }
    function move6() {
        sauvage.classList.remove("sauvage");
        function changeTitle(){
            for(const tit of title4){
                tit.classList.replace("title4", "title2Plus");
                tit.style.background ="rgb(0,0,0,0)";
            }
        }
        setInterval(changeTitle, 1000);
    }
    function move6Plus() {
        sauvagePlus.classList.remove("sauvage");
        function changeTitle(){
            for(const tit of title5){
                tit.classList.replace("title5", "title2Plus");
                tit.style.background ="rgb(0,0,0,0)";
            }
        }
        setInterval(changeTitle, 1000);
    }

    square.addEventListener( 'click', () => {
        canette.style.transform = 'rotate(460deg)';
        square.style.width = 0;
        square.style.height = 0;
        // setTimeout(animate, 1000);
        setTimeout(move1, 1000);
        function changeBall(){
            for(const tit of title){
                tit.style.color ="rgb(0,0,0,1)";
                tit.style.background ="rgb(0,0,0,1)";
            }
        }
        setInterval(changeBall, 1000);
        function changeBall2(){
            for(const tit of title3){
                tit.style.color ="rgb(0,0,0,1)";
                tit.style.background ="rgb(0,0,0,1)";
            }
        }
        setInterval(changeBall2, 4500);
        setTimeout(move1Plus, 4000);
        setTimeout(move2, 4000);
        setTimeout(move2Plus, 7000);
        setTimeout(move3, 7000);
        setTimeout(move3Plus, 9500);
        setTimeout(move4, 8000);
        function changeBall3(){
            for(const tit of title4){
                tit.style.color ="rgb(0,0,0,1)";
                tit.style.background ="rgb(0,0,0,1)";
            }
        }
        setInterval(changeBall3, 7000);
        function changeBall4(){
            for(const tit of title5){
                tit.style.color ="rgb(0,0,0,1)";
                tit.style.background ="rgb(0,0,0,1)";
            }
        }
        setInterval(changeBall4, 10500);
        setTimeout(move4Plus, 10500);
        setTimeout(move5, 10500);
        setTimeout(move5Plus, 12000);
        setTimeout(move6, 12000);
        setTimeout(move6Plus, 15500);
    });
})