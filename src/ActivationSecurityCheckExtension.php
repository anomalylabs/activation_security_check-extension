<?php namespace Anomaly\ActivationSecurityCheckExtension;

use Anomaly\UsersModule\Security\SecurityCheckExtension;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ActivationSecurityCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\ActivationSecurityCheckExtension
 */
class ActivationSecurityCheckExtension extends SecurityCheckExtension
{

    /**
     * This extension provides a security check
     * for users that assures the user is activated.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::security_check.activation';

    /**
     * Run the security check.
     *
     * @param Request       $request
     * @param UserInterface $user
     * @return void|Response
     */
    public function check(Request $request, UserInterface $user = null)
    {
    }
}
 