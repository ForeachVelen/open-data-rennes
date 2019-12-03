<?php


class ErrorMSG
{

    const ERROR_404 = '404 Not Found';

    const ERROR_500 = '500 Internal Server Error';

    const ERROR_202 = '202 Accepted';

    public static function send($error, $type)
    {

        if(!empty($error))
        {
            if(is_array($error))
            {
                header('HTTP/1.1 ' . $type);
                header('Content-Type: application/json; charset=UTF-8');

                $msg = "Code d'erreur ";

                foreach ($error as $val)
                {
                    $msg .= '<a href="/support/' . $val . '">' . $val . '</a> ';
                }

            }
            else
            {
                header('HTTP/1.1 ' . $type);
                header('Content-Type: application/json; charset=UTF-8');
                $msg = 'Code d\'erreur <a href="/support/' . $error . '">' . $error . '</a> ';
            }
        }

        return json_encode($msg);

    }

}