<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController as BaseAppController;
use Cake\Event\EventInterface;

/**
 * Class AppController
 * @package App\Controller\Api
 */
class AppController extends BaseAppController
{
    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->jsonSerialize();
        $this->viewBuilder()->setClassName('Json');

        $this->RequestHandler->renderAs($this, 'json');
        $this->response = $this->response->withType('application/json');
        $this->set('security', ['_Token' => $this->request->getParam('_csrfToken')]);
        $this->viewBuilder()->setOption('serialize', true);
    }
}
