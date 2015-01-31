<?php namespace Anomaly\ActivationCheckExtension;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserCheck;
use Illuminate\Http\Request;

/**
 * Class ActivationCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\ActivationCheckExtension
 */
class ActivationCheckExtension extends UserCheck
{

    /**
     * This extension provides a security check
     * for users that assures the user is activated.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::check.activation';

    /**
     * Check authorization of the current user.
     *
     * @param UserInterface $user
     */
    public function check(UserInterface $user = null, Request $request)
    {
    }
}
 