<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleActivationCheck;

use Anomaly\Streams\Addon\Module\Users\Extension\CheckInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionAddon;

/**
 * Class UsersModuleActivationCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleActivationCheckExtension
 */
class UsersModuleActivationCheckExtension extends ExtensionAddon implements CheckInterface
{

    /**
     * Return the handler class.
     *
     * @return null|string
     */
    public function toHandler()
    {
        return $this->transform(__METHOD__);
    }
}
 