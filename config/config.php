<?php 
// DIRECTORY_SEPARATOR
!defined("DS") ? define("DS" ,DIRECTORY_SEPARATOR): DS;
// APP_PATH   
!defined("APP_PATH") ? define("APP_PATH" , dirname(__FILE__).DS."..".DS) : APP_PATH;
// APP_VIEW to view folder 
!defined("APP_VIEW") ? define("APP_VIEW" , APP_PATH."core".DS."views".DS) : APP_VIEW;
// APP_LAYOUT_PATH to layout folder 
!defined("APP_LAYOUT_PATH") ? define("APP_LAYOUT_PATH" , APP_VIEW."layout".DS) : APP_LAYOUT_PATH;
// MIGRATIONS_PATH
!defined("MIGRATIONS_PATH") ? define("MIGRATIONS_PATH" , APP_PATH."migrations".DS) : MIGRATIONS_PATH;
// PUBLIC_PATH
!defined("PUBLIC_PATH") ? define("PUBLIC_PATH" , APP_PATH."public".DS) : PUBLIC_PATH;
// CSS_PATH
!defined("CSS_PATH") ? define("CSS_PATH" , "public/css".DS) : CSS_PATH;
// JS_PATH
!defined("JS_PATH") ? define("JS_PATH" , "public/js".DS) : JS_PATH;

defined("FIRSTKEY")  ? FIRSTKEY : define("FIRSTKEY" , "dLnHU+CYIyhpvXoRVcgym+XQGihBcuFfXGiaFQA9bSQ=");
defined("SECONDKEY")  ? SECONDKEY : define("SECONDKEY" , "sSbcYa1tapc1GwtF4IxDeSoyRxk4OguCIn573c3AY3YFnXYI5MopBqpH7Z//cvN3wlasidkiWvg2ZmZBlY7/ZA==");

