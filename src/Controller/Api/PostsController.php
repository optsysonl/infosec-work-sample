<?php
namespace App\Controller\Api;

use App\Controller\AppController as BaseAppController;
use Cake\Http\Response;
use Cake\View\JsonView;

class PostsController extends BaseAppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->viewBuilder()->setOption('serialize', 'posts');
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $post = $this->Posts->newEmptyEntity();
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                return $this->response->withType('application/json')
                    ->withStringBody(
                        json_encode(
                            ['success' => true,
                             'message' => __('The post has been saved.')
                            ]
                        ));
            }

            return $this->response->withType('application/json')
                    ->withStringBody(
                        json_encode(
                            ['success' => false,
                             'error' => __('The post could not be saved. Please, try again.')
                            ]
                        ));
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode(['success' => false]));
    }
}
