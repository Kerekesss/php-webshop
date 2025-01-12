<?php
header('Content-type: text/css');

?>

#demo {
            font-family: Arial, sans-serif;
            font-size: 20px;
            margin-top: 20px;
        }

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style: none;
    font-family: "Montserrat", serif;
}

body {
    width: 100%;
    height: 100vh;
}

nav {
    position: fixed;
    height: 65px;
    background: rgb(255, 255, 255, 90%);
    width: 100%;
    z-index: 999;
    box-shadow: 0 4px 2px -2px rgb(202, 202, 202);
}



nav .navMain {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

nav .navMobile {
    display: none;
}

nav .navMain .navLogo a {
    display: flex;
    align-items: center;
    text-decoration: none;
    margin-right: 50px;
}

nav .navMain .navLogo a:hover {
    text-decoration: none;
}

nav .navMain .navLogo:hover {
    border: none;
}




nav .navMain ul {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    gap: 22px;
    margin-left: 20px;
}

nav .navMain ul li {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}



nav .navMain li a {
    color:black;
}

nav .navMain li:hover {
    cursor: pointer;
}




.navMain .navCart {
    position: relative;
    display: flex;
}

.navMain .navCart  .span1 {
    font-size: 1.2rem;
    color:rgb(241, 109, 0);
    position: absolute;
    top: 7px;
    left: 25px;
    background: white;
    height: 22px;
    min-width: 20px;
    display: flex;
    justify-content: center;
}



.navMain .navCart:hover {
    transform: scale(1.2);
}

.navMain .navCart:hover .span2 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.navMain .navDropdown {
   position: relative;
   height: 100%;

}

.navMain .navHidden {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: absolute;
    width: 150px;
    height: 0px;
    background: rgb(255, 255, 255, 95%);
    top: 65px;
    left: -10px;
    padding: 0 10px;
    border-radius: 0 0 4px 4px;
    transition: all 0.2s ease-in-out;
    opacity: 0;

}




.navMain .navHidden li {
    width: 100%;
}

.navMain .navHidden li:hover {
    font-weight: bold;

}


.navMain .navDropdown:hover .navHidden {
    gap: 0;
    height: 100px;
    opacity: 100%;
}


.navMain .navDark {
    z-index: -1;
    position: fixed;
    top: 65px;
    left: 0;
    height: 0px;
    width: 100%;
    background: rgb(1, 1, 1, 60%);
    transition: all 0.2s ease;
    opacity: 0;
}

.navMain .navDropdown:hover + .navDark {
    height: calc(100% - 65px);
    transition: all 0s ease;
    opacity: 100%;

}





.navMain .homeHeader nav {
    background: white;
    box-shadow: none;

}

main {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url("Assets/Images/mobilePhone4.jpg") center/cover no-repeat fixed;
}

main div {
    width: 750px;
    margin: 0 auto;
}

.homeLink {
    width: 750px;
    display: flex;
    flex-direction: column;
    gap: 50px;
    margin-top: 10px;
    align-items: center;
}

.mainH1 {
    min-height: 127px;
    text-shadow: 5px 5px 5px black;
    text-align: center;
    color: white;

}

.mainH1 h1:first-child {
    font-size: 2.5rem;
}


.homeLink #typeAn {
    font-size: 4rem;
}


.homeLink a {
    min-width: 270px;
    display: flex;
    gap: 10px;
    padding: 20px;
    border-radius: 30px;
    background: rgb(255, 255, 255, 100%);
    box-shadow: 0px 0px 10px black;
    color: black;
    font-weight: bold;

}

.homeLink a:hover {
}

.homeLink .up-hidden {
    display: none;
}

.homeLink a:hover .up-hidden {
    display: block;
}


button {
    padding: 5px 10px;
    font-size: 1.4rem;
    background: black;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;

    
}


.products {
    min-height: 100%;
    width: 100%;
    background: white;

}


.productsMain {
    padding: 100px 0;
    min-height: 100%;
    width: 900px;
    margin: 0 auto;
    justify-content: center;
}

