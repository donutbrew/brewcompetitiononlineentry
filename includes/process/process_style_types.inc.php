<?php 
/*
 * Module:      process_style_types.inc.php
 * Description: This module does all the heavy lifting for adding/editing info in the "style_types" table
 */

if ($action == "add") {
	$insertSQL = sprintf("INSERT INTO style_types (
	styleTypeName, 
	styleTypeOwn, 
	styleTypeBOS, 
	styleTypeBOSMethod
	) 
	VALUES 
	(%s, %s, %s, %s)",
                       GetSQLValueString(capitalize($_POST['styleTypeName']), "text"),
                       GetSQLValueString($_POST['styleTypeOwn'], "text"),
                       GetSQLValueString($_POST['styleTypeBOS'], "text"),
					   GetSQLValueString($_POST['styleTypeBOSMethod'], "text"));
	//echo $insertSQL;				   
	mysql_select_db($database, $brewing);
  	$Result1 = mysql_query($insertSQL, $brewing) or die(mysql_error());
	header(sprintf("Location: %s", $insertGoTo));				   
	
}

if ($action == "edit") {
	$updateSQL = sprintf("UPDATE style_types SET
	styleTypeName=%s, 
	styleTypeOwn=%s, 
	styleTypeBOS=%s, 
	styleTypeBOSMethod=%s
	WHERE id=%s",
                       GetSQLValueString(capitalize($_POST['styleTypeName']), "text"),
                       GetSQLValueString($_POST['styleTypeOwn'], "text"),
                       GetSQLValueString($_POST['styleTypeBOS'], "text"),
					   GetSQLValueString($_POST['styleTypeBOSMethod'], "text"),
                       GetSQLValueString($id, "int"));
	//echo $updateSQL."<br>";
  	mysql_select_db($database_brewing, $brewing);
  	$Result1 = mysql_query($updateSQL, $brewing) or die(mysql_error());
  	header(sprintf("Location: %s", $updateGoTo));			
}

?>