<?php
    session_start();
    ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
    include 'conn.inc.php';
    include 'pages.inc.php';
    $con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
    die ('Unable to connect. Check your connection parameters.');
    
    $city = (isset($_GET['city'])) ? trim($_GET['city']) : '';
    $from_date = (isset($_GET['from_date'])) ? trim($_GET['from_date']) : '';
    $to_date = (isset($_GET['to_date'])) ? trim($_GET['to_date']) : '';

$html='<table>';
    $html.='<tr>';
        $html.='<th>Ref</th>';
        $html.='<th>Date</th>';
        $html.='<th>Place</th>';
        $html.='<th>Title</th>';
        $html.='<th>price per person</th>';
    $html.='</tr>';
    $query = 'SELECT * FROM picnics';

    if(!empty($city) && !empty($from_date) && !empty($to_date)){
        $query.=' WHERE departurelocation="'.$city.'" AND departuredate BETWEEN "'.$from_date.'" AND DATE_ADD("'.$to_date.'", INTERVAL 1 DAY);';
    }
    elseif(empty($city) && !empty($from_date) && !empty($to_date)){
        $query.=' WHERE departuredate BETWEEN "'.$from_date.'" AND DATE_ADD("'.$to_date.'", INTERVAL 1 DAY);';
    }
    elseif(!empty($city) && empty($from_date) && !empty($to_date)){
        $query.=' WHERE departurelocation="'.$city.'" AND  departuredate <="'.$to_date.'";';
    }
    elseif(!empty($city) && !empty($from_date) && empty($to_date)){
        $query.=' WHERE departurelocation="'.$city.'" AND  departuredate <="'.$from_date.'";';
    }
    elseif(empty($city) && empty($from_date) && !empty($to_date)){
        $query.=' WHERE departuredate <="'.$to_date.'";';
    }
    elseif(empty($city) && !empty($from_date) && empty($to_date)){
        $query.=' WHERE departuredate >="'.$from_date.'";';
    }
    elseif(!empty($city) && empty($from_date) && empty($to_date)){
        $query.=' WHERE departurelocation="'.$city.'";';
    }
    
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $html.=' <tr>';
            $html.='<td><a href="'. PICNIC_MAIN_PAGE .'?q='.$row['picnicid'].'">'.$row['picnicid'].'</a></td>';
            $html.='<td>' . $row['departuredate'] . '</td>';
            $html.='<td>' . $row['place'] . '</td>';
            $html.='<td>' . $row['title'] . '</td>';
            $html.='<td>' . $row['priceperperson'] . '</td>';
            $html.='<td><button class="">Book Now!</button></td>';
            $html.='</tr>';
        }
        $result->free();
    }
    $con->close();
    $html.='</table>';
echo $html;
include 'headers/footer.html';

function ScopedInclude($file, $params = array())
{
    extract($params);//pass parameter to file included
    include $file;
}
?>