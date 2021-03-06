<?php
use Service\UserService;

/**
 * Class IndexController
 */
class IndexController extends AbstractCtlr
{
    /**
     * 分页
     */
    use Paginator;

    public function indexAction()
    {
        $userService = UserService::getInstance();
        $users = $userService->getUserList();
        $this->getView()->assign("users", $users);
        return true;
    }

    public function getUsersAction()
    {
        $users = Paginator::paginate(UserModel::orderBy('updated_at', 'desc'), false, $this->getPage());
        $this->getView()->assign("users", $users);
        return true;
    }

    public function helloAction()
    {
        $this->getView()->assign("msg", 'hello');
        return true;
    }
}
