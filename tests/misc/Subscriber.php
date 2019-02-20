<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: jjost
 * Date: 2019-02-18
 * Time: 12:26
 */

namespace IxocreateMisc\Event;

use Ixocreate\Contract\Event\EventInterface;
use Ixocreate\Contract\Event\SubscriberInterface;

class Subscriber implements SubscriberInterface
{
    private static $events = [];

    private static $handleCounter = 1;

    private $event;

    private $handleCount = null;

    public static function setRegister(array $events)
    {
        self::$events = $events;
    }

    public static function register(): array
    {
        return self::$events;
    }

    public function handle(EventInterface $event)
    {
        $this->event = $event;
        $this->handleCount = self::$handleCounter++;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return null
     */
    public function getHandleCount()
    {
        return $this->handleCount;
    }
}