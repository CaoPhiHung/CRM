<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolrDocument
 *
 * @author paul.aan
 */
namespace Vietland\AevitasBundle\Document;

interface SolrDocument {
    function parseSolrDocument(&$doc);
    function getType();
}