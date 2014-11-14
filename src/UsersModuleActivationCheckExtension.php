<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleActivationCheck;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationInterface;
use Anomaly\Streams\Addon\Module\Users\Extension\CheckExtension;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class UsersModuleActivationCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleActivationCheckExtension
 */
class UsersModuleActivationCheckExtension extends CheckExtension
{

    /**
     * Perform security check at login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function login(UserInterface $user)
    {
        $this->checkActivation($user);
    }

    /**
     * Perform security check at authorization check.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function check(UserInterface $user)
    {
        $this->checkActivation($user);
    }

    /**
     * Perform security check after failed login attempt.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function fail(UserInterface $user = null)
    {
        //
    }

    /**
     * Check activation.
     *
     * @param UserInterface $user
     * @throws UserNotActivatedException
     */
    protected function checkActivation(UserInterface $user)
    {
        $activation = $user->getActivation();

        if (!$activation instanceof ActivationInterface or !$activation->isComplete()) {

            throw new UserNotActivatedException("Your account has not been activated.");
        }
    }
}
 