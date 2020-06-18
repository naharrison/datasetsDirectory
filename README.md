# datasetsDirectory
php/javascript/css files for an online directory of CLAS12 datasets

## Info
- In index.php, set $dir (around line 53) to point to the directory which contains the datasets. 
- The $dir directory should contain subdirectories (the datasets) which contain all the relevant files for that dataset (e.g. Lund files, configuration files, simulated/reconstructed files, etc.)
- The subdirectores must contain a file named "info.xml" that contains the metadata in XML format, e.g.:
- Tip: Use MAMP to run php file (useful tutorial: https://www.youtube.com/watch?v=RwQW0Qy85jY)

```XML
<metadata>
   <reaction>dvcs</reaction>
   <energy>11.0</energy>
   <gemcVersion>2.5</gemcVersion>
   <torusScale>-0.5</torusScale>
   <solenoidScale>0.5</solenoidScale>
   <coatVersion>3.0</coatVersion>
   <runNo>10</runNo>
   <variation>test</variation>
   <comment>baseline configuration, empty target</comment>
</metadata>
```

- Currently, this code should be located in /group/clas/www/clasweb/html/clas12mcfiles/
- The web location is https://clasweb.jlab.org/clas12mcfiles/