.productSearch {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.productSearch input {
    padding: 10px 15px;
    font-size: 1.1rem;
    border: white;
    outline: none;
    border-radius: 50px;
    width: 150px;
    transition: all 0.2s ease-in-out;
    background: rgb(245, 245, 245);
}



.productSearch input:hover {
    border: 1px solid rgb(170, 170, 170);
    cursor: pointer;


}

.productSearch input:focus {
    position: relative;
    cursor: revert;
    border: 1px solid rgb(170, 170, 170);
    width: 200px;
    
}

.productSearch input:focus + .navDark {
    height: calc(100% - 65px);
    opacity: 100%;
    left: 0;
}

input:focus::placeholder {
  opacity: 0;
}


.productList {
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    gap: 40px;
}


.productFilter {
    width: 200px;
    margin-top: 30px;
    padding: 20px;
    border: 2px solid black;
    border-right: none;
    border-left: none;
}

.productFilter.is-active {
    border-radius: 10px;
    border: 3px solid black;
    border-right: none;
    border-left: none;

}

.filterHidden {
    display: none;
}

.filterHidden.is-active {
    display: block;
}

.filterHidden h3 {
    margin-top: 30px;
}

.filterToggleMenu {
    display: flex;
    cursor: pointer;
}



.toggleFilter {
    width: 100%;
    display: flex !important;
    align-items: center;
    gap: 20px;
}



.toggleFilter.is-active {
    display: none !important;
}

.closeFilter {
    display: none !important;
}

.closeFilter.is-active {
    width: 100%;
    display: flex !important;
    align-items: center;
    gap: 20px;
}


.clearFilters {
    margin-top: 20px;
    width: 100%;
    display: flex;
    justify-content: center;
}

.clearFilters a {
    font-weight: bold;
}

.clearFilters a:hover {
    border-bottom: 2px solid ;

}



.productFilter button {
    font-size: 1rem;
}

.productFilter h1, .productFilter h3, hr, .productBrand {
    margin-bottom: 10px;
}

.productItems {
    min-height: 880px;
    width: 670px;
    padding: 30px 30px;
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 20px;
    background: rgb(247, 247, 247);
    border-radius: 30px;
}



.productItems img {
    width: 150px;
    height: 150px;
}



.productItem {
    height: 260px;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    transition: all 0.2s ease-in-out;
}

.productItem:hover {
    background: white;
    box-shadow: 0px 0px 10px rgb(202, 202, 202);
    transform: scale(1.1);
}



.productItem a{
    color: black;
}

.productItem a:hover h3{
    text-decoration: underline;
}



.productItems span {
    font-weight: bold;
}


.productSingle {
    min-height: 100%;
    width: 100%;
    padding-bottom: 100px;
    display: flex;
    justify-content: center;

}

.productSingle a:hover {
    text-decoration: underline;
}

.productMain {
    width: 1000px;
    margin: 0 auto;
    margin-top: 200px;
    display: flex;
    justify-content: center;
    gap: 50px;
}

.productMain p {
    width: 500px;
    margin-top: 20px;
}


.productImages img {
    height: 100px;
    width: 100px;
    margin: 0;
}

.productInfo { 
    display: flex;
    flex-direction: column;
}

.slider {
    position: relative;
    width: 350px;
    overflow: hidden;
}

.slider img {
    margin: 0 auto;
    margin-bottom: 50px;
    width: 250px;
    height: 250px;
    display: none;
}

img.displaySlide {
    display: block;
    animation-name: fade;
    animation-duration: 1.5s;
}

.slider button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2rem;
    padding: 10px 15px;
    background-color: hsla(0, 0%, 0%, 0.5);
    color: white;
    border: none;
}

.prev {
    left: 0;
}

.next {
    right: 0;
}

@keyframes fade {
    from {opacity: .5}
    to {opacity: 1}
}

