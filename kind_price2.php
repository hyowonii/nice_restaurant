<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="kind_price.css">
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
        <?php include "header.php";?>
        <title>Document</title>
    </head>
    <body>
        <div class="main_content">
            <h1><a href="main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
            <form action="kind_price.php" method="post">
                <h2>착한 가격 식당</h2>
                <div id="choose" name="choose">
                    <div class="gu-region">
                        <h3>지역별</h3>
                        <input type="submit" id="all" value="전체" name="all"></button>
                        <input type="submit" id="gangnam" value="강남구" name="gangnam"></button>
                        <input type="submit" id="mapo" value="마포구" name="mapo"></button>
                        <input type="submit" id="songpa" value="송파구" name="songpa"></button>
                        <input type="submit" id="yongsan" value="용산구" name="yongsan"></button>
                        <input type="submit" id="jongro" value="종로구" name="jongro"></button>
                    </div>
                    <div class="foodtype">
                        <h3>업태별</h3>
                        <input type="submit" id="korean" value="한식" name="korean"></button>
                        <input type="submit" id="chinese" value="중식" name="chinese"></button>
                        <input type="submit" id="japanese" value="경양식일식" name="japanese"></button>
                    </div>
                </div>
            </form>
        </div>

       <div id="line"></div>

        <form>
            <div class="mymenu">
                <input type="button" value="마이페이지" onclick="location.href='mypage.php'">
                <input type="button" value="리뷰" onclick="location.href='review2.php'">
                <input type="button" value="착한가격식당" onclick="location.href='kind_price2.php'">
                <input type="button" value="순위" onclick="location.href='ranking.php'">
            </div>
        </form>
    </body>
</html>