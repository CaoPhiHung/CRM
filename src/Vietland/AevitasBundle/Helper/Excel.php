<?php

/*
 * To collect data from excel file
 */

/**
 * Description of Excel
 *
 * @author 
 */

namespace Vietland\AevitasBundle\Helper;

use Vietland\AevitasBundle\Helper\ExcelSpreadsheet;

class Excel {
    private $filename;
    private $reader;
    private $header;
    private $data;
    private $rowcount;
    private $colcount;

    public function __construct($fname) {
        $this->filename = $fname;
        
        try{
            $this->reader = new ExcelSpreadsheet($fname);
        }catch (Exception $e){
            echo 'has error when reading the file: ',  $e->getMessage(), "\n";
            return FALSE;
        }
        
        //var_dump($this->reader->sheets[0]['cells'][1][1]);exit;
        $this->colcount = $this->reader->sheets[0]['numCols']-1;
        $this->rowcount = $this->reader->sheets[0]['numRows']-1;
        
        $this->read();
    }

    public function read() {
        if (!$this->rowcount)
            return FALSE;

        for ($row = 1; $row <= $this->rowcount; $row++) {
            $this->data[$row-1] = array();
            for ($col = 1; $col <= $this->colcount; $col++) {
                if (isset($this->reader->sheets[0]['cells'][$row][$col])){
                    $this->data[$row-1][$col-1] = $this->reader->sheets[0]['cells'][$row][$col];
                }
            }
        }
    }

    public function getRow($row) {
        $rt = array();
        for ($col = 0; $col < $this->colcount; $col++) {
            $rt[$col] = $this->data[$row+1][$col];
        }
        
        return $rt;
    }
    
    public function getCol($col){
        $rt = array();
        for ($row = 0; $row < $this->rowcount; $row++) {
            $rt[$row] = $this->data[$row+1][$col];
        }
        
        return $rt;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function getHeader() {
        return $this->header;
    }

    public function getCell($row, $col) {
        if (!isset($this->data[$row+1][$col]))
            return FALSE;
        
        return $this->data[$row+1][$col];
    }
    
    public function getNumRows(){
        return $this->rowcount;
    }
    
    public function getNumCols(){
        return $this->colcount;
    }
    
    public function exportExcel($fname){
        
    }
    
    public function exportCsv($fname){
        
    }
}