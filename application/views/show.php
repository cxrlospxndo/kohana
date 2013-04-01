<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
<?php 
    echo html::anchor('user', 'Users'); 
    echo "<br/>";

    $default = 'http://www.gravatar.com/avatar/';
    $size = 80;
    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    echo "<img src=".$grav_url. "alt= />";
    echo "<br/>";

    echo "Current user with id: ".$user_id;
    echo "<br/>";

    echo "Name : ".$name;
    echo "<br/>";

    echo "Email : ".$email;
    echo "<br/>";

    if(count($user_urls)>0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<td>Titulo</td>";
        echo "<td>shorturl</td>";
        echo "<td>longurl</td>";
        echo "</tr>";  
        for( $i = 0; $i<count($user_urls);$i++)
        {    
            $array = (array)$user_urls[$i];
            echo "<tr>";
            echo "<td>".$array['titulo']."</td>";
            echo "<td>".html::anchor('redirect/'.$array['shorturl'], $array['shorturl'])."</td>";
            echo "<td>".html::anchor('redirect/'.$array['shorturl'], $array['longurl'])."</td>";
                    
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/>";
    }

    echo form::open('url/create/'.$user_id); 
    echo "<table>";
    echo "<tr>Crear Url</tr>";
    echo "<tr>";
    echo "<td>".form::label('titulo', 'Titulo: ')."</td>";
    echo "<td>".form::input('titulo', '')."</td>";
    echo "</tr>";
     
    echo "<tr>";
    echo "<td>".form::label('shorturl', 'Shorturl: ')."</td>";    
    echo "<td>".form::input('shorturl', '')."</td>";    
    echo "<tr/>";
     
    echo "<tr>";
    echo "<td>".form::label('longurl', 'Longurl: ')."</td>";    
    echo "<td>".form::input('longurl', '')."</td>";    
    echo "<tr/>";
     
    echo "<tr>";
    echo "<td>".form::submit('submit', 'Create url')."</td>";
    echo "</tr>";
    echo "</table>";

    echo form::close(); 
?>     
</body>
</html>