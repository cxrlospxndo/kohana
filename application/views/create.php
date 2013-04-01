<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
<?php 
    echo html::anchor('user', 'Users'); 
    echo form::open('user/create'); 
?>
<table>
<tr>
    <td>Create new user</td>
</tr>
<?php
    echo "<tr>";
    echo "<td>".form::label('name', 'Name: ')."</td>";
    echo "<td>".form::input('name', '')."</td>";
    echo "</tr>";
     
    echo "<tr>";
    echo "<td>".form::label('email', 'Email: ')."</td>";    
    echo "<td>".form::input('email', '')."</td>";    
    echo "<tr/>";
     
    echo "<tr>";
    echo "<td>".form::label('password', 'Password: ')."</td>";    
    echo "<td>".form::password('password', '')."</td>";    
    echo "<tr/>";
     
    echo "<tr>";
    echo "<td>".form::submit('submit', 'Create user')."</td>";
    echo "</tr>";
?>
</table>
<?php echo form::close(); ?>
</body>
</html>