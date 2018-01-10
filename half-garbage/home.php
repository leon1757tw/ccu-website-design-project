<?php session_start(); ?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="home.css" type="text/css">
</head>

<body>
    <!-- <div id="page"> -->
    <!-- header -->
    <div id="header">
        <div id="navigation">
            <div id="mark">
                <a href="home.html"><img src="fixed_part_photo/mark.png" alt="mark"></a>
            </div>
            <div id="user">
                <a href="login.html">
                                <img src="fixed_part_photo/user.png" alt="user" width="35px">
                            </a>
            </div>
            <ul id="menu">
                <li class="selected">
                    <a href="member.html" target="parent" style="text-decoration:none">會員專區</a>
                </li>
                <li>
                    <a href="search.html" target="parent" style="text-decoration:none">訂單查詢</a>
                </li>
                <li>
                    <a href="shopping-car.html" target="parent" style="text-decoration:none">我的購物車</a>
                </li>
                <li>
                    <a href="home.html" target="parent" style="text-decoration:none">馬上購票</a>
                </li>
            </ul>

        </div>
    </div>
    <!-- product -->
    <!-- show carousel img -->
    <div id="show_img">
        <div class="carousel">
            <button id="prev">
                    <img src="photo/arrow.png"/>
                </button>
            <div class="items">
                <div class="item show">
                    <div>
                        <img src="photo/01.jpg">
                    </div>
                </div>
                <div class="item show">
                    <div>
                        <img src="photo/02.jpg">
                    </div>
                </div>
                <div class="item show">
                    <div>
                        <img src="photo/03.jpg">
                    </div>
                </div>
                <div class="item show">
                    <div>
                        <img src="photo/04.jpg">
                    </div>
                </div>
                <div class="item show">
                    <div>
                        <img src="photo/06.jpg">
                    </div>
                </div>
                <button id="next">
                    <img src="photo/arrow.png"/>
                </button>

            </div>
        </div>
    </div>

    <div id="body">
        <form action="">
            <input id="search-box" type="text" name="search-box" style="width:150px;">
            <input type="submit" value="搜尋" class="search-button" style="width:50px;height:30px;">
        </form>
        <div>
            <h1>Ticket</h1>
            <ul>
                <li>

                    <a href="productA.html" style="text-decoration:none">
                    <img src="photo/11.jpg" alt="Model S">
                <div>
                    <h1>model s</h1>
                    <p align="left"><h4>與傳統四輪驅動系統相較，雙馬達 Model S 是一項突破性改革。車身前後各搭載一台馬達，使 Model S 能夠分別對前後轉速進行數位式獨立控制，進而實現在各種條件下無與倫比的循跡控制。
                            
                            傳統全輪驅動車輛採用複雜的機械連結將動力從單一引擎分配給四個車輪...</h4></p>
                    <a href="shopping-car.html" class="more" style="text-decoration:none">加入購物車</a>
                </div>
                </a>
                </li>
        <li>
            <a href="productB.html" style="text-decoration:none">
                            <img src="photo/B.jpg" alt="Model X 75D">
                            <div>
                                <h1>Model X 75D</h1>
                                <p><h4>Model X為Tesla最新發表的純電動運動休旅車，配備全時四輪驅動及100kWh 電池，續航里程達565公里，乘坐空間寬敞，最多可容納7名成人及其隨身行李，Model X共有75D、100D 和P100D三個版本...</h4></p>
                                <a href="shopping-car.html" class="more" style="text-decoration:none">加入購物車</a>
    </div>
    </a>
    </li>
    <li>
        <a href="productC.html" style="text-decoration:none">
                            <img src="photo/C.jpg" alt="Model S P100D">
                            <div>
                                <h1>Model S P100D</h1>
                                <p align="left"><h4>MODEL S P100D車型將會搭载100kWh的電池里程套件，並搭載雙電機，採用全輪驅動。
                                        另外，新車0-100km/h的加速時間約為2.7秒，最大續行里程或將超過531公里...</h4></p>
                                <a href="shopping-car.html" class="more" style="text-decoration:none">加入購物車</a>
        </div>
        </a>
    </li>
    <li>
        <a href="productD.html" style="text-decoration:none">
                            <img src="photo/D.jpg" alt="Model X Merchandise">
                            <div>
                                <h1>Model X Merchandise</h1>
                                <p><h4>不和那麼大的車感覺到型號X看一看，但是實際上有達全長5037mm×整幅2070mm的堂堂的尺寸。這個不讓一邊是大型，一邊這麼想感到奇怪對設計吧...</h4></p>
                                <a href="shopping-car.html" class="more" style="text-decoration:none">加入購物車</a>
        </div>
        </a>
    </li>
    </ul>
    </div>
    </div>
    <!-- footer -->
    <div id="footer">
        <div>
            <p>
                地址:嘉義縣民雄鄉裕農路20號<br><br> 專線:0922-975-244/05-2277889
                <br><br>
                <a href="mailto:tesla@ccu.edu.tw" style="text-decoration:none">信箱:tesla@ccu.edu.tw</a> <br><br> 開放時間:每周一至五9:00AM-6:00PM
                周末不開放
            </p>
        </div>
    </div>
    <!-- </div> -->

    <script>
        let index = 1
        let items = document.querySelectorAll(".carousel .items .item")
        let background = document.querySelector(".carousel .background")
        let carousel = document.querySelector(".carousel")
        const nextItem = () => {
            if (index == items.length - 1)
                return
            items[index].classList.remove("show")
            index += 1
            index %= items.length
            items[index].classList.add("show")
            checkButton()
            if (background)
                background.style.backgroundImage = `url(${items[index].querySelector('img').src}),url(${items[index].querySelector('img').src})`
        }
        const prevItem = () => {
            if (index == 0)
                return
            items[index].classList.remove("show")
            index += items.length - 1
            index %= items.length
            items[index].classList.add("show")
            checkButton()
            if (background)
                background.style.backgroundImage = `url(${items[index].querySelector('img').src}),url(${items[index].querySelector('img').src})`
        }
        const checkButton = () => {
            if (index == items.length - 1) {
                next.style.display = "none"
            } else {
                next.style.display = "block"
            }
            if (index == 0) {
                prev.style.display = "none"
            } else {
                prev.style.display = "block"
            }
        }
        next.onclick = nextItem
        prev.onclick = prevItem
        prevItem()
        carousel.onkeydown = e => {
            switch (e.keyCode) {
                case 39:
                    {
                        nextItem()
                        break

                    }
                case 37:
                    {
                        prevItem()

                        break
                    }
            }
        }
    </script>
</body>

</html>