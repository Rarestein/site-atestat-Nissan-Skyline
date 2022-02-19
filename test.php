<?php
echo '<html>
<head>


</head>';
echo '<body>' ;

$RaspunsuriCorecte = 0;

	if ( !isset( $_POST[ 'q1' ] ) || strlen( $_POST[ 'q1'] ) == 0 )
	{
	}
	elseif ($_POST['q1'] == '2')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q2' ] ) || strlen( $_POST[ 'q2'] ) == 0 )
	{
	}
	elseif ($_POST['q2'] == '4')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q3' ] ) || strlen( $_POST[ 'q3'] ) == 0 )
	{
	}
	elseif ($_POST['q3'] == '1')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q4' ] ) || strlen( $_POST[ 'q4'] ) == 0 )
	{
	}
	elseif ($_POST['q4'] == '3')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q5' ] ) || strlen( $_POST[ 'q5'] ) == 0 )
	{
	}
	elseif ($_POST['q5'] == '4')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q6' ] ) || strlen( $_POST[ 'q6'] ) == 0 )
	{
	}
	elseif ($_POST['q6'] == '1')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q7' ] ) || strlen( $_POST[ 'q7'] ) == 0 )
	{
	}
	elseif ($_POST['q7'] == '1')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

	if ( !isset( $_POST[ 'q8' ] ) || strlen( $_POST[ 'q8'] ) == 0 )
	{
	}
	elseif ($_POST['q8'] == '3')
	{
		$RaspunsuriCorecte  = $RaspunsuriCorecte + 1;
	}

    
    echo '<div align="center">';
	echo 'Raspunsuri corecte : '.$RaspunsuriCorecte ;


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tabel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    
    $sql = "INSERT INTO tabel (nume, prenume, clasa, punctaj)
    VALUES ( '". $_POST['nume']."', '". $_POST['prenume']. "', '". $_POST['clasa']."', '".$RaspunsuriCorecte."')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "SELECT * FROM tabel ORDER BY Punctaj DESC LIMIT 6";
    $result = $conn->query($sql);

    
    echo "<br>";
    
    if ($result->num_rows > 0) {
        // output data of each row
        $it = 1;
        echo '<table border="1">';
        echo '<caption> Scoruri </caption><br>';
        echo '<tr>';
        echo '<th width="120"> Loc </th>';
        echo '<th width="120"> Nume </th>';
        echo '<th width="120"> Prenume </th>';
        echo '<th width="120"> Clasa </th>';
        echo '<th width="120"> Punctaj </th>';
        echo '</tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$it.'</td>';
            echo '<td>'.$row["nume"].'</td>';
            echo '<td>'.$row["prenume"].'</td>';
            echo '<td>'.$row["clasa"].'</td>';
            echo '<td>'.$row["punctaj"].'</td>';
            $it = $it + 1;
        }
    } else {
        echo "0 results";
    }
    echo '</div>';
    $conn->close();
    
    echo '
</body>

</html> ';
?> 