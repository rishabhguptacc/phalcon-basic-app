<?php

use Phalcon\Mvc\Controller;

class ContactController extends Controller
{
    public function IndexAction()
    {
        // echo "<h1>Inside Contacts!<\h1>";                                            // If "/views/contact/index.phtml" doesn't exists, then this line executes... else the content of that "index.phtml" file will execute.
        // return '<h1>Hello World! in ContactController.php!!! </h1>';                 // *** this line exhibits to read or display the content of the "/views/contact/index.phtml".
    }

    public function QueryAction()
    {
        // echo "inside queryaction()///\n";

        $feedback = new Feedbacks();
        
        $feedback->assign(
            $this->request->getPost(),
            ['feedback_data']
        );

        $success = $feedback->save();

        $this->view->success = $success;

        if ($success) {
            $this->view->message = "Feedback sent succesfully";
        } else {
            $this->view->message = "Feedback didn't send due to following reason: <br>".implode("<br>", $feedback->getMessages());
        }
    }
}
