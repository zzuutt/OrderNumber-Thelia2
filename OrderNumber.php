<?php
/*************************************************************************************/
/*                                                                                   */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace OrderNumber;
use Cbatos\Model\Config;
use Thelia\Module\BaseModule;
use Thelia\Core\Translation\Translator;

class OrderNumber extends BaseModule
{
    const JSON_CONFIG_PATH = "/Config/config.json";

    public function getCode()
    {
        return 'OrderNumber';
    }
}
