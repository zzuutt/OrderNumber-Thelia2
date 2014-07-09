<?php
namespace OrderNumber\Model;

interface ConfigInterface
{
    // Data access
    public function write($file=null);
    public static function read($file=null);

    // variables setters

    /*
     * @return OrderNumber\Model\ConfigInterface
     */
    public function setORDERNUMBERPERSONALVALUE($ORDERNUMBER_PERSONALVALUE);
    public function setINVOICENUMBERPERSONALVALUE($INVOICENUMBER_PERSONALVALUE);
}
