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
    let mc = document.getElementsByClassName("modifContact");
    let sB = document.getElementsByClassName("spaceBasket");
    let sB2 = document.getElementsByClassName("spaceBasket2");
    let sB3 = document.getElementsByClassName("spaceBasket3");
    let p5 = document.getElementsByClassName("pour5");
    let p55 = document.getElementsByClassName("p55");
    let allBasket = document.getElementById('allBasket');
    let order = document.getElementById('order');
    let respon14 = document.getElementsByClassName('respon14');
    let rBas = document.getElementById("resultBasket");
    let stockBeer = [];pou5
    let price = [];
    let valuePrice = [];
    let valuePResult = [];
    let deleteBeer = [];
    let deleteCategory = [];
    let deleteContact = [];
    let aBasket = [];
    let ac3 = [];
    let addBI = [];
    let pou5 = [];
    let montant = "Montant du panier = ";
    for( let i=0; i<sB.length; i++){
        stockBeer.push(document.getElementById(sB[i].children[0].id));}
    for( let i=0; i<sB2.length; i++){
        price.push(document.getElementById(sB2[i].children[1].id));}
    for( let i=0; i<sB3.length; i++){
        valuePrice.push(document.getElementById(sB3[i].children[0].id));
        valuePResult.push(document.getElementById(sB3[i].children[1].id));}
    for( let i=0; i<p5.length; i++){
        deleteBeer.push(document.getElementById(p5[i].children[1].id));}
    for( let i=0; i<p55.length; i++){
        deleteCategory.push(document.getElementById(p55[i].children[2].id));}
    for( let i=1; i<mc.length; i++){
        deleteContact.push(document.getElementById(mc[i].children[3].id));}
    let body = document.querySelector("body");
    if(allBasket){
        for( let i=1; i<allBasket.children.length; i++){
            aBasket.push(document.getElementById(allBasket.children[i].children[0].id));
            pou5.push(allBasket.children[i].children[1]);}
        for( let i=0; i<stockBeer.length/2; i++){
            ac3.push(allBasket.children[i+1].children[1].children[0]);}
        function clientWidth(){
            for( let k=0; k<respon14.length; k++){ 
                if(allBasket.clientWidth<250){
                    rBas.style.width = "175px";
                    respon14[k].style.width = "100px";
                    respon14[k].style.bottom = '60px';
                    respon14[k].style.left = "55px";
                    respon14[k].style.fontSize = "0.9em";
                    for( let q=0; q<pou5.length; q++){
                        pou5[q].children[0].children[0].style.padding = "0 0 0 20px";}
                }else{
                    rBas.style.width = "375px";
                    respon14[k].style.width = "175px";
                    respon14[k].style.bottom = '30px';
                    respon14[k].style.left = '0';
                    respon14[k].style.fontSize = "1.1em";
                    for( let q=0; q<pou5.length; q++){
                        pou5[q].children[0].children[0].style.padding = 0;}
                }
            }
        }
        setInterval(clientWidth, 100)
    }
    let footer = document.getElementById('footer');
    let menuImg = document.getElementById('menuImg');
    let fTop = document.getElementById('fTop');
    let arrow2 = document.getElementsByClassName("arrow2");
    let hide = document.getElementsByClassName("hide");
    let homeImg = document.getElementsByClassName("homeImg");
    let nB = document.getElementById("newB");
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
    body.style.paddingBottom = 0;
    footer.style.marginTop = 0;
    fTop.style.visibility = 'visible';
    for( let i=0; i<2; i++){
        homeImg[i].style.display = "none";}
    for(const arr of arrow2){
        arr.classList.replace("arrow2", "arrow");}
    for(const hid of hide){
        hid.classList.replace("hide", "vHidden");}
    for( let i=0; i<ac3.length; i++){
        ac3[i].children[0].style.visibility = "hidden";
        ac3[i].children[0].style.height = 0;
        pou5[i].style.height = '0px';}
    for( let i=0; i<valuePrice.length; i++){
        if(valuePrice[i]){
            valuePResult[i].innerHTML = valuePrice[i].value;}
    }

    for( let i=0; i<stockBeer.length/2; i++){
        if(stockBeer[i*2]){
            stockBeer[i*2].addEventListener("click", (event) => {
                let resultPrice = stockBeer[i*2].value * price[i].value;
                valuePResult[i].innerHTML = parseFloat(resultPrice).toFixed(2) + "€";}
            )
        }
    }

    for( let i=0; i<deleteContact.length; i++){
        if(deleteContact[i]){
            deleteContact[i].addEventListener("click", (event) => {
                event.preventDefault();
                let str = deleteContact[i].id;
                let j = str.slice(13, str.lenght);
                let m = 'modalCt' + [j];
                let mod = document.getElementById(m);
                    mod.style.visibility = "visible";
                    let no = 'noct' + [j];
                    let non = document.getElementById(no);
                    if(non){
                        non.addEventListener("click", (event) => {
                            mod.style.visibility = "hidden";
                        })
                    }
            })
        }
    }

    for( let i=0; i<deleteBeer.length; i++){
        let str = deleteBeer[i].id;
        let j = str.slice(10, str.length);
        let deleteBeerM = 'deleteBeerM'+j;
        let deleteBM = document.getElementById(deleteBeerM)
        if(deleteBM){
            deleteBM.addEventListener("click", (event) => {
                event.preventDefault();
                let m = 'modal' + [j];
                let mod = document.getElementById(m);
                    mod.style.visibility = "visible";
                    let no = 'noB' + [j];
                    let non = document.getElementById(no);
                    if(non){
                        non.addEventListener("click", (event) => {
                            mod.style.visibility = "hidden";
                        })
                    }
            })
        }
    }

    for( let i=0; i<deleteBeer.length; i++){
        if(deleteBeer[i]){
            deleteBeer[i].addEventListener("click", (event) => {
                event.preventDefault();
                let str = deleteBeer[i].id;
                let j = str.slice(10, str.length);
                let m = 'modal' + [j];
                let mod = document.getElementById(m);
                    mod.style.visibility = "visible";
                    let no = 'noB' + [j];
                    let non = document.getElementById(no);
                    if(non){
                        non.addEventListener("click", (event) => {
                            mod.style.visibility = "hidden";
                        })
                    }
            })
        }
    }

    for( let i=0; i<deleteCategory.length; i++){
        if(deleteCategory[i]){
            deleteCategory[i].addEventListener("click", (event) => {
                event.preventDefault();
                let str = deleteCategory[i].id;
                let j = str.slice(14, str.lenght);
                let m = 'modalC' + [j];
                let mod = document.getElementById(m);
                    mod.style.visibility = "visible";
                    let no = 'noC' + [j];
                    let non = document.getElementById(no);
                    if(non){
                        non.addEventListener("click", (event) => {
                            mod.style.visibility = "hidden";
                        })
                    }
            })
        }
    }

    let sum = [];
    for( let i=0; i<stockBeer.length/2; i++){
        if(stockBeer[i+1+i]){
            let str = stockBeer[i+1+i].id;
            let j = str.slice(6, str.length);
            let abi = 'addBasInfo' + j;
            let beerId = 'beer' + j;
            let ab = document.getElementById(abi);
            let bi = document.getElementById(beerId);
            if(ac3[i]){
                ac3[i].addEventListener("click", (event) => {
                    event.preventDefault();
                    ab.style.height = 0;
                    ab.innerHTML =  ""
                    ac3[i].children[0].style.visibility = "hidden";
                    ac3[i].children[0].style.height = 0;
                    addBI.pop();
                    if(addBI.length == 0){
                        allBasket.classList.replace("allBasket2", "allBasket");}
                    let montant = "Montant du panier = ";
                    let m = ab.id;
                    let n = m.slice(10, m.length);
                    let o = 'basAdd' + n;
                    let p = document.getElementById(o);
                    p.children[0].value = "Ajouter";
                    sum.splice(0, sum.length)
                    let rBB2 = [];
                    rBB2.push(document.getElementsByClassName("rBB"));
                    for( let l=0; l<rBB2[0].length; l++){
                        rBB2[0][l];
                        sum.push(rBB2[0][l].textContent);}
                    function sumArray(){
                        let numSum = 0;
                        for (let q=0 ; q<sum.length ; q++){
                            numSum += parseFloat(sum[q]);}
                        return numSum;};
                    if(rBas){
                        rBas.value = montant + sumArray().toFixed(2) + '€';}
                    if(sumArray() == 0){
                        if(rBas){
                            rBas.style.visibility = "hidden";}
                        order.style.visibility = "hidden";}
                    })
            }
            if(stockBeer[i+1+i]){
                stockBeer[i+1+i].addEventListener("click", (event) => {
                    event.preventDefault();
                    if(rBas){
                        rBas.style.visibility = "visible";}
                    let basQuantity = document.getElementById('basQuantity');
                    if(basQuantity){
                        basQuantity.value = stockBeer[i*2].value;}
                    let montant = "Total = ";
                    let rBB = [];
                    rBB.push(document.getElementsByClassName("rBB"));
                    sum.splice(0, sum.length)
                    if(aBasket[i]){
                        if(aBasket[i].id){
                            let resultPrice = stockBeer[i*2].value * price[i].value;
                            allBasket.classList.replace("allBasket", "allBasket2");
                            let str2 = bi.children[0].children[0].src;
                            ab.style.height = "80px";
                            ab.innerHTML =  '<img style="width: 50px;" src=' + str2 + ' alt=""> <span class="respon14">X ' + basQuantity.value + ' = <b class="rBB">' +  parseFloat(resultPrice).toFixed(2) + "</b>€" + '</span>';
                            for( let l=0; l<rBB[0].length; l++){
                                rBB[0][l];
                                sum.push(rBB[0][l].textContent);}
                            function sumArray(){
                                let numSum = 0;
                                for (let q=0 ; q<sum.length ; q++){
                                    numSum += parseFloat(sum[q]);}
                                return numSum;};
                            if(rBas){
                                rBas.value = montant + sumArray().toFixed(2) + '€';}
                        }
                    }
                    if(ab){
                        if(ab.children.length == 2 && stockBeer[i*2+1].children[0].value == 'Ajouter'){
                            addBI.push(ab.id);}
                        stockBeer[i*2+1].children[0].value = 'Modifier';
                        ac3[i].children[0].style.visibility = "visible";
                        order.style.visibility = "visible";
                        ac3[i].children[0].style.height = "50px";}
                    if(allBasket.clientWidth<250){
                        let str4 = rBas.value;
                        console.log(str4);
                        rBas.style.width = "175px";
                        let q = str4.slice(17, str4.length);
                        console.log(q);}
                        // rBas.value = q;
                })
            }
        }
    }   

    if(nB){
        if(nB.children[0].textContent){
            rBas.style.visibility = "visible";
            let nB1 =  nB.children[1].textContent
            let kabi = 'addBasInfo' + nB1;
            let resultPrice2 = nB.children[0].textContent * nB.children[2].textContent;
            allBasket.classList.replace("allBasket", "allBasket2");
            let beerId2 = 'beer' + nB1;
            let ba = 'basAdd' + nB1;
            let dBb = 'deleteBeerBas' + nB1;
            let ab2 = document.getElementById(kabi);
            let bi2 = document.getElementById(beerId2);
            let ba2 = document.getElementById(ba);
            let db = document.getElementById(dBb);
            let str22 = bi2.children[0].children[0].src;
            ab2.innerHTML =  '<img style="width: 50px;" src=' + str22 + ' alt=""> <span class="respon14">X ' + nB.children[0].textContent + ' = <b class="rBB">' +  parseFloat(resultPrice2).toFixed(2) + "</b>€" + '</span>';
            let rBB = [];
            rBB.push(document.getElementsByClassName("rBB"));
            sum.splice(0, sum.length)
            for( let l=0; l<rBB[0].length; l++){
                rBB[0][l];
                sum.push(rBB[0][l].textContent);}
            function sumArray(){
                let numSum = 0;
                for (let q=0 ; q<sum.length ; q++){
                    numSum += parseFloat(sum[q]);}
                return numSum;};
            if(rBas){
                rBas.value = montant + sumArray().toFixed(2) + '€';}
            if(ab2){
                if(ab2.children.length == 2 && ba2.children[0].value == 'Ajouter'){
                    addBI.push(ab2.id);}
                ba2.children[0].value = 'Modifier';
                db.children[0].style.visibility = "visible";
                order.style.visibility = "visible";
                db.children[0].style.height = "50px";}
        }
    }
})