<?
class headercode{
public function  getCode($name1){
   $gen = array(0 => array('name' => 'Home', "url" => 'index.php')
             ,1 => array('name' => 'Image Search', "url" => '#')
			 ,2 => array('name' => 'Crawler Status', "url" => 'crwlrst.php')
			 ,3 => array('name' => 'Add your web site', "url" => 'add.php')
			 );
	 $acc = array(0 => array('name' => 'Device', "url" => 'login_device.php')
                 ,1 => array('name' => 'Manage', "url" => '')
			 );
    // Create Menu
    echo '<table class=navbar cellpadding=0>';
    echo '<tr style="background-color: #0C0C0C;" >';		 
     foreach ($gen as $i => $value) { 
     	if($name1==$value['name'])
     	{
	     echo '<td class=navlst><a href="'.$value['url'].'" class="navitm" style="background-color: rgba(20, 102, 104, 0.88);">'.$value['name'].'</a></td>';
	    }
	    else 
     	{
     	echo '<td class=navlst><a href="'.$value['url'].'" class="navitm">'.$value['name'].'</a></td>';
       }
    }
     echo '</tr>';
    echo '</table>';
	}
public function  getCodeL($name1){
   $gen = array(0 => array('name' => 'Home', "url" => 'index.php')
             ,1 => array('name' => 'Download', "url" => 'download.php')
			 ,2 => array('name' => 'Licence', "url" => 'licence.php')
			 ,3 => array('name' => 'Forum', "url" => 'forum.php')
			 ,4 => array('name' => 'Support', "url" => 'support.php')
			 ,5 => array('name' => 'Contact us', "url" => 'contact_us.php')
			 ,6 => array('name' => 'Screenshot', "url" => 'screenshot.php')
			 ,7 => array('name' => 'Login', "url" => 'login_u.php')
			 );
	 $acc = array(0 => array('name' => 'Device', "url" => 'login_device.php')
                 ,1 => array('name' => 'Manage', "url" => '')
			 );
    // Create Menu
    echo '<table class=navbar cellpadding=0>';
    echo '<tr style="background-color: #0C0C0C;" >';		 
     foreach ($gen as $i => $value) { 
     	if($value['name']=='Login')
     	{
	     echo '<td class=navlst><a href="'.$value['url'].'" class="navitm" style="background-color: rgba(20, 102, 104, 0.88);">'.$value['name'].'</a></td>';
	    }
	    else 
     	{
     	echo '<td class=navlst><a href="'.$value['url'].'" class="navitm">'.$value['name'].'</a></td>';
       }
     }
     echo '</tr>';
     echo '<tr style="background-color: rgba(20, 102, 104, 0.88)">';
      foreach ($acc as $i => $value1) { 	
	    if($value1['name']==$name1)
         {echo '<td><a href="'.$value1['url'].'" class="navitm_s" style="background-color: rgba(0, 177, 127, 0.95);color:white;" >'.$value1['name'].'</a></td>'; }
        else
         {echo '<td><a href="'.$value1['url'].'" class="navitm_s">'.$value1['name'].'</a></td>'; }		
     }
     if (sizeof($gen)>sizeof($acc))
     {
     $diff=sizeof($gen)-sizeof($acc);
      for($i = 0; $i < $diff; ++$i)
     {
        echo '<td></td>';
     }

    }
     echo '</tr>';
     
    echo '</table>';
	}
}
?>