.addToCartSection {
    width: 200px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.addToCartSection p {
    margin-top: 0;
    margin-bottom: 20px;
}

.productForm {
    display: flex;
    flex-direction: column;
    gap: 5px;

}

.productForm input {
    width: 70px;
    padding: 5px;
    font-size: 1.3rem;
}

.productForm button {
    background: rgb(236, 174, 58);
    transform: none;
}

.productForm button:hover {
    background: rgb(206, 135, 3);

}


button.loginToSee {
    padding: 0;
    background: none;
    color: #551A8B;
    transform: none;
    text-decoration: underline;
    text-align: start;

}

button.loginToSee:hover {
    color: black;
}


.products .showAll {
    display: flex;
    width: 200px;
    padding: 20px;
    justify-content: center;
    margin: 0 auto;
    margin-top: 20px;
    font-size: 1rem;
    border: 2px solid black;
    color: black;
    font-weight: bold;
}

.showAll:hover {
    text-decoration: underline;
}

.productPageSelect {
    display: flex;
    justify-content: center;
    gap: 10px;
    padding: 10px 0;
    margin: 0 auto;
    margin-top: 20px;
    width: 300px;

    
}



.productPageSelect a {
    width: 30px;
    display: flex;
    justify-content: center;
    font-size: 1.3rem;
    font-weight: bold;
}

.productPageSelect a:hover {
    text-decoration: underline;
    color: black;
}

a:active {
    color: black;
}

.noProductToShow {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}





footer {
    width: 100%;
    height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    background: rgb(247, 247, 247);
}

.footerMain {
    height: 100%;
    width: 900px;
    padding-top: 50px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    font-size: 1.1rem;
}

.footerLogo {
    display: flex;
    align-items: center;
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    
}



.footerContent {
    display: flex;
    gap: 100px;
}


.footerList {
    display: flex;
    gap: 50px;
}

.footerList h3 {
    margin-bottom: 10px;
}

.footerList a {
    color: rgb(50, 50, 50);
}

.footerLogo a {
    color: black;
}


.footerList a:hover {
    color: black;
    font-weight: bold;
}

.footerCopyright {
    margin-top: 50px;
    text-align: center;
    font-weight: bold;
}



.sign_up {
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    align-items: center;
    
}

.sign_up h1 {
    font-size: 3rem;
    margin-bottom: 10px;
}

.sign_up_main {
    width: 550px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgb(202, 202, 202);
    padding: 30px;

}

.sign_up form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: center;
}


.sign_up input {
    padding: 5px 10px;
    border: 1px solid rgb(202, 202, 202);
    border-radius: 5px;
    width: 400px;
    font-size: 1.1rem;
    line-height: 2rem;
}

.sign_up input:focus {
    outline: none;
}

.sign_up a:hover {
    text-decoration: underline;
}

.shoppingCart {
    min-height: 100%;
    width: 100%;
    padding: 150px 0;
}


.shoppingCart h3 a {
    color: black;
}

.shoppingCartMain {
    display: flex;
    flex-direction: column;
    width: 900px;
    margin: 0 auto;
}

.shoppingCartEmpty {
    display:flex;
    font-size: 1.5rem;
    width: 100%;
    gap: 10px;
    height: 500px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}



.shoppingCartMain > h1 {
    box-shadow: 0 4px 2px -2px rgb(202, 202, 202);
    padding-bottom: 10px;
}



.shoppingCartItems {
    display: flex;
    justify-content: space-between;
}

.shoppingCartProducts {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 80%;
}

.shoppingCartProductSingle {
    width: 100%;
    padding: 10px 10px;
    display: flex;
    gap: 10px;
    box-shadow: 0 4px 2px -2px rgb(202, 202, 202);
}


