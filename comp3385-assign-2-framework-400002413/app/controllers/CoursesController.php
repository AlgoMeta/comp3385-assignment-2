<?php
    class CoursesController extends Controller{
        public function run():void{
            $this->setModel(new CourseModel());
            $this->setView(new View());
            SessionManager::create();

            if (isset($_SESSION["user"])) {
                if(SessionManager::accessible($_SESSION["user"], "courses")) {
                    $this->getModel()->makeConnection();
                    $this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/courses.tpl.php");
                    $this->getView()->addVar("courses", $this->getModel()->findCourses());
                    $this->getView()->display();
                    $this->getResponseHandler()->getHeader()->setData("Header", "Success");
                    $this->getResponseHandler()->getState()->setData("State", "Success");
                    $this->getResponseHandler()->getLogResponse()->setData("Logger", "Courses successfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                } else {
                    $this->getResponseHandler()->getHeader()->setData("Header", "Error");
                    $this->getResponseHandler()->getState()->setData("State", "Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Logger", "Courses unsuccessfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    header("Location: index.php");
                }
            } else {
                $this->getResponseHandler()->getHeader()->setData("Header", "Error");
                $this->getResponseHandler()->getState()->setData("State", "Error");
                $this->getResponseHandler()->getLogResponse()->setData("Logger", "Courses unsuccessfully visited");
                $this->getSessionManager()->create();
                $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                header("Location: index.php");
            }
        }
    }
?>