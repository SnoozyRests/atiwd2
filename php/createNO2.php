<?php
/*
 * Author: Jacob Williams - 15008632
 * Desc: Extracts relevant data from original XML files and writes new XML files
 * Notes: Only works if expected files are where they should be.
 *        Could probably add a buffer clear to improve execution time on lower
 *              spec machines
 *        Will have to rewrite files to associate for future updates.
 * Sources: https://blogs.msdn.microsoft.com/mfussell/2005/02/12/combining-the-xmlreader-and-xmlwriter-classes-for-simple-streaming-transformations/
 *          https://stackoverflow.com/questions/21065150/php-xmlreader-read-edit-node-write-xmlwriter
 *          https://www.ibm.com/developerworks/library/os-xmldomphp/index.html
 * 
 */
/*
 * FINAL DATA FORMAT:
 * <?xml version="1.0"?>
 * <data type="nitrogen dioxide">
 *      <location long="--" lat="--" id="-----">
 *          <reading val="--" time="--:--:--" date="--/--/----"/>
 *           ...
 *          <reading val="--" time="--:--:--" date="--/--/----"/> 
 *      </location>
 * </data>
 */

//define input and output file names.
$input = array("brislington.xml", "fishponds.xml", "parson_st.xml", 
    "rupert_st.xml", "wells_rd.xml", "newfoundland_way.xml");
$output = array("brislington_NO2.xml", "fishponds_NO2.xml", "parson_st_NO2.xml", 
    "rupert_st_NO2.xml", "wells_rd_NO2.xml", "newfoundland_way_NO2.xml");

//six files, loop six times.
for($i = 0; $i < count($output); $i++ ){
    //initialise reader, define file to read.
    $XMLReader = new XMLReader();
    $XMLReader->open("../xml/original/" . $input[$i]);
    
    //initialise writer, allocate memory.
    $XMLWriter = new XMLWriter();
    $XMLWriter->openMemory();
    
    //create "header"
    $XMLWriter->startDocument("1.0");
    $XMLWriter->setIndent("2");
    $XMLWriter->startElement("data");
    $XMLWriter->writeAttribute("type", "nitrogen dioxide");
    /*
     * <?xml version="1.0"?>
     * <data type="nitrogen dioxide">
     */
    //set reader to the first row
    while($XMLReader->read() && $XMLReader->name !=="row");
    
    $location = true;
    $doc = new DOMDocument;
    
    while($XMLReader->name === "row"){
        $element = simplexml_import_dom($doc->importNode($XMLReader->expand(), 
                true));
        
        //we only need the location value once per file, only entered on the 
        //   first pass.
        //<location long="--" lat="--" id="-----">
        if($location){
            $XMLWriter->startElement("location");
            $XMLWriter->writeAttribute("id", $element->desc->attributes()->val);
            $XMLWriter->writeAttribute("lat", $element->lat->attributes()->val);
            $XMLWriter->writeAttribute("long", $element->long->attributes()
                    ->val);
            $location = false;
        }
        
        //write bulk of data
        //<reading val="--" time="--:--:--" date="--/--/----"/>
        $XMLWriter->startElement("reading");
        $XMLWriter->writeAttribute("date", $element->date->attributes()->val);
        $XMLWriter->writeAttribute("time", $element->time->attributes()->val);
        $XMLWriter->writeAttribute("val", $element->no2->attributes()->val);
        $XMLWriter->endElement();
        $XMLReader->next("row");
    }
    /*
     * </location>
     * </data>
     */
    $XMLWriter->endElement();
    $XMLWriter->endElement();
    $XMLWriter->endDocument();
    
    //create files
    file_put_contents("../xml/no2/" . $output[$i], $XMLWriter->flush(true));
    
    //not necessary, but good practice.
    $XMLReader->close();
}
?>
