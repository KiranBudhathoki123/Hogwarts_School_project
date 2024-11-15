<?php
include 'connection.php';
session_start();
function isUserLoggedIn(){
    return isset($_SESSION['userId']);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navs">
            <div class="logo">
                <h1>LOGO</h1>
            </div>
            <div class="menus">
                <ul class="lists">
                    <li><a class="items" href="home.php">Home</a></li>
                    <li><a class="items" href="about.php">About</a></li>
                    <li><a class="items" href="houses.php">Houses</a></li>
                    <li><a class="items" href="details.php">Details</a></li>
                    <li><a class="items" href="news.php">News</a></li>
                </ul>
            </div>
            <div class="login">
            <?php if(isUserLoggedIn()){
                    $id = $_SESSION['userId'];
                    $sql = "SELECT * FROM users WHERE `id` = '$id'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "
                    <div class='profile' onclick='profileRedirect()' style='background:url(upload_img/".$row['image'].");background-size: cover;
                    width: 30px;
                    cursor:pointer;
                    height: 30px;
                    border-radius: 25px;'></div>";}
                    else{
                        echo"
                    <button><a href='signin.php'>LOGIN</a></button>";
                    }
                    ?>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="item1">
            <img src="resources/DP logo-01.png" width="200px">
            <h1>Daily <span>P</span>rophet</h1>
            <img src="resources/DP logo-01.png" width="200px">
        </div>
        <div class="item2">
            <div class="inner1">
                <h1>*****THE DAILY PROPHET COMPETITION*****</h1>
                <h2>***********WIN A NIGHT IN***********</h2>
                <p>KATHMANDU</p>
            </div>
            <div class="inner2">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti in, odit vel totam ipsa cumque repellendus ullam voluptas adipisci nisi minima voluptatum laudantium nesciunt facilis omnis nobis blanditiis doloremque corporis nostrum qui molestias voluptatibus sapiente.</p>
            </div>
            <div class="inner3">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. <span>Perspiciatis optio velit,</span> voluptatem, distinctio ab numquam eos, <span>consectetur magnam nobis</span> adipisci ipsam praesentium magni. Nobis minus dolorem et odio voluptatem neque.</p>
            </div>
            <div class="inner4">   
                <div>&forall; &part; &exist; &empty; &nabla; &isin; &notin; &ni; </div>
                <div>&prod; &sum; &spades; &clubs; &sect; &curren; &yen; &iquest;</div>
                <div>&cent; &Omega; &Psi; &Phi; &thetasym; &psi; &phi; &gEl;;</div> 
                
            </div>
        </div>
        <div class="item3">
            <img src="resources/hand-01.png" width="150px">
            <h1>EXCLUSIVE</h1>
        </div>
        <div class="item4">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque officia doloremque mollitia nulla molestias? Corporis voluptatibus modi a voluptas dolorem!</p>
        </div>
        <div class="item5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus itaque et ullam est animi accusantium magni facere iste labore mollitia ipsam cum, dicta quaerat necessitatibus aliquid quisquam ab. Similique fugit blanditiis, architecto, modi voluptatibus ex officia, repellat provident maxime corrupti dignissimos adipisci omnis perspiciatis nam nulla voluptatem ipsa sunt obcaecati?</p>
        </div>
        <div class="item6">
            <h1>THE BOY WHO LIES?</h1>
        </div>
        <div class="item7">
            <h1>THERE</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, voluptatem nihil aut dolore quos eius distinctio soluta aliquid perspiciatis, autem molestias aliquam rerum labore amet, saepe exercitationem! Veniam reprehenderit eos iusto esse quidem nulla debitis placeat minima perferendis qui, dolor adipisci optio maiores incidunt, obcaecati, totam ipsa! Ipsa, perspiciatis iure?</p>
        </div>
        <div class="item8">
          <h1>H</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam nisi laborum aperiam error consequatur quidem illo magni perferendis sed quasi aspernatur doloribus deserunt possimus optio, libero perspiciatis animi excepturi? Ipsa dolorum assumenda odio voluptate magnam recusandae! Nobis obcaecati dolorum fuga!</p>
        </div>
        <div class="item9">
            <img src="resources/Screenshot 2023-05-28 151807.png" width="40%">
        </div>
        <div class="item10">
            <h1>IS SOMETHING HE IS HIDING...</h1>
        </div>
        <div class="item11">
            <h1>D</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deleniti veritatis? Inventore placeat ullam doloribus voluptates non aut ipsa provident sunt sed aliquid repellat nulla nesciunt, temporibus amet obcaecati quos! Exercitationem, tempore sapiente! Rerum libero necessitatibus natus reprehenderit vero labore, architecto dolor magnam vel possimus quaerat fuga officia suscipit ducimus. Expedita deserunt ipsa doloremque voluptate est unde quae? At eos vero deserunt nobis, mollitia maxime architecto, vitae quas, voluptate ipsum repellendus eligendi! Facere illum ullam pariatur eaque delectus, repellendus laborum deserunt distinctio ipsum dolore eos ratione dolores fuga eum quam laudantium quidem iste quod cumque esse? Deleniti suscipit eligendi aspernatur alias, rerum minima beatae, facere et nisi iusto, impedit omnis doloremque libero! Fugiat quam velit excepturi saepe veritatis, aspernatur architecto iure fugit quas impedit molestias quod voluptatem quis eligendi rerum, earum id ratione ipsam iusto. Non magni sed tempora in. Ea cupiditate optio dicta quibusdam facilis cum. Corporis ad, dolores qui distinctio velit inventore molestias nesciunt aliquid sequi aspernatur, blanditiis officia eligendi sit ipsa commodi cumque, esse laborum? Consequatur, iusto.</p>
        </div>
        <div class="item12">
            <img src="resources/hand-01.png" width="100px">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem commodi temporibus necessitatibus laborum minima voluptatibus quod placeat et? Eos earum cum dolore pariatur qui nostrum aut quo cupiditate omnis animi laboriosam eaque ex quaerat optio incidunt illo, necessitatibus vero iusto aliquam! Corporis dolore tempora aperiam tempore nobis laboriosam, quaerat eos temporibus, quas, hic cupiditate consequuntur dolorem sunt magni delectus beatae exercitationem quo officiis aliquid nam reiciendis nulla? Placeat maxime ratione voluptatibus est dignissimos exercitationem amet, dolor, incidunt impedit porro repudiandae maiores sint magni esse nostrum velit eaque, animi minus labore. Totam nam dicta praesentium eos, eveniet officia maiores delectus consectetur velit quaerat saepe nisi reprehenderit tempora necessitatibus fugit! Odio atque enim animi cum libero ipsum esse molestias cumque, odit temporibus!</p>
        </div>
        <div class="item13">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam doloremque accusantium molestias id, distinctio incidunt est beatae dignissimos, porro illum laudantium consectetur odio consequuntur aperiam, debitis aut magnam perferendis. Molestiae!</p>
        </div>
        <div class="item14">
            <h1>WIZARD</h1>
            <h2 class="left1">THE HIGH SECURITY</h2>
            <h1>PRISON</h1>
            <h1 class="left2">S</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, officia quas ut provident quod voluptatibus voluptate ipsa soluta error nobis et! Nobis assumenda incidunt aliquam officia pariatur modi obcaecati ipsum ab, aliquid nisi, omnis similique? Quam voluptas ipsum vero! Maiores nostrum obcaecati velit veniam sapiente ipsum iure. Ducimus maxime enim eum fuga natus animi suscipit quo iure expedita sequi. Quis hic minus eum corrupti cum?</p>
        </div>
        <div class="item15">
            <h1>L</h1>
            <p>orem ipsum dolor sit amet consectetur adipisicing elit. Veritatis reprehenderit nostrum explicabo laudantium dolore ad ullam culpa, numquam debitis, perspiciatis quos obcaecati accusantium? Dolores, tempora! Aperiam voluptate provident quas temporibus ullam cupiditate illo velit, impedit non repudiandae, aliquam voluptates, autem officia quos? Voluptatibus error nostrum officiis consequatur magni commodi in doloribus tenetur voluptatem, omnis nihil quos architecto optio ab nesciunt explicabo sed eveniet minima maiores veniam iure corrupti doloremque dicta? Explicabo eaque odio eum soluta perferendis voluptate doloribus veritatis nobis.</p>
        </div>
        <div class="item16">
            <h1>Sirius Black Escaped??</h1>
        </div>
        <div class="item17">
            <img src="resources/6710505-01.png" width="200px">
            <h2>GET CHANCE TO WAND YOUR VISION</h2>
        </div>
        <div class="item18">
            <img src="resources/40278 [Converted]-01.png" width="280px">
        </div>
        <div class="item19">
            <img src="resources/siriusblack-01.png" width="200px">
        </div>
        <div class="item20">
            <h1>DEAD OR ALIVE</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque rem provident beatae voluptates eligendi nesciunt, iusto, culpa amet ut recusandae soluta sequi ratione distinctio deserunt quia cumque maxime, quos dolorum doloribus? Saepe vitae quia facere magnam.</p>
        </div>
    </div>
    <script>
        function profileRedirect(){
            window.location.href="profile.php";
        }
    </script>
</body>
</html>