<?php

/*
 * To collect data from CSV file
 */

/**
 * Description of CSVReader
 *
 * @author 
 */

namespace Vietland\AevitasBundle\Helper;

class CSVReader {

    private $filename;
    private $reader;
    private $data;
    private $header;
    private $rowcount;
    private $colcount;
    private $delimiter;
    private $quote;

    public function __construct($fname, $delimiter = ',', $quote = '"') {
        $this->filename = $fname;
        $this->delimiter = $delimiter;
        $this->quote = $quote;
        
        $this->read();
    }

    private function mySplit($string) {
        $rt = array();
        $rt[0] = '';
        $inContent = FALSE;
        $cur = 0;
        $i = 0;
        while ($i < strlen($string)) {
            if ($string[$i] == $this->quote) {
                $inContent = !$inContent;
                $i++;
                continue;
            }

            if (!$inContent && $string[$i] == $this->delimiter) {
                $rt[++$cur] = '';
                $i++;
                continue;
            }

            $rt[$cur] .= $string[$i++];
        }

        return $rt;
    }

    public function read() {
        // read datafile line by line and assign to $content varible, index 0-based
        $content = file($this->filename);
        
        // by default, first line contains header
        $this->header = $this->mySplit($content[0]);
        
        // number of rows of data = total rows - 1 (it's header row)
        $this->rowcount = count($content) - 1;
        $this->colcount = count($this->header);

        // loop in every row, using mySplip function to get data from cells same row
        // $this->data contains 2-d array data
        for ($row = 1; $row <= $this->rowcount; $row++) {
            $this->data[$row] = $this->mySplit($content[$row]);
        }
    }
    
    // get special cell in row $row and column $col
    public function getCell($row, $col){
        return $this->data[$row+1][$col];
    }
    
    // get special row data
    public function getRow($row) {
        $rt = array();
        for ($col = 0; $col < $this->colcount; $col++) {
            $rt[$col] = $this->data[$row+1][$col];
        }
        
        return $rt;
    }
    
    // get special column data
    public function getCol($col){
        $rt = array();
        for ($row = 0; $row < $this->rowcount; $row++) {
            $rt[$row] = $this->data[$row+1][$col];
        }
        
        return $rt;
    }
    
    // get number of rows
    public function getNumRows(){
        return $this->rowcount;
    }
    
    //get number of columns
    public function getNumCols(){
        return $this->colcount;
    }
}