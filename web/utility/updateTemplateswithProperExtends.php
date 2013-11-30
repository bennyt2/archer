<?php
$path = "/var/www/archer.bennyt.me/htdocs/archer/src/Archer/MeetEntryBundle/Resources/views";
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);
foreach($objects as $name => $object){
    echo $name."<br>";
    if ($name != "/var/www/archer.bennyt.me/htdocs/archer/src/Archer/MeetEntryBundle/Resources/views/layout.html.twig" && $name != "/var/www/archer.bennyt.me/htdocs/archer/src/Archer/MeetEntryBundle/Resources/views/base.html.twig") {
    
      //read the entire string
      $str=file_get_contents($name);

      //replace something in the file string - this is a VERY simple example

      $str=str_replace("{% extends '::base.html.twig' %}", "{% extends 'ArcherMeetEntryBundle::layout.html.twig' %}",$str);

      if (file_put_contents($name, $str)) {
        echo "updated $name<br>";
      } else {
        echo "did not update $name<br>";
      }
          
    }
}
?>