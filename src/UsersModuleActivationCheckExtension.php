<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleActivationCheck;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Exception\UserNotActivatedException;
use Anomaly\Streams\Addon\Module\Users\Extension\CheckpointInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionAddon;

/**
 * Class UsersModuleActivationCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleActivationCheckExtension
 */
class UsersModuleActivationCheckExtension extends ExtensionAddon implements CheckpointInterface
{

    /**
     * The activation repository interface object.
     *
     * @var
     */
    protected $activations;

    /**
     * Create a new UsersModuleActivationCheckExtension instance.
     *
     * @param ActivationRepositoryInterface $activations
     */
    /*function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }*/

    /**
     * Security check during login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function login(UserInterface $user)
    {
        $this->checkActivation($user);
    }

    /**
     * Security check during authorization check.
     *
     * @return mixed
     */
    public function check(UserInterface $user)
    {
        $this->checkActivation($user);
    }

    /**
     * @param UserInterface $user
     */
    protected function checkActivation(UserInterface $user)
    {
        $this->activations = app(
            'Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface'
        );

        $activation = $this->activations->findByUserId($user->getUserId());

        if (!$activation instanceof ActivationInterface or !$activation->isComplete()) {

            throw new UserNotActivatedException("Your account has not been activated.");
        }
    }
}
 