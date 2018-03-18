Advanced Topics in Web Development 2 Report
=======
## Jacob John Williams - 15008632

## All Files
1. Script for extracting data from CSV and creating XML Files  
    * [CSVExtract.php](https://github.com/SnoozyRests/atiwd2/blob/master/php/CSVExtract.php)  
2. Creates the XML files:  
    * [brislington.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/brislington.xml)  
    * [fishponds.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/fishponds.xml)  
    * [newfoundland_way.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/newfoundland_way.xml)  
    * [parson_st.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/parson_st.xml)  
    * [rupert_st.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/rupert_st.xml)  
    * [wells_rd.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/original/wells_rd.xml)
---  
3. Script for normalising the XML data:  
    * [createNO2.php](https://github.com/SnoozyRests/atiwd2/blob/master/php/createNO2.php) 
4. Creates the XML files:  
    * [brislington_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/brislington_NO2.xml)  
    * [fishponds_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/fishponds_NO2.xml)  
    * [newfoundland_way_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/newfoundland_way_NO2.xml)   
    * [parson_st_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/parson_st_NO2.xml)  
    * [rupert_st_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/rupert_st_NO2.xml)  
    * [wells_rd_NO2.xml](https://github.com/SnoozyRests/atiwd2/blob/master/xml/no2/wells_rd_NO2.xml)  
---
5. HTML files for creating the charts / graphs:  
    * [scatterChart.html](https://github.com/SnoozyRests/atiwd2/blob/master/charts/scatterChart.html)  
    * [lineGraph.html](https://github.com/SnoozyRests/atiwd2/blob/master/charts/lineGraph.html)  
6. Scripts for providing data to the HTML files:  
    * [yearJSON.php](https://github.com/SnoozyRests/atiwd2/blob/master/charts/yearJSON.php)  
    * [dayJSON.php](https://github.com/SnoozyRests/atiwd2/blob/master/charts/dayJSON.php)  
---  
## XML Parsers: DOM VS STREAM  
Both DOM and Stream parsers are used in development, and they both have features suited towards different situations.  
DOM parsers are object based and load the entire XML file into memory for parsing, this means that if the file is  
exceptionally large, the DOM parser will use up a larger amount of memory. DOM parser work by parsing an entire file   
and creating a DOM tree which is then returned to the user for processing. Stream parsers however are event based  
parsers, and doesnt store the XML as it reads it. Stream parsers work by encountering a <tag> and triggering an event  
that a tag has started, it then parses through until it reaches a </tag>, whence it triggers a tag ended event.  

DOM and stream parsers also provide some varying functionalities. DOM parsers are read / write which means you can   
edit, insert, or delete nodes once the DOM tree has been returned to you. Stream parsers are read only however, which    
means you can only view data parsed by the parser, and not edit the file in any way. DOM parsers also allow for   
backwards navigation, allowing you to reverse back up through the created tree to view previous nodes. Stream parsers    
however are linear in operation, and do not support backwards navigation.

From these points, one may assume that DOM parsers are the only real choice for  parsers. This would be wrong to   
assume, as DOM parsers, due to their increasing memory usage, can become very taxing when using larger amounts of data.    
Furthermore, the functionality of DOM parsers are lost when you only desire to parse documents to retrieve data, the   
functionality of writing isnt needed when your parser only needs to read. Stream parsers are also much better at parsing    
large files, due to the fact that they do not store data in memory, meaning they use generally significantly fewer   
resources.

Concluding, I believe which parser you should use is entirely context dependent, if you need to edit data is it works,  
use DOM. If you just need to get certain data fast, use Stream.
