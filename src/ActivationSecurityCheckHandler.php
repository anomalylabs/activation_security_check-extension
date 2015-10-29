<?php namespace Anomaly\ActivationSecurityCheckExtension;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserAuthenticator;

/**
 * Class ActivationSecurityCheckHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ActivationSecurityCheckExtension
 */
class ActivationSecurityCheckHandler
{

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * The authenticator utility.
     *
     * @var UserAuthenticator
     */
    protected $authenticator;

    /**
     * Create a new ActivationSecurityCheckHandler instance.
     *
     * @param MessageBag        $messages
     * @param UserAuthenticator $authenticator
     */
    public function __construct(MessageBag $messages, UserAuthenticator $authenticator)
    {
        $this->messages      = $messages;
        $this->authenticator = $authenticator;
    }

    /**
     * Handle the security check.
     *
     * @param UserInterface $user
     * @return bool
     */
    public function handle(UserInterface $user = null)
    {
        if ($user && !$user->isActivated()) {

            $this->authenticator->kickOut($user, 'inactive');

            $this->messages->error('anomaly.extension.activation_security_check::error.not_activated');

            return false;
        }

        return true;
    }
}
