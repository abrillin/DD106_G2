<?php 
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");
    
	$sql = "select * from `encyclopedia` where `no`=:no";
    $encyEdit = $pdo->prepare($sql);

    $encyEditInfo = json_decode(file_get_contents("php://input"));

    $encyEdit-> bindValue(":no", $encyEditInfo); // ?

    $encyEdit -> execute();
    
    if ($encyEdit->rowCount() == 0) {
        echo "0";
    } else {
  
        $encyRow = $encyEdit->fetch(PDO::FETCH_ASSOC);
  
        $item = array("no", "title", "content", "title_img", "video", "question", "answer", "type");
  
        for ($i = 0; $i < count($item); $i++) {
  
            $_SESSION["ency_" . $item[$i]] = $encyRow[$item[$i]];
        }
  
        echo "1";
    }
  
  }catch(PDOException $e){
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
  }
  ?>  
