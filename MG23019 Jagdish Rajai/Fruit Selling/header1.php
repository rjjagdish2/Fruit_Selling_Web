<div class="header">
        
        <div class="logo">

        </div>
        <div class="menu nav">
            
      
        <li>
        <?php
            if(isset($_COOKIE["username"])){
                echo "<a href='ProductDetails.php?ses=su'>";
            }
            else{
                echo "<a href='signup.php'>";
            }
            ?> All</a> </li>
            <li>
        <?php
            if(isset($_COOKIE["username"])){
                echo '<a href="ProductDetails.php?ses=wi">';
            }
            else{
                echo "<a href='signup.php'>";
            }
            ?>Winter</a> </li>
             <li>
        <?php
            if(isset($_COOKIE["username"])){
                echo '<a href="ProductDetails.php?ses=su">';
            }
            else{
                echo "<a href='signup.php'>";
            }
            ?> Summer</a> </li>
            
            <li>
        <?php
            if(isset($_COOKIE["username"])){
                echo '<a href="ProductDetails.php?ses=mo">';
            }
            else{
                echo "<a href='signup.php'>";
            }
            ?> Monsoon</a> </li>
            
            
        
        </div>
        <div class="search">
        <div class="cart">
                <a onclick="ckh('cart')">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
        </svg>      
        </a>
        </div>        
        
        </div>

        <div class="search">
        
        <div class="userlo">
        <a onclick="ckh('user')">
        <svg xmlns="http://www.w3.org/2000/svg" id="user" x="0" y="0" version="1.1" viewBox="0 0 500 500" xml:space="preserve"><switch><g><linearGradient id="XMLID_2_" x1="232.701" x2="254.411" y1="276.847" y2="549.872" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FFCA9D"></stop><stop offset=".854" stop-color="#FFD9A9"></stop></linearGradient><path id="XMLID_802_" fill="url(#XMLID_2_)" d="m455.3 504.2-5.1-113.6c-4.8-28.6-24.7-51.1-50-56.7l-91.4-16.1c-8.1-1.5-14.4-11.3-14.5-21.6l-2-47.4h-87.9l-2.1 49.4c-.4 9.7-6.5 17.7-14.6 19.2L97.4 334c-25.3 5.6-45.2 28.1-50 56.7l-5.1 113.6c51.6-.1 361.1-.1 413-.1z"></path><linearGradient id="XMLID_3_" x1="249" x2="249" y1="354.333" y2="474.409" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FFF"></stop><stop offset="1" stop-color="#E6FFFF"></stop></linearGradient><path id="XMLID_801_" fill="url(#XMLID_3_)" d="m308.8 504.2 20.4-183.5-17.7-3.3c-8.1-1.5-14.2-9.5-14.6-19.2l-48.1 55.5-48.1-55.5c-.4 9.7-6.5 17.7-14.6 19.2l-17.3 2.8 27 184.1h113z"></path><g id="XMLID_797_"><linearGradient id="XMLID_4_" x1="370.28" x2="370.28" y1="315" y2="496.496" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1A1A2B"></stop><stop offset="1" stop-color="#2E1B45"></stop></linearGradient><path id="XMLID_799_" fill="url(#XMLID_4_)" d="M460.6 400.5c0-39.6-19.2-60.4-51-68.3l-79-10.5-53.1 182.6H463l-2.4-103.8z"></path><linearGradient id="XMLID_5_" x1="129.615" x2="129.615" y1="315" y2="496.496" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1A1A2B"></stop><stop offset="1" stop-color="#2E1B45"></stop></linearGradient><path id="XMLID_798_" fill="url(#XMLID_5_)" d="M90.8 332.2c-31.8 7.9-51 28.7-51 68.3L37 504.2h185.2l-51.4-183.6-80 11.6z"></path></g><linearGradient id="XMLID_6_" x1="307.766" x2="307.099" y1="459.313" y2="303.969" gradientUnits="userSpaceOnUse"><stop offset=".038" stop-color="#001"></stop><stop offset="1" stop-color="#2E1B45"></stop></linearGradient><path id="XMLID_796_" fill="url(#XMLID_6_)" d="m297.8 506.8 33.7-58.2c4.2-6.4 8-10.6 1-20.3l-23-34h24.9c7.2 0 8.2-1.6 8.2-11.6l-1.4-55.8s-.4-2-.9-2.7c-.5-.6-2-1.3-2-1.3l-23-5.5-42.4 189.4h24.9z"></path><linearGradient id="XMLID_7_" x1="248.797" x2="248.797" y1="373.667" y2="489.684" gradientUnits="userSpaceOnUse"><stop offset=".549" stop-color="#FD0036"></stop><stop offset=".995" stop-color="#FF005F"></stop></linearGradient><path id="XMLID_795_" fill="url(#XMLID_7_)" d="m241.1 423-3.5 81.2h22.6l-3.5-81.6c-.2-3.3.4-8.5 1.2-10.7l8.6-20.7-17.5-36.4v-.8l-.2.4-.2-.4v.9L231 391.2l8.7 21.2c1.3 3 1.5 6.7 1.4 10.6z"></path><linearGradient id="XMLID_8_" x1="190.27" x2="189.603" y1="469.359" y2="314.054" gradientUnits="userSpaceOnUse"><stop offset=".038" stop-color="#001"></stop><stop offset="1" stop-color="#2E1B45"></stop></linearGradient><path id="XMLID_794_" fill="url(#XMLID_8_)" d="M162.9 393.1h24.9l-23 34c-7 9.7-3.3 13.9.9 20.3l34.5 58.2h25.3l-43.7-187.8-21.9 3.9s-2.6.2-3.3 2.3c-.2.7-.5 2.9-.5 2.9l-1.5 54.7c.2 9.9 1.1 11.5 8.3 11.5z"></path><path id="XMLID_793_" fill="#fff" d="M302.7 290.7c-2.6-6.1-4.3-4.7-8 .3l-45.9 62.7-45.9-62.7c-3.7-5.1-5.4-6.4-8-.3l-13.4 25.7 41.4 82.9c2.9 5.8 5.1 5.4 7.7-.3l18.1-44.6 18.1 44.6c2.6 5.8 4.9 6.1 7.7.3l41.4-82.9-13.2-25.7z"></path><g id="XMLID_761_"><g id="XMLID_780_"><linearGradient id="XMLID_9_" x1="349.625" x2="326.125" y1="170.211" y2="170.211" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FEC797"></stop><stop offset="1" stop-color="#FFD9A9"></stop></linearGradient><path id="XMLID_792_" fill="url(#XMLID_9_)" d="m329.9 134 6.2.4c9.3 2.6 19.4 11.4 17.1 25.6-2.1 12.9-3.2 14-5.8 30-3.7 22.7-22.3 15.3-22.3 15.3l4.8-71.3z"></path><linearGradient id="XMLID_10_" x1="146.167" x2="173.667" y1="172.711" y2="172.711" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FEC797"></stop><stop offset="1" stop-color="#FFD9A9"></stop></linearGradient><path id="XMLID_782_" fill="url(#XMLID_10_)" d="m168.7 136.5-6.2.4c-9.3 2.6-19.4 11.4-17.1 25.6 2.2 12.9 3.2 14 5.8 30 3.7 22.7 22.3 15.3 22.3 15.3l-4.8-71.3z"></path></g><linearGradient id="XMLID_11_" x1="249.223" x2="249.889" y1="95.822" y2="306.488" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FEC797"></stop><stop offset="1" stop-color="#FFD9A9"></stop></linearGradient><path id="XMLID_763_" fill="url(#XMLID_11_)" d="m248.7 57.3-87.2.4 4.6 146.2c0 10.9.8 19.9 11.9 35.3l31 35.6c10.3 11.2 18.5 12.2 29.7 12.2h20.2c11.2 0 18.4-3.2 26.1-11 0 0 20.3-18.4 33.8-34.5 8.2-9.8 10.3-19.8 10.3-30.7l7.4-153.1-87.8-.4z"></path><linearGradient id="XMLID_12_" x1="247.798" x2="247.798" y1="-3.667" y2="72.345" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#F4D969"></stop><stop offset=".863" stop-color="#F4BC55"></stop></linearGradient><path id="XMLID_762_" fill="url(#XMLID_12_)" d="M163.4 140.8c-2.4-4.1-10.6-36.7-11-57.4-.5-27.7-1.8-83.4 94-83.4h8.7c53 0 93.5 31.9 87.5 86.5-3.1 27.6-5.6 40-5.8 40.9-1.9 11.6-4.2 11.6-4 11.5v-38.8c0-13.8-1.3-41.7-28.6-35.8l-47.5 17.1s16.3-11.6 7.9-11.2c-6.2.3-51.6 16.2-51.6 16.2s20.6-16.2 15.6-16.5c-6.1-.4-44.6 19.2-44.6 19.2l9.3-25.2c-25.7-4.1-29.5 19.5-29.5 40.2l.2 31.6c0 3.6.3 6.5-.6 5.1z"></path></g></g></switch></svg>
        </a>
        </div>
        </div>

    </div>

    <style>