.shoppingCartProductInfo {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.shoppingCartProductInfo>div {
    display: flex;
    flex-direction: column; 
    justify-content: space-around;
}

.shoppingCartProductInfo form {
    display: flex;
    gap: 5px;
}
.shoppingCartProductInfo form option {
    text-align: center;
    
}

select {
  width: 50px;
  font-size: 1.1rem;
}

select.option {
    height: 50px;
}






.shoppingCart img {
    width: 150px;
    height: 150px;
    margin-right: 10px;
}

.shoppingCart a:hover {
    text-decoration: underline;
}

.shoppingCartProducts button {
    width: 70px;
    font-size: 1rem;
    padding: 0;
    background: none;
    color: black;
    transform: none;
}

.shoppingCartProducts button:hover {
    color: black;
    text-decoration: underline;
}

.updateButton {
    background:rgb(0, 204, 255) !important;
    padding: 3px 5px !important;
    display: none;
}

.updateButton:hover {
    text-decoration: none !important;

}

.displayButton {
    display: block !important;
}

.shoppingCartBuy {
    background:rgb(236, 235, 235);
    width: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 2px solid rgb(202, 202, 202);
}

.shoppingCartBuy form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.shoppingCartBuy button {
    background: rgb(236, 174, 58);

}

.shoppingCartBuy button:hover {
    background: rgb(206, 135, 3);
}



.ordersPage {
    min-height: 100%;
    width: 100%;
    padding: 150px 0;
}

.ordersPage a {
    color: black;
}

.ordersPageMain {
    display: flex;
    flex-direction: column;
    width: 900px;
    margin: 0 auto;
}

.ordersPageMain > h1 {
    box-shadow: 0 4px 2px -2px rgb(202, 202, 202);
    padding-bottom: 10px;
}

.ordersPageProducts {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
}

.ordersPageProductSingle {
    width: 100%;
    padding: 10px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 2px -2px rgb(202, 202, 202);
}

.ordersPageLink {
    width: 100%;
    display: flex;
}

.ordersPageProductInfo {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    gap: 5px;
}

.ordersPage img {
    width: 150px;
    height: 150px;
    margin-right: 10px;
}

.ordersPage a:hover {
    text-decoration: underline;
}




.ordersPageItems button {
    width: 100px;
    font-size: 1rem;
    padding: 0;
    background:rgb(255, 255, 255, 0%);
    color: black;
    border-radius: 0px;
}

.ordersPageItems button:hover {
    text-decoration: underline;
}

.ordersPage .dates {
    width: 100%;
    display: flex;
    justify-content: space-around;

}

.about {
    width: 100%;
    min-height: 100%;
    padding: 120px 0px;
}

.aboutMain {
    height: 100%;
    width: 900px;
    margin: 0 auto;
    padding: 50px 100px;
    background: rgb(247, 247, 247);
    border-radius: 30px;
}

.aboutMain h1 {
    margin-bottom: 10px;
}

.aboutSection {
    width: 100%;
    height: 100%;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.aboutSection img {
    width: 300px;
    height: 300px;
}




.error {
    height: 50px;
    width: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid rgb(245, 161, 161);
    border-radius: 5px;
    background:rgb(250, 203, 203);
    color:rgb(177, 20, 20);
    text-align: center;
    padding: 30px 0px;
    font-size: 1.2rem;
}



@media screen and (max-width: 1000px) {
    

    nav .navMain {
        display: none;
        
    }

    nav .navMobile {
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
    }

    nav .navMobile ul {
        margin: 0;
    }

    nav .navMobile .mobileMenu.is-active  {
        position: fixed;
        background: rgb(255, 255, 255, 95%);
        width: 100%;
        height: calc(100% - 65px);
        top: 65px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 50px;
    }

    nav .navMobile .mobileMenu{
        display: none;
    }

    .navMobile .mobileMenuToggle {
        font-size: 2rem;
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .navLogoMobile {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navLogoMobile li a {
        color: black;
    }

   

    .mobileMenu ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .mobileMenu ul li a {
        color: black;
    }

    .navMobile .closeMenu {
        display: none;
        cursor: pointer;
    }

    .navMobile .toggleMenu {
        display: flex;
        cursor: pointer;
    }
    
    .navMobile .closeMenu.is-active {
        display: flex;
    }
    
    .navMobile .toggleMenu.is-active {
        display: none;
    }

    .navMobile .productSearch input{
        text-align: center;
    }

    .navMobile .navCart {
        position: relative;
        display: flex;
    }

    .navMobile .navCart  .span1 {
        font-size: 1.2rem;
        color:rgb(241, 109, 0);
        position: absolute;
        top: 0;
        left: 25px;
        background: white;
        height: 22px;
        min-width: 20px;
        display: flex;
        justify-content: center;
    }

    main div {
        width: 550px;
    }
    
    .mainH1 h1:first-child {
        font-size: 2rem;
    }


    .homeLink #typeAn {
        font-size: 3rem;
    }



    .productsMain {
        width: 550px;
    }

    .productList {
        flex-direction: column;
        align-items: center;
    }



    .productItems {
        min-height: 880px;
        width: 550px;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }



    .productItems img {
        width: 150px;
        height: 150px;
    }



    .productItem {
        height: 260px;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .productItem:hover {
        background: white;
        box-shadow: 0px 0px 10px rgb(202, 202, 202);
        transform: scale(1.1);
    }






    .productMain {
        width: 550px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .productMain p {
        width: 450px;
    }


    .productImages {
        display: flex;
    }

    .productImages img{
        height: 100px;
        width: 100px;
    }

    .slider {
        width: 450px;
    }

    




    .aboutMain {
        width: 550px;
        padding: 15px 25px;
    }


    .aboutSection {
        display: flex;
        align-items: start;
    }

    .aboutSection img {
        width: 200px;
        height: 200px;
    }




    .shoppingCartMain {
        width: 550px;
    }

    .shoppingCartItems {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .shoppingCartProducts {
        width: 100%;
    }

    .shoppingCartBuy {
        height: 200px;
        width: 100%;
        border: 2px solid rgb(202, 202, 202);
    }



    .ordersPageMain {
        width: 550px;
    }

    .ordersPage img {
        width: 125px;
        height: 125px;
    }

   
    .ordersPage .dates {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }


    footer {
        width: 100%;
        height: 600px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        background: rgb(247, 247, 247);
    }

    .footerMain {
        height: 100%;
        max-width: 450px;
        padding-top: 50px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        font-size: 1.1rem;
    }

    .footerLogo {
        display: flex;
        justify-content: center;
        
    }



    .footerContent {
        display: grid;
        gap: 50px;
    }

   
}



@media screen and (max-width: 600px) {


    main div {
        width: 350px;
    }

    .mainH1 h1:first-child {
        font-size: 1.2rem;
    }


    .homeLink #typeAn {
        font-size: 2rem;
    }


    .aboutMain {
        width: 320px;
    }


    .aboutSection {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .aboutSection img {
        width: 150px;
        height: 150px;
    }




    .productsMain {
        width: 350px;
    }

    .productItems {
        width: 350px;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }

    .productItems img {
        width: 100px;
        height: 100px;
    }



    .productItem {
        height: 220px;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .productItem:hover {
        background: white;
        box-shadow: 0px 0px 10px rgb(202, 202, 202);
        transform: scale(1.1);
    }



    .productMain {
        margin-top: 150px;
        width: 350px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .productMain p {
        width: 250px;
    }


    .productImages {
        display: flex;
    }

    .productImages img{
        height: 70px;
        width: 70px;
    }

    .slider {
        width: 250px;
    }

    .slider img {
        height: 125px;
        width: 125px;
    }



    .shoppingCartMain {
        width: 350px;
    }

    .shoppingCartItems {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .shoppingCartProducts {
        width: 100%;
    }

    .shoppingCartBuy {
        height: 200px;
        border: 2px solid rgb(202, 202, 202);
    }

    .shoppingCart img {
        height: 100px;
        width: 100px;
    }

    .shoppingCartProductInfo {
        display: flex;
        gap: 5px;
        flex-direction: column;
    }

    
    .shoppingCartProductInfo>div {
        gap: 10px;
    }




    .ordersPageProductSingle {
        flex-direction: column;
    }

    .ordersPageMain {
        width: 350px;
    }

    .ordersPage img {
        width: 125px;
        height: 125px;
    }

   

    .ordersPageItems button {
        width: 200px;
        margin: 10px 0;        
    }

    



    footer {
        height: 750px;
    }

    

    .footerLogo {
        display: flex;
    }



    .footerList {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }

    .footerList li a {
        display: flex;
        justify-content: center;
    }

    .footerList h3 {
        text-align :center;
    }


    .sign_up_main {
        width: 300px;
    }

    .sign_up h1 {
        font-size: 2rem;
    }

    .sign_up input {
        padding: 5px 10px;
        width: 250px;
        font-size: 1rem;
        line-height: 1.5rem;
    }

    .error {
    height: 50px;
    width: 250px;
    padding: 15px 0;
    font-size: 0.95rem;
}

}