<?php
/*************************************************************************************/
/*                                                                  by Zzuutt        */
/*************************************************************************************/

namespace OrderNumber\EventListeners;

use OrderNumber\OrderNumber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Action\BaseAction;
use Thelia\Core\Event\Order\OrderEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Log\Tlog;
use OrderNumber\Model\Config;

class OrderNumberEventListener implements EventSubscriberInterface
{
    
    public function updateOrderNumber(OrderEvent $event)
    {
        $maskneworder = Config::read(OrderNumber::JSON_CONFIG_PATH);
        $order = $event->getOrder();
        $id = $order->getId();
        Tlog::getInstance()->debug("Mask nunmero facture :".$maskneworder['ORDERNUMBER_PERSONALVALUE']);
        Tlog::getInstance()->debug("Numero de facture :".$order->getId());
        
        $neworder = str_replace('{id}', $id, $maskneworder['ORDERNUMBER_PERSONALVALUE']);
        $neworder = preg_replace_callback('/{Date[(](.*?)[)]}/',
                    function ($m) {
                        return Date($m[1]);                    
                    },$neworder);
        $neworder = preg_replace_callback('/{PadStr\(([a-zA-Z0-9.\/\\-]+),([0-9]+),(.*),(RIGHT|LEFT|BOTH)\)}/', 
                    function ($m) { 
                        if($m[4] == 'LEFT') return str_pad($m[1],$m[2],"$m[3]",STR_PAD_LEFT);
                        if($m[4] == 'RIGHT') return str_pad($m[1],$m[2],"$m[3]",STR_PAD_RIGHT);
                        if($m[4] == 'BOTH') return str_pad($m[1],$m[2],"$m[3]",STR_PAD_BOTH);
                    }, $neworder);
        $nouvelleRef = $neworder;
        $order->setref($nouvelleRef)->save();
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            TheliaEvents::ORDER_AFTER_CREATE => ['updateOrderNumber', 128]
        );
    }
}
