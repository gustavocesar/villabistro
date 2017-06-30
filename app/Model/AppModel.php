<?php
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model
{

    public $actsAs = array('AuditLog.Auditable');

    /**
     * Get the current user
     *
     * Necessary for logging the "owner" of a change set,
     * when using the AuditLog behavior.
     *
     * @return mixed|null User record. or null if no user is logged in.
     */
    public function currentUser()
    {
        App::uses('AuthComponent', 'Controller/Component');
        return array(
            'id' => AuthComponent::user('id'),
            'description' => AuthComponent::user('username'),
        );
    }
}
