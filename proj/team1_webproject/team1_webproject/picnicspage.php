<?php
    session_start();
    ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
    include 'pages.inc.php';
    include 'conn.inc.php';
    $con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
    die ('Unable to connect. Check your connection parameters.');
	$html='';
	
	$picnicid = (isset($_GET['q'])) ? trim($_GET['q']) : '';

    if(isset($_GET['q']) && $_GET['q'] !== ''){
		$query = 'SELECT * FROM picnics WHERE picnicid='.$picnicid;
		if ($result = $con->query($query)) {
			$row = $result->fetch_assoc();
			if($row['picnicid']){
				$html.='<h1>'.$row['title'].'</h1>'; 

				$html.='<h3>Description</h3>';
				$html.='<p>'.$row['description'].'</p>';
				$html.='<p>Departure : '.$row['departurelocation'].' on '.$row['departuredate'].' at '.$row['departuretime'].'</p>';
				$html.='<p>Arrival Time : '.$row['arrivaltime'].'</p>';
				$html.='<p>Return Time : '.$row['returntime'].'</p>';
				$html.='<p>Capacity : '.$row['capacity'].'</p>';
				$html.='<p>Transportation : '.$row['transportation'].'</p>';
				
				$query ='SELECT activity FROM picnic_activities WHERE picnicid='.$picnicid;
				if($result = $con->query($query)){
					$html.='<h3>Activities</h3>';
					$html.='<ul>';
					while($activity_row = $result->fetch_assoc()){
						$html.='<li>'.$activity_row['activity'].'</li>';//while loop activities
					}
					$html.='</ul>';
				}

				$html.='<h3>Food Provided</h3>';
				$html.='<p>'.$row['food'].'</p>';
				$html.='<h3>Place : '.$row['place'].' </h3>';
				
				$query ='SELECT directory FROM picnic_photos WHERE picnicid='.$picnicid;
				if($result = $con->query($query)){
					$html.='<div>'; 
					$html.='<h3>Photos of the place</h3>';
					while($photo_row = $result->fetch_assoc()){
					$html.='<img src="'.$photo_row['directory'].'" alt="Place Photo" title="Place Photo">';
				}
				$html.='</div>';
				}

				$query ='SELECT name from picnics 
				INNER JOIN escorts ON picnics.escortid=escorts.escortid 
				INNER JOIN users ON escorts.userid=users.userid
				WHERE picnicid='.$picnicid;
				if($result = $con->query($query)){
					$escort_row=$result->fetch_assoc();
					$html.='<p>you will be escorted by '.$escort_row['name'].'</p>';
				}

				$query ='SELECT name,phone,email from picnics 
				INNER JOIN managers ON picnics.managerid=managers.managerid 
				INNER JOIN users ON managers.userid=users.userid
				WHERE picnicid='.$picnicid;
				if($result = $con->query($query)){
					$manager_row=$result->fetch_assoc();
					$html.='<p>for more information contact manager '.$manager_row['name'].', Email: '.$manager_row['email'].', Phone: '.$manager_row['phone'].'</p>';
				}
			}//if $row['picnicid']
			
			else{
				$html.='<h1>Unfortunately, this picnic does not exist :(</h1>'; 
			}
		}//if result query	
		echo $html;
	}//if is set $_GET['q']
	else{
		$html.='<h1>Sorry, there\'s nothing to do here</h1>';
		$html.='<p>you will be redirected to picnics page, <a href="'.PICNICS_PAGE.'">click here</a> if your browser does not support redirecting</p>';
		
	echo $html;
		header('Refresh: 5; URL=' . PICNICS_PAGE);
	}
include 'headers/footer.html';

function ScopedInclude($file, $params = array())
{
    extract($params);//pass parameter to file included
    include $file;
}

?>