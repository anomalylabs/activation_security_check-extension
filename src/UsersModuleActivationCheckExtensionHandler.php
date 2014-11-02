<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleActivationCheck;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotActivatedException;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

class UsersModuleActivationCheckExtensionHandler
{

    /**
     * Security check during login.
     *
     * @param ActivationRepositoryInterface $activations
     * @param UserInterface                 $user
     */
    public function login(ActivationRepositoryInterface $activations, UserInterface $user)
    {
        $this->checkActivation($activations, $user);
    }

    /**
     * Security check during authorization check.
     *
     * @param ActivationRepositoryInterface $activations
     * @param UserInterface                 $user
     */
    public function check(ActivationRepositoryInterface $activations, UserInterface $user)
    {
        $this->checkActivation($activations, $user);
    }

    /**
     * Check the activation status of a user.
     *
     * @param ActivationRepositoryInterface $activations
     * @param UserInterface                 $user
     * @throws UserNotActivatedException
     */
    protected function checkActivation(ActivationRepositoryInterface $activations, UserInterface $user)
    {
        $activation = $activations->findActivationByUserId($user->getId());

        if (!$activation instanceof ActivationInterface or !$activation->itIsComplete()) {

            throw new UserNotActivatedException("Your account has not been activated.");
        }
    }
}
 