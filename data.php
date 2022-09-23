<?php
class data
{
	public function connection($host,$user,$password,$database)
	{
		$connection=mysqli_connect($host,$user,$password,$database);
		if(!$connection)
		echo "connection denied";
		return $connection;
	}
	public function fetch_data($connection,$query)
	{
		$result=mysqli_query($connection,$query);
		$num=mysqli_num_rows($result);
		for($i=0;$i<$num;$i++){
			$row=mysqli_fetch_array($result);
			$photo=$row['image'];			
			echo "<img src='$photo' alt='art'>";
			echo $row['title'];
			echo $row['description'];

		}
	}
	public function close($connection)
	{
		mysqli_close($connection);
	}
}
$object=new data();
$connection=$object->connection("localhost","root","","ankitsharma");
$query="select * from photos";
$object->fetch_data($connection,$query);
$object->close($connection);
?>