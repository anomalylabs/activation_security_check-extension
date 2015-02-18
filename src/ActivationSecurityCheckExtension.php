<?php namespace Anomaly\ActivationSecurityCheckExtension;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Security\SecurityCheckExtension;
use Anomaly\UsersModule\User\Contract\User;
use Illuminate\Auth\Guard;
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
     * The authorization guard.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * Create a new BlockedSecurityCheckExtension instance.
     *
     * @param Guard      $guard
     * @param MessageBag $messages
     */
    public function __construct(Guard $guard, MessageBag $messages)
    {
        $this->guard    = $guard;
        $this->messages = $messages;
    }

    /**
     * Run the security check.
     *
     * @param Request       $request
     * @param User $user
     * @return void|Response
     */
    public function check(Request $request, User $user = null)
    {
        if ($user && !$user->isActivated()) {

            $this->guard->logout($user);

            $this->messages->error('anomaly.extension.activation_security_check::error.not_activated');

            return redirect('admin/login');
        }
    }
}
 