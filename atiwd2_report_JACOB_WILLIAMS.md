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
6. Script for providing data to scatterChart.html:  
    * [yearJSON.php](https://github.com/SnoozyRests/atiwd2/blob/master/charts/yearJSON.php)   
---  
## XML Parsers: DOM VS STREAM  
Both DOM and Stream parsers are used in development and they both have features suited towards different situations.  
DOM parsers are object based and load the entire XML file into memory for parsing, this means that if the file is  
exceptionally large, the DOM parser will use up a larger amount of memory. DOM parser work by parsing an entire file   
and creating a DOM tree which is then returned to the user for processing. Stream parsers however are event based  
parsers, and don't store the XML as it reads it. Stream parsers work by encountering a <tag> and triggering an event  
that a tag has started, it then parses through until it reaches a </tag>, whence it triggers a tag ended event.  

DOM and stream parsers also provide some varying functionalities. DOM parsers are read / write which means you can   
edit, insert, or delete nodes once the DOM tree has been returned to you. Stream parsers are read only however, which    
means you can only view data parsed by the parser, and not edit the file in any way. DOM parsers also allow for   
backwards navigation, allowing you to reverse back up through the created tree to view previous nodes. Stream parsers    
however are linear in operation, and do not support backwards navigation.

From these points, one may assume that DOM parsers are the only real choice for parsers. This would be wrong to   
assume, as DOM parsers, due to their increasing memory usage, can become very taxing when using larger amounts of data.    
Furthermore, the functionality of DOM parsers are lost when you only desire to parse documents to retrieve data, the   
functionality of writing isnt needed when your parser only needs to read. Stream parsers are also much better at parsing    
large files, due to the fact that they do not store data in memory, meaning they use generally significantly fewer   
resources.

Concluding, I believe which parser you should use is entirely context dependent, if you need to edit data as it works,
use DOM. If you just need to get certain data fast, use Stream.  

---
## Chart and Data Visualisation

**Scatter Chart**  
To improve the visualisation and functionality of the scatter chart I added a few HTML elements that allowed the  
refining of the data searching, namely these were:  
    1. A drop down list for the stations.  
    2. A drop down list for the years.  
    3. A time input box.  
These give the user the ability to change the data being displayed on the graph at the click of a button, rather  
than having to reload the page each time a change needs to be made. Further on this, it also means that the  
script for retrieving the data doesnt have to be changed each time, meaning that a single script can be used to  
retrieve all the data required for the graph.  
I also added a trendline to the scatter graph, given the nature of a scatter graph it can be difficult to  
ascertain just what the data is implying. By adding this trend curve the user can get a basic idea of  
the levels of NO2 at a glance, they can see whether levels are on a low or on the rise quickly.
