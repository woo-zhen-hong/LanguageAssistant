<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">

    <title>語言小幫手</title>
    <link href="home.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>

    <div class="home-box">
        <h2>功能選擇</h2>
        <form>
            <div align="center">
                <!--<button class="createVol" onclick="openForm()">建立或編輯題庫</button><br><br>-->
                <input type="button" value="選擇題庫" name="createquiz" style="width:150px;height:50px;" onclick="openChooseForm()"><br><br>
                <input type="button" value="字彙練習" name="volcabularypractice" style="width:150px;height:50px;" onclick="openPracticeForm()"><br><br>
                <input type="button" value="字彙測驗" name="volcabularytest" style="width:150px;height:50px;" onclick="openTestForm()"><br><br>
            </div>    
        </form>
        <form action="logout.php" method="post">
            <div align="center">
                  <button class="btn btn-primary">登出</button>
            </div>  
        </form>

        <div class="form-popup" id="vol">
          <form action="Qb.html" class="form-container" method="get">
            <h1>選擇題庫</h1>
        
            <label for="volca"><b>題庫</b></label>
            <select id="shopList" name="shopList">
            <option value="">--- Select ---</option>
            </select>
            <button type="submit" class="btn">編輯/查看</button>
            <button type="button" class="btn create" onclick="openCreateForm()">建立一個新題庫</button>
            <button type="button" class="btn cancel" onclick="closeForm()">關閉視窗</button>
          </form>
        </div>

        <div class="form-popup" id="CreateF">
          <form action="CQB.html" class="form-container" method="get">
            <h1>建立題庫</h1>
        
            <label for="boxName"><b>題庫名稱</b></label>
            <input type="text" placeholder="Enter name" name="boxname" id="boxname" required>

            <button type="submit" class="btn">建立</button>
            <button type="button" class="btn cancel" onclick="closeCreateForm()">關閉視窗</button>
          </form>
        </div>

        <div class="form-popup" id="practicevol">
          <form action="WordsPractice.html" class="form-container" method="get">
            <h1>選擇題庫</h1>
        
            <label for="volca"><b>題庫</b></label>
            <select id="practiceList" name="practiceList">
            <option value="">--- Select ---</option>
            </select>
            <button type="submit" class="btn">練習</button>
            <button type="button" class="btn cancel" onclick="closePracticeForm()">關閉視窗</button>
          </form>
        </div>

        <div class="form-popup" id="testvol">
          <form action="WordsTest.html" class="form-container" method="get">
            <h1>選擇題庫</h1>
        
            <label for="volca"><b>題庫</b></label>
            <select id="testList" name="testList">
            <option value="">--- Select ---</option>
            </select>
            <button type="submit" class="btn">測驗</button>
            <button type="button" class="btn cancel" onclick="closeTestForm()">關閉視窗</button>
          </form>
        </div>
    </div>
    
    <script>
      function openChooseForm() {
        document.getElementById("vol").style.display = "block";
      }
      
      function closeForm() {
        document.getElementById("vol").style.display = "none";
      }

      function openCreateForm() {
        document.getElementById("vol").style.display = "none";
        document.getElementById("CreateF").style.display = "block";
      }

      function closeCreateForm() {
        document.getElementById("CreateF").style.display = "none";
      }

      function openPracticeForm() {
        document.getElementById("practicevol").style.display = "block";
      }

      function closePracticeForm() {
        document.getElementById("practicevol").style.display = "none";
      }

      function openTestForm() {
        document.getElementById("testvol").style.display = "block";
      }

      function closeTestForm() {
        document.getElementById("testvol").style.display = "none";
      }
    </script>

  </body>
  <!-- 下拉式選單跟資料庫連接 -->
  <?php
    include "index.php";
    $account = $_SESSION['account'];

    $sql = "SELECT `name` FROM `quiz` WHERE `account` = '" .$_SESSION['account'] .  "';";
    $result = mysqli_query($con, $sql);

    if(!$sql){
        echo "Execute SQL failed : ". mysql_error();
      exit;
    }
    $shopCodeArr=array();     //用來存哪些選項的陣列
    $shopCount=0;
    while($rows=mysqli_fetch_array($result, MYSQLI_NUM))
    {
      $shopCodeArr[$shopCount]=$rows[0];                  //row[0] 是指第一個資料欄
      $shopCount++;
    }
    for($i=0;$i<count($shopCodeArr);$i++)
    {
      echo "<script type=\"text/javascript\">";
      echo "document.getElementById(\"shopList\").options[$i]=new Option(\"$shopCodeArr[$i]\",\"$shopCodeArr[$i]\");";
      echo "document.getElementById(\"practiceList\").options[$i]=new Option(\"$shopCodeArr[$i]\",\"$shopCodeArr[$i]\");";
      echo "document.getElementById(\"testList\").options[$i]=new Option(\"$shopCodeArr[$i]\",\"$shopCodeArr[$i]\");";
      echo "</script>";
    }
  ?>
  
</html>