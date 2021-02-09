<?php


namespace App;
use App\Controller\HomeController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    private Request $request;

    public function __construct() {
        $this->request = Request::createFromGlobals();
    }

    /**
     * @void
     */
    public function run(): void {
        $response = $this->route($this->request);
        $response->send();
    }

    private function route(Request $request): Response {
        $defaultController = HomeController::class;

//we get the route here and clean it
        $path = $request->getPathInfo();
        $path = trim($path, "/");

        $className = $defaultController;
        $method = "index";
        if (strlen($path) > 0) {
            // if subroute is not specified, it is merged to /index
            list($controller, $method) = [...explode("/", $path), "index"];
            $className = "App\\Controller\\" . ucfirst($controller) . "Controller";
            if ($className === $defaultController && $method === "index") {
                /** @todo we called index of $defaultController, make a redirection to / here WITHOUT using the header function. */
                return new Response('index',302);
            }
        }

        if (!class_exists($className)
            || !method_exists($className, $method)) {
            /** @todo return a not found response here (status code 404) */
            return new Response('not found', 404);
        }

        $resolvedArguments = $this->parametersResolver($className, $method);
        return call_user_func_array([new $className(), $method], $resolvedArguments);
    }

    /**
     * @param $className
     * @param $method
     * @return array
     * @throws \ReflectionException
     */
    private function parametersResolver($className, $method): array {
        //this code gives you the ability to see if a method should have a parameter
        //if so, set it as object or value.
        $reflexion = new \ReflectionMethod($className, $method);
        $params = $reflexion->getParameters();
        $autoInject = [
            Request::class => $this->request
        ];
        $paramValues = [];
        foreach ($params as $param) {
            if ($param->hasType() && isset($autoInject[$param->getType()->getName()])) {
                $paramValues[$param->getPosition()] = $autoInject[$param->getType()->getName()];
            } else {
                $paramValues[$param->getPosition()] = $this->request->get($param->getName(), null);
            }
        }
        return $paramValues;
    }
}