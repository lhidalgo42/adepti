<?php

namespace App\Http\Controllers;

use DOMDocument;
use Ixudra\Curl\Facades\Curl;

class Intranet2Controller extends Controller
{
    public static function login($user, $pass)
    {
        $token = self::getToken();
        $data = [
            '__RequestVerificationToken' => $token['token'],
            'Email' => $user,
            'Password' => $pass
        ];
        $headers = [
            'Cache-Control: max-age=0',
            'Content-Type: application/x-www-form-urlencoded',
            'Upgrade-Insecure-Requests: 1',
            'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36'
        ];
        $cookieName = $token['cookiename'];
        $request = Curl::to('http://intranet2.uai.cl/Account/Login')
            ->withData($data)
            ->withHeaders($headers)
            ->allowRedirect()
            ->setCookieFile(base_path('/temp/' . $cookieName))
            ->setCookieJar(base_path('/temp/' . $cookieName))
            ->returnResponseObject()
            ->withResponseHeaders()
            ->post();
        if(isset($request->headers['Set-Cookie'])){
            $dom = new DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($request->content);
            $html = simplexml_import_dom($dom);
            $name = (string)$html->xpath("//h5[@class='student-name']")[0];
            $cookie = $request->headers['Set-Cookie'];
            return ['response' => true, 'content' =>['email' => $user,'password' =>$pass,'name' => $name,'cookie' => $cookie]];
        }
        return ['response' => false];
    }

    /**
     * funcion que obtiene el token que se envia a intranet
     * @return string
     */
    public static function getToken()
    {
        $cookieName = dechex(time());
        $response = Curl::to('http://intranet2.uai.cl/Account/Login')
            ->returnResponseObject()
            ->setCookieJar(base_path('/temp/' . $cookieName))
            ->get();
        $dom = new DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($response->content);
        $html = simplexml_import_dom($dom);
        $token = (string)$html->xpath("//input[@name='__RequestVerificationToken']")[0]->attributes()->value;
        return ['token' => $token,'cookiename' => $cookieName];
    }

    public static function getCourses($user){
        $headers = [
            'Cache-Control: max-age=0',
            'Upgrade-Insecure-Requests: 1',
            'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36',
            'Cookie: '.$user->cookie
        ];
        $request = Curl::to('http://intranet2.uai.cl/Academic/CourseHistory')
            ->withHeaders($headers)
            ->allowRedirect()
            ->returnResponseObject()
            ->withResponseHeaders()
            ->get();
        $dom = new DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->content);
        $html = simplexml_import_dom($dom);
        $table = $html->xpath("//div[@id='enrollments']/div/div/table/tbody/tr");
        $response = [];
        for ($i=0;$i<count($table);$i++){
            $a = new \stdClass();
            $a->period = (string)$table[$i]->td[0];
            $a->initials = (string)$table[$i]->td[1];
            $a->section = (int)$table[$i]->td[2];
            $a->subject = (string)$table[$i]->td[3];
            $a->status = (string)$table[$i]->td[4];
            $a->grade = (float)str_replace(',','.',$table[$i]->td[5]);
            $link = (string)$table[$i]->td[6]->a[0]->attributes()->href;
            $a->intranet_id = (int)substr($link,63-strlen($link));
            $link = (string)$table[$i]->td[7]->a[0]->attributes()->onclick;

            $a->course_id = (int)substr($link,12-strlen($link),-1);
            $response[] = $a;
        }
        return $response;

    }
}
