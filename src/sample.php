<?php
if(isset($_POST["gender"]) && ($_POST["gender"]=="男" || $_POST["gender"]=="女")){
 print "<b>あなたの性別は</b>";
 print $_POST["gender"];
}else{
 print "性別が選択されていません。";
}
?>