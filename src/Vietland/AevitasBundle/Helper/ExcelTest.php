<?php

/*
 * To collect data from excel file
 */

/**
 * Description of Excel
 *
 * @author 
 */

include 'excel_reader2.php';

class Excel {
    private $filename;
    private $reader;
    private $header;
    private $data;
    private $rowcount;
    private $colcount;

    public function __construct($fname, $header=NULL) {
        $this->filename = $fname;
        
        try{
            $this->reader = new Spreadsheet_Excel_Reader($fname);
        }catch (Exception $e){
            echo 'has error when reading the file: ',  $e->getMessage(), "\n";
            return FALSE;
        }
        
        if ($header != NULL)
            $this->header = $header;
        
        $this->colcount = $this->reader->sheets[0]['numCols'];
        $this->rowcount = $this->reader->sheets[0]['numRows']-1;
        
        $this->read();
    }

    public function read() {
        if (!$this->rowcount)
            return FALSE;

        for ($row = 1; $row <= $this->rowcount; $row++) {
            for ($col = 1; $col <= $this->colcount; $col++) {
                $this->data[$row-1][$col-1] = $this->reader->sheets[0]['cells'][$row][$col];
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

    public function getCell($col, $row) {
        if (!isset($this->data[$row+1][$col]))
            return FALSE;
        
        return $data[$row][$col];
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

$start = microtime(true);
//
$obj = new Excel('TBFSampleUser.xls');
var_dump($obj->getNumCols());
//
echo 'total time: '. number_format(microtime(true)-$start, 6);
?>