body{
    background-color: whitesmoke;
}
*{
 padding:0;
 margin:0;
 box-sizing:border-box;
 overflow-x: hidden;
 
 font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.main{
    margin: auto;
    border-bottom:5px solid rgb(143, 188, 143);
    border-radius: 0 0 16% 16%;
    height: 100vh;
    width: 90vw;
    /* background-color: red; */
    display:flex;
    justify-content:space-evenly;
    align-items:center;
    flex-direction: column;
    background: whitesmoke;
}
.parts{
    
    height: 80%;
    width: 90%;
    background-color: transparent;
    display:flex;
    justify-content:space-between;
    align-items:center;

}
.con_left{
    height: 80%;
    width: 100%;
    background: transparent;
}
.tex{
    
    margin-left: 3%;
    margin-top: 20%;
}
.con_left p{
    margin-top: 30px;
    font-size: 20px;
}
.con_left h1{
    
    margin-top: 10px;
    font-size: 50px;
}

.con_right{
    margin-left: 1%;
    
    height: 80%;
    width: 80%;
    background: url("../imgs/pngwing.com\ \(1\).png") no-repeat;
    background-color: transparent;
    
    background-size: cover;
    background-position: center;
}

.header{
    /* box-shadow: 0px 7px 6px 2px lightgray; */
    border: 1px solid lightslategrey;
    border-radius: 15px;
    width: 90%;
    display:flex;
    justify-content:space-evenly;
    /* border:2px solid black;     */
    align-items:center;
    height: 12%;
    overflow: hidden;
    /* background-color: linear-gradient(rgba(234, 237, 247, 0.8),rgba(234, 237, 247, 0.8));  */
    background-color: rgb(143, 188, 143);
    /* background-color: rgb(145, 179, 243); */

}
.logo{
    
    border:2px solid black;
    height: 100px;
    width: 100px;        
    background-repeat: no-repeat;
    background-size: 120px;
    
    background-image: url('../imgs/LOGO3.png') ;
}
.nav a{
    text-decoration: none;
    color: white;
    transition: all 0.2s;    
    
}
.nav a:hover{
    font-size: 23px;
    color: wheat;
}
.nav{
    /* margin-left: -15%; */
    width: 40%;
    color: white;
    
    display:flex;
    justify-content:space-evenly;
    /* border:2px solid black;     */
    align-items:center;
    /* background: orangered; */
}

.nav li{
    font-size: 20px;
    cursor: pointer;
    list-style: none;
}

.search{
    /* border:2px solid black; */
    display:flex;    
    justify-content:center;
    align-items:center;
    
}
.cart{
    overflow-y: hidden;
    cursor: pointer;
    width: 30px;
    color: white;
    height: 30px;
}
.cart a{    
    color: white;
    transition: all 0.2s;    
    
}
.cart svg:hover{
    color: wheat; 
    height: 33px;
    width: 33px;
    
    
}
.cart:hover{
color: wheat;
height: 33px;
width: 33x;
}
.userlo svg:hover{    
    width: 45px;
    height: 45px;
}
.userlo:hover{    
    width: 40px;
    height: 40px;
}

.userlo{
    overflow-y: hidden;
    padding-left: 5%;
    cursor: pointer;
    width: 40px;
    height: 40px;
}

.card-container{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 100px;
    
}
.card:hover{
    box-shadow: 0px 5px 5px rgb(143, 188, 143);
    
}
.card img:hover{
    padding: 3px; 
}
.card a{    
    text-decoration: none;
    color: white;
    transition: all 0.2s;        
}
.card a:hover{    
    
    color: maroon;    
}
.card{
    /* border:1px solid rgb(143, 188, 143); */
    width: 270px;
    /* background-color: #f0f0f0; */
    background-color: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0px 2px 4px rgb(0,0,0,0.2);
    margin: 25px;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction: column;
    height: 330px;
}
.card img{
    
    transition: all .2s linear;
    position: relative;
    width: 80%;
    height: 210px;
}
.card-content{
    padding: 6px;

}
.card-content h3{
    font-size: 20px;
    margin-bottom: 8px;
}


.card-content .btn{
    display: inline-block;
    padding: 8px 16px;
    background-color: #333;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 16px;
    color: #fff;
}

.card-container :nth-child(4){
    width: 50px;
    height: 50px;
    background-color: white;
    margin-top: 12%;
    border-radius: 50%;    
    transform: translate(100%);
    cursor: pointer;    
    color: white;
}

.card-container :nth-child(4) svg{    
    margin-top: 5px;
    
    cursor: pointer;     
    height: 25px;
    width: 25px;
    color: white;
    
    
}


.prelbl{
    /* background-color: rebeccapurple; */
    margin-top: 50px;
    margin-left: 12%;
    font-weight: 500;
    border:2px solid white;
    padding: 8px 25px;
    background-color: rgb(143, 188, 143);
    color: white;

    border-radius: 20px 0;
    height: fit-content;
    width: fit-content;
    font-size: 30px;
    margin-bottom: -7%;
}

    </style>