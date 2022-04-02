<?php
$data=$_REQUEST['datavalue'];
$os=array('Intro to Os','Process Scheduling','Process Concurrency','Memory Management','Deadlocks');
$se=array('Agile Process Models','Requirement Analysis & Design','Importance of SE','Architectural Design');
$cn=array('Physical Layer','Network Layer','Introduction to Computer Networks','Medium Access Control Sub layer','Transport Layer','Data Link Layer');
$dbms=array('Relational Model','Normalization','Introduction to DBMS','Transaction','Entity Relationship Model
');
$ds=array('Stacks','Linked List','Binary Tree','Sorting');
if($data=="os")
{
  foreach($os as $aone)
  {
      echo"<option value='$aone'>$aone</option>";
    }
}

if($data=="se")
{
  foreach($se as $aone)
  {
      echo"<option value='$aone'>$aone</option>";
    }
}

if($data=="cn")
{
  foreach($cn as $aone)
  {
      echo"<option value='$aone'>$aone</option>";
    }
}

if($data=="dbms")
{
  foreach($dbms as $aone)
  {
      echo"<option value='$aone'>$aone</option>";
    }
}

if($data=="ds")
{
  foreach($ds as $aone)
  {
      echo"<option value='$aone'>$aone</option>";
    }
}
?>
