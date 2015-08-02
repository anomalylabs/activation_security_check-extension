<?php namespace Anomaly\ActivationSecurityCheckExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class ActivationSecurityCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\ActivationSecurityCheckExtension
 */
class ActivationSecurityCheckExtension extends Extension
{

    /**
     * This extension provides a security check
     * for users that assures the user is activated.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::security_check.activation';

}
 