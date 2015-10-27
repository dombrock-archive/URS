<?php 
   
  // open the db file (test.db) if it exists, or create it if it doesn't   
  $db = new SQLite3('test.db'); 
   
  // create a new table in the file 
  $db->exec('CREATE TABLE test (id INT, message STRING)'); 
   
  // insert some things into it. 
  $db->exec("INSERT INTO test (id, message) VALUES ('1', 'test message')"); 
  $db->exec("INSERT INTO test (id, message) VALUES ('2', 'test message 2')"); 
   
  // make a select 
  $results = $db->query("SELECT * FROM test WHERE ID = 2"); 
                 
  // print some results  
  print_r($results->fetchArray()); 
   
?>