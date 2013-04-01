<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
<?php 
    echo html::anchor('user', 'Back to Users'); 
    echo "<h1>Current user</h1>";
    //" with id: ".$_SESSION['id']."</h1>";
    
    $default = 'http://www.gravatar.com/avatar/';
    $size = 80;
    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    echo "<img src=".$grav_url. "alt= />";

    echo "<ul>";
    echo "<li>Name : ".$name."</li>";
    echo "<li>Email : ".$email."</li>";

    $urls = count($user_urls);
    echo "<li>Total number of shortened URLs : ".$urls."</li>";
    echo "<ul>";

    if($urls>0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<td>Titulo</td>";
        echo "<td>shorturl</td>";
        echo "<td>longurl</td>";
        echo "<td>clicks</td>";
        echo "<td>created at</td>";
        echo "</tr>";  
        for( $i = 0; $i<$urls;$i++)
        {    
            $array = (array)$user_urls[$i];
            echo "<tr>";
            echo "<td>".$array['titulo']."</td>";
            echo "<td>".html::anchor('redirect/index/'.$array['shorturl'], $array['shorturl'], array("target" => "_blank"))."</td>";
            echo "<td>".html::anchor('redirect/index/'.$array['shorturl'], substr($array['longurl'],0,60), array("target" => "_blank"))."</td>";
            echo "<td>".$array['cont']."</td>";
            echo "<td>".$array['creation_date']."</td>";        
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/>";
    }

    echo form::open('url/create/'.$user_id); 
    echo "<table>";
    echo "<tr>Create New Url</tr>";
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