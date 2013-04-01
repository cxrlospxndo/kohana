<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
<?php 
    echo html::anchor('user', 'Users'); 
?>
    <table class="list" cellspacing="0">   
    <tr>
        <td class="headers">name</td>
        <td class="headers">email</td>
        <td class="headers">password</td>
    </tr>    
<?php

    echo "<tr>";
    echo "<td class='item'>".$user->name."</td>";
    echo "<td class='item'>".$user->email."</td>";
    echo "<td class='item'>".$user->password."</td>";
    // echo "<td class='item'>".html::anchor('user/delete/'.$user->id)."</td>";        
    // echo "<td class='item'>".html::anchor('user/show_update_editor/'.$user->id)."</td>";        
    echo "</tr>";
?>
</table>
</body>
</html>