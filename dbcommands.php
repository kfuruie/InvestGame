<?php 
require('connectdb.php');
// require: if a required file is not found, reqire() produces a fatal error, the rest of the script won't run
// include: if a required file is not found, include() thorws a warning, the rest of the script will run


// Prepared statement (or parameterized statement) happens in 2 phases:
//   1. prepare() sends a template to the server, the server analyzes the syntax
//                and initialize the internal structure.
//   2. bind value (if applicable) and execute
//      bindValue() fills in the template (~fill in the blanks.
//                For example, bindValue(':name', $name);
//                the server will locate the missing part signified by a colon
//                (in this example, :name) in the template
//                and replaces it with the actual value from $name.
//                Thus, be sure to match the name; a mismatch is ignored.
//      execute() actually executes the SQL statement


function addUser($user, $pwd)
{
	global $db;
	
	$query = "INSERT INTO user_info (username, password) VALUES (:username, :password)";
	
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $user);
	$statement->bindValue(':password', $pwd);
	$statement->execute();     // if the statement is successfully executed, execute() returns true
	// false otherwise
	
	$statement->closeCursor();
}

function updateShares($user, $fury, $le)
{
	global $db;
	
	$query = "UPDATE user_info SET fury_shares=:fury, le_shares=:le WHERE username =:username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $user);
	$statement->bindValue(':fury', $fury);
	$statement->bindValue(':le', $le);
	$statement->execute();
	$statement->closeCursor();
}

/*
function deleteTask($id)
{
	global $db;
	
	$query = "DELETE FROM todo WHERE task_id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}*/


function getAllUsers()
{
	global $db;
	$query = "SELECT username, fury_shares, le_shares FROM user_info";
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}


function getShares_by_id($user)
{
	global $db;
	
	// echo "in getTaskInfo_by_id " . $id ;
	
	$query = "SELECT fury_shares, le_shares FROM username where username = :user";
	$statement = $db->prepare($query);
	$statement->bindValue(':user', $user);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	// fetch() return a row
	$results = $statement->fetch();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

?>

