<?php  

    namespace app;
    class Router {
        public function route(){
            $uri = $_SERVER['REQUEST_URI'];
            $uriParts = explode('/',$uri);
            $routeFragments[] = $uriParts[2];
            $routeFragments[] = $uriParts[3];
            $routeFragments[] = $uriParts[4];
              
            return $routeFragments;
        }
    